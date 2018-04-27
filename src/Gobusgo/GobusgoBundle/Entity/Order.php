<?php

namespace Gobusgo\GobusgoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

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
     *
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
     *
     * @ORM\Column(name="quantity_of_cargo", type="float")
     */
    protected $quantityOfCargo;

    /**
     * @ORM\ManyToOne(targetEntity="Gobusgo\GobusgoBundle\Entity\Address")
     *
     */
    protected $shippingAddress;

    /**
     * @ORM\ManyToOne(targetEntity="Gobusgo\GobusgoBundle\Entity\Address")
     *
     */
    protected $deliveryAddress;

    /**
     * @ORM\ManyToOne(targetEntity="Gobusgo\GobusgoBundle\Entity\Address")
     *
     */
    protected $additionalAddress1;

    /**
     * @ORM\ManyToOne(targetEntity="Gobusgo\GobusgoBundle\Entity\Address")
     *
     */
    protected $additionalAddress2;

    /**
     * @ORM\ManyToOne(targetEntity="Gobusgo\GobusgoBundle\Entity\Address")
     *
     */
    protected $additionalAddress3;

    /**
     * @ORM\ManyToOne(targetEntity="Gobusgo\GobusgoBundle\Entity\Address")
     *
     */
    protected $additionalAddress4;

    /**
     * @ORM\ManyToOne(targetEntity="Gobusgo\GobusgoBundle\Entity\Address")
     *
     */
    protected $additionalAddress5;

    /**
     *
     *
     * @ORM\Column(type="datetime")
     */
    protected $dateOfOrder;

    /**
     * @var boolean
     *
     * @ORM\Column(type="boolean")
     */
    protected $status;

    /**
     * @ORM\Column(type="string")
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
    public function getAdditionalAddress1()
    {
        return $this->additionalAddress1;
    }

    /**
     * @param mixed $additionalAddress1
     */
    public function setAdditionalAddress1($additionalAddress1)
    {
        $this->additionalAddress1 = $additionalAddress1;
    }

    /**
     * @return mixed
     */
    public function getAdditionalAddress2()
    {
        return $this->additionalAddress2;
    }

    /**
     * @param mixed $additionalAddress2
     */
    public function setAdditionalAddress2($additionalAddress2)
    {
        $this->additionalAddress2 = $additionalAddress2;
    }

    /**
     * @return mixed
     */
    public function getAdditionalAddress3()
    {
        return $this->additionalAddress3;
    }

    /**
     * @param mixed $additionalAddress3
     */
    public function setAdditionalAddress3($additionalAddress3)
    {
        $this->additionalAddress3 = $additionalAddress3;
    }

    /**
     * @return mixed
     */
    public function getAdditionalAddress4()
    {
        return $this->additionalAddress4;
    }

    /**
     * @param mixed $additionalAddress4
     */
    public function setAdditionalAddress4($additionalAddress4)
    {
        $this->additionalAddress4 = $additionalAddress4;
    }

    /**
     * @return mixed
     */
    public function getAdditionalAddress5()
    {
        return $this->additionalAddress5;
    }

    /**
     * @param mixed $additionalAddress5
     */
    public function setAdditionalAddress5($additionalAddress5)
    {
        $this->additionalAddress5 = $additionalAddress5;
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



}
