<?php

namespace Gobusgo\GobusgoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Order
 *
 *  @ORM\Table(name="Order_tbl")
 *  @ORM\Entity(repositoryClass="Gobusgo\GobusgoBundle\Repository\OrderRepository")
 */
class Order
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     *
     * @ORM\ManyToOne(targetEntity="Gobusgo\GobusgoBundle\Entity\User")
     */
    protected $userId;

    /**
     * @Assert\NotBlank()
     * @ORM\ManyToOne(targetEntity="Gobusgo\GobusgoBundle\Entity\Cargo")
     */
    protected $cargoId;

    /**
     * @var float
     *
     * @ORM\Column(type="float")
     */
    protected $price;

    /**
     * @var float
     * @Assert\NotBlank()
     * @ORM\Column(name="quantity_of_cargo", type="float")
     */
    protected $quantityOfCargo;

    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     */
    protected $shippingCity;

    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     */
    protected $deliveryCity;

    /**
     * @ORM\ManyToOne(targetEntity="Gobusgo\GobusgoBundle\Entity\Address")
     * @ORM\Column(nullable=true)
     */
    protected $shippingAddress;

    /**
     * @ORM\ManyToOne(targetEntity="Gobusgo\GobusgoBundle\Entity\Address")
     * @ORM\Column(nullable=true)
     */
    protected $deliveryAddress;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $dateOfOrder;

    /**
     * @var boolean
     *
     * @ORM\Column(type="integer")
     */
    protected $status;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $notice;

    /**
     * @return mixed
     */
    public function getNotice()
    {
        return $this->notice;
    }

    /**
     * @param mixed $notice
     */
    public function setNotice($notice)
    {
        $this->notice = $notice;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param mixed $userId
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

    /**
     * @return mixed
     */
    public function getCargoId()
    {
        return $this->cargoId;
    }

    /**
     * @param mixed $cargoId
     */
    public function setCargoId($cargoId)
    {
        $this->cargoId = $cargoId;
    }

    /**
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param float $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @return float
     */
    public function getQuantityOfCargo()
    {
        return $this->quantityOfCargo;
    }

    /**
     * @param float $quantityOfCargo
     */
    public function setQuantityOfCargo($quantityOfCargo)
    {
        $this->quantityOfCargo = $quantityOfCargo;
    }

    /**
     * @return mixed
     */
    public function getShippingAddress()
    {
        return $this->shippingAddress;
    }

    /**
     * @param mixed $shippingAddress
     */
    public function setShippingAddress($shippingAddress)
    {
        $this->shippingAddress = $shippingAddress;
    }

    /**
     * @return mixed
     */
    public function getDeliveryAddress()
    {
        return $this->deliveryAddress;
    }

    /**
     * @param mixed $deliveryAddress
     */
    public function setDeliveryAddress($deliveryAddress)
    {
        $this->deliveryAddress = $deliveryAddress;
    }


    /**
     * @return mixed
     */
    public function getDateOfOrder()
    {
        return $this->dateOfOrder;
    }

    /**
     * @param mixed $dateOfOrder
     */
    public function setDateOfOrder($dateOfOrder)
    {
        $this->dateOfOrder = $dateOfOrder;
    }

    /**
     * @return float
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param float $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getShippingCity()
    {
        return $this->shippingCity;
    }

    /**
     * @param mixed $shippingCity
     */
    public function setShippingCity($shippingCity)
    {
        $this->shippingCity = $shippingCity;
    }

    /**
     * @return mixed
     */
    public function getDeliveryCity()
    {
        return $this->deliveryCity;
    }

    /**
     * @param mixed $deliveryCity
     */
    public function setDeliveryCity($deliveryCity)
    {
        $this->deliveryCity = $deliveryCity;
    }



}
