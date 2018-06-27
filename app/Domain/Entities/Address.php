<?php

namespace SCCatalog\Domain\Entities;

use Doctrine\ORM\Mapping as ORM;
// use LaravelDoctrine\Extensions\Timestamps\Timestamps;


class Address
{
    // use Timestamps;

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


    public function __construct( string $street1, string $street2, string $city, string $state, string $postalCode, string $country, string $note ) {
        $this->street1 = $street1;
        $this->street2 = $street2;
        $this->city = $city;
        $this->state = $state;
        $this->postalCode = $postalCode;
        $this->country = $country;
        $this->note = $note;
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
