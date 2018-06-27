<?php

namespace SCCatalog\Domain\Entities;

use SCCatalog\Domain\Entities\Address;
// use SCCatalog\Domain\Entities\Note;
// use Doctrine\Common\Collections\ArrayCollection;
// use LaravelDoctrine\Extensions\Timestamps\Timestamps;

/**
 * Class Organization
 *
 * @Entity
 */
class Organization
{
    // use Timestamps;

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
     * Organization has Many Addresses
     * @var Address
     */
    protected $addresses;

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




    public function __construct( string $name, string $type, string $status ) {
        $this->name = $name;
        $this->type = $type;
        $this->status = $status;
        // $this->addresses = new Address();
        // $this->opportunities = new ArrayCollection();
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

}
