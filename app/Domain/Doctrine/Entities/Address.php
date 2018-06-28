<?php

namespace SCCatalog\Entities;

use Gedmo\Blameable\Traits\Blameable;
use LaravelDoctrine\Extensions\Timestamps\Timestamps;
use SCCatalog\Support\Traits\Entity\UniversallyIdentifiable;

class Address
{
    use Blameable;
    use Timestamps;
    use UniversallyIdentifiable;

    /**
     * @var integer
     */
    protected $id;

    /**
     * @var  string
     */
    protected $street1;

    /**
     * @var  string
     */
    protected $street2;

    /**
     * @var  string
     */
    protected $city;

    /**
     * @var  string
     */
    protected $state;

    /**
     * @var  string
     */
    protected $postalCode;

    /**
     * @var  string
     */
    protected $country;

    /**
     * @var  string
     */
    protected $note;

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
     * @param null|string $street1
     * @param null|string $street2
     * @param null|string $city
     * @param null|string $state
     * @param null|string $postalCode
     * @param null|string $country
     * @param null|string $note
     */
    public function __construct(
        string $street1 = null,
        string $street2 = null,
        string $city = null,
        string $state = null,
        string $postalCode = null,
        string $country = null,
        string $note = null
    ) {
        $this->street1 = $street1;
        $this->street2 = $street2;
        $this->city = $city;
        $this->state = $state;
        $this->postalCode = $postalCode;
        $this->country = $country;
        $this->note = $note;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->toString();
    }

    /**
     * @param string $separator
     *
     * @return string
     */
    public function toString($separator = "\n") : string
    {
        $pieces = [];

        if ($this->getStreet1()) {
            $pieces[] = $this->getStreet1();
        }
        if ($this->getStreet2()) {
            $pieces[] = $this->getStreet2();
        }
        if ($this->getCity()) {
            $pieces[] = $this->getCity();
        }
        if ($this->getState()) {
            $pieces[] = $this->getState();
        }
        if ($this->getPostalCode()) {
            $pieces[] = $this->getPostalCode();
        }
        if ($this->getCountry()) {
            $pieces[] = $this->getCountry();
        }

        return implode($separator, $pieces);
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
    public function getStreet1() : string {
        return $this->street1;
    }

    /**
     * @param string $street1
     */
    public function setStreet1( string $street1 ) : void {
        $this->street2 = $street1;
    }

    /**
     * @return string
     */
    public function getStreet2() : string {
        return $this->street2;
    }

    /**
     * @param string $street2
     */
    public function setStreet2( string $street2 ) : void {
        $this->street2 = $street2;
    }

    /**
     * @return string
     */
    public function getCity() : string {
        return $this->city;
    }

    /**
     * @param string $city
     */
    public function setCity( string $city ) : void {
        $this->city = $city;
    }

    /**
     * @return string
     */
    public function getState() : string {
        return $this->state;
    }

    /**
     * @param string $state
     */
    public function setState( string $state ) : void {
        $this->state = $state;
    }

    /**
     * @return string
     */
    public function getPostalCode() : string {
        return $this->postalCode;
    }

    /**
     * @param string $postalCode
     */
    public function setPostalCode( string $postalCode ) : void {
        $this->postalCode = $postalCode;
    }

    /**
     * @return string
     */
    public function getCountry() : string {
        return $this->country;
    }

    /**
     * @param string $country
     */
    public function setCountry( string $country ) : void {
        $this->country = $country;
    }

    /**
     * @return string
     */
    public function getNote() : string {
        return $this->note;
    }

    /**
     * @param string $note
     */
    public function setNote( string $note ) : void {
        $this->note = $note;
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

    /**
     * Returns true if this address can be evaluated as the same $address
     *
     * @param Address $address
     *
     * @return boolean
     */
    public function isSameAs(Address $address) : bool
    {
        return
            $this->getStreet1() == $address->getStreet1() &&
            $this->getStreet2() == $address->getStreet2() &&
            $this->getCity() == $address->getCity() &&
            $this->getState() == $address->getState() &&
            $this->getPostalCode() == $address->getPostalCode() &&
            $this->getCountry() === $address->getCountry()
            ;
    }

    public function whitelist() : array {
        return [
            'street1',
            'street2',
            'city',
            'state',
            'postal_code',
            'country',
            'note'
        ];
    }

}
