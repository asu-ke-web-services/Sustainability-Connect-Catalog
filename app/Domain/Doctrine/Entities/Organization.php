<?php

namespace SCCatalog\Entities;

use Doctrine\Common\Collections\ArrayCollection;
use LaravelDoctrine\ACL\Contracts\Organisation as OrganizationContract;
use LaravelDoctrine\Extensions\Timestamps\Timestamps;
use SCCatalog\Entities\Address;
// use SCCatalog\Entities\Note;
// use SCCatalog\Events\Domain as Event;
use SCCatalog\Support\Traits\Entity\HasToString;
use SCCatalog\Support\Traits\Entity\Identifiable;
use SCCatalog\Support\Traits\Entity\UniversallyIdentifiable;
use SCCatalog\Support\Contracts\Entity\Identifiable as IdentifiableContract;
use SCCatalog\Support\Contracts\Entity\UniversallyIdentifiable as UniversallyIdentifiableContract;
use Somnambulist\DomainEvents\Contracts\RaisesDomainEvents as RaisesDomainEventsContract;
use Somnambulist\DomainEvents\Traits\RaisesDomainEvents;

/**
 * Class Organization
 *
 * @package    SCCatalog\Entities
 * @subpackage SCCatalog\Entities\Organization
 */
class Organization implements OrganizationContract, IdentifiableContract, UniversallyIdentifiableContract, RaisesDomainEventsContract
{
    use Identifiable;
    use UniversallyIdentifiable;
    use HasToString;
    use RaisesDomainEvents;
    use Timestamps;

    /**
     * @var integer
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $type;

    /**
     * @var string
     */
    protected $status;

    /**
     * @var string
     */
    protected $url;

    /**
     * @var string
     */
    protected $phone;

    /**
     * @var string
     */
    protected $notes;

    /**
     * @var Organization
     */
    protected $parent;

    /**
     * @var ArrayCollection|Organization[]
     */
    protected $children;

    /**
     * @var ArrayCollection|Address[]
     */
    protected $addresses;

    /**
     * @var ArrayCollection|User[]
     */
    protected $users;

    // /**
    //  * One Organization has Many Opportunities
    //  * @var Opportunities[]
    //  */
    // protected $opportunities;


    /**
     * @var \DateTime
     */
    protected $createdAt;

    /**
     * @var \DateTime
     */
    protected $updatedAt;

    /**
     * @var \DateTime
     */
    protected $deletedAt;


    /**
     * Constructor.
     *
     * @param string $uuid
     * @param string $name
     * @param string $type
     * @param string $status
     */
    public function __construct(string $uuid, string $name, string $type, string $status)
    {
        $this->uuid      = $uuid;
        $this->name      = $name;
        $this->type      = $type;
        $this->status    = $status;
        $this->addresses = new ArrayCollection();
        $this->children  = new ArrayCollection();
        $this->users     = new ArrayCollection();
        // $this->opportunities = new ArrayCollection();

        $this->raise(new Event\OrganizationCreated(['uuid' => $this->uuid, 'name' => $name]));
    }

    /**
     * @return int
     */
    public function getId() : int {
        return $this->id;
    }


    /**
     * @return string
     */
    public function getName() : string {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName( string $name ) {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getType() : string {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType( string $type ) {
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getStatus() : string {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus( string $status ) {
        $this->status = $status;
    }

    /**
     * @return string
     */
    public function getUrl() : string {
        return $this->url;
    }

    /**
     * @param string $url
     */
    public function setUrl( string $url ) {
        $this->url = $url;
    }

    /**
     * @return string
     */
    public function getPhone() : string {
        return $this->phone;
    }

    /**
     * @param string $phone
     */
    public function setPhone( string $phone ) {
        $this->phone = $phone;
    }

    /**
     * @return string
     */
    public function getNotes() : string {
        return $this->notes;
    }

    /**
     * @param string $notes
     */
    public function setNotes( string $notes ) {
        $this->notes = $notes;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt() : \DateTime {
        return $this->createdAt;
    }

    /**
     * @param \DateTime $createdAt
     */
    public function setCreatedAt( \DateTime $createdAt ) {
        $this->createdAt = $createdAt;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedAt() : \DateTime {
        return $this->updatedAt;
    }

    /**
     * @param \DateTime $updatedAt
     */
    public function setUpdatedAt( \DateTime $updatedAt ) {
        $this->updatedAt = $updatedAt;
    }

    /**
     * @return \DateTime
     */
    public function getDeletedAt() : \DateTime {
        return $this->deletedAt;
    }

    /**
     * @param \DateTime $deletedAt
     */
    public function setDeletedAt( \DateTime $deletedAt ) {
        $this->deletedAt = $deletedAt;
    }

    public function whitelist() : array {
        return [
            'name',
            'url',
            'phone',
            'notes'
        ];
    }

    /**
     * @return Organization
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * @param Organization $parent
     *
     * @return $this
     */
    public function setParent(Organization $parent = null)
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * @return Organization[]|ArrayCollection
     */
    public function getChildren()
    {
        return $this->children;
    }

    /**
     * @param Organization $organization
     *
     * @return $this
     */
    public function addChild(Organization $organization)
    {
        if (!$this->hasChild($organization)) {
            $this->children->add($organization);
        }

        return $this;
    }

    /**
     * @param Organization $organization
     *
     * @return boolean
     */
    public function hasChild(Organization $organization)
    {
        return $this->children->contains($organization);
    }

    /**
     * @param Organization $organization
     *
     * @return $this
     */
    public function removeChild(Organization $organization)
    {
        $this->children->removeElement($organization);
        if ($organization->getParent() === $this) {
            $organization->setParent(null);
        }

        return $this;
    }


    /**
     * @return ArrayCollection|Address[]
     */
    public function getAddresses()
    {
        return $this->addresses;
    }

    /**
     * @param string|AddressType $type
     *
     * @return null|Address
     */
    public function getAddressByType($type)
    {
        $entity = $this->addresses->filter(
            function ($entity) use ($type) {
                return ((string)$entity->getType() == (string)$type);
            }
        )->first();

        return $entity ?: null;
    }

    /**
     * @param Address $address
     *
     * @return $this
     */
    public function addAddress(Address $address)
    {
        if (!$this->hasAddress($address)) {
            $this->addresses->set($address->getType(), $address);
            $this->raise(new Event\AddressAddedToEntity(['uuid' => $this->uuid, 'address' => $address]));
        }

        return $this;
    }

    /**
     * @param Address $address
     *
     * @return bool
     */
    public function hasAddress(Address $address)
    {
        return $this->addresses->contains($address->getType());
    }

    /**
     * @param Address $address
     *
     * @return $this
     */
    public function removeAddress(Address $address)
    {
        $this->addresses->remove($address->getType());
        $this->raise(new Event\AddressRemovedFromEntity(['uuid' => $this->uuid, 'address' => $address]));

        return $this;
    }



    /**
     * @return ArrayCollection
     */
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * @param User $user
     *
     * @return $this
     */
    public function addUser(User $user)
    {
        if (!$this->hasUser($user)) {
            $this->users->add($user);
        }

        return $this;
    }

    /**
     * @param User $user
     *
     * @return boolean
     */
    public function hasUser(User $user)
    {
        return $this->users->contains($user);
    }

    /**
     * @param User $user
     *
     * @return $this
     */
    public function removeUser(User $user)
    {
        $user->removeOrganization($this);
        if ($this->hasUser($user)) {
            $this->users->removeElement($user);
        }

        return $this;
    }

}
