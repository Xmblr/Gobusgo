<?php
// src/AppBundle/Entity/User.php

namespace Gobusgo\GobusgoBundle\Entity;

//use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * @ORM\Entity
 * @ORM\Table(name="Order")
 */
class Order
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;



    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $product;

    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $quantity;

    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $price;

    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $city;

    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $anotherCity;

    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $date;

    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $costOfDelivery;

    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $status;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * @param mixed $product
     */
    public function setProduct($product)
    {
        $this->product = $product;
    }

    /**
     * @return mixed
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param mixed $quantity
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param mixed $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * @return mixed
     */
    public function getAnotherCity()
    {
        return $this->anotherCity;
    }

    /**
     * @param mixed $anotherCity
     */
    public function setAnotherCity($anotherCity)
    {
        $this->anotherCity = $anotherCity;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getCostOfDelivery()
    {
        return $this->costOfDelivery;
    }

    /**
     * @param mixed $costOfDelivery
     */
    public function setCostOfDelivery($costOfDelivery)
    {
        $this->costOfDelivery = $costOfDelivery;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

}