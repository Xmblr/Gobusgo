<?php

namespace Gobusgo\GobusgoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cargo
 *
 * @ORM\Table(name="Cargo")
 * @ORM\Entity(repositoryClass="Gobusgo\GobusgoBundle\Repository\CargoRepository")
 */
class Cargo
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var float
     *
     * @ORM\Column(name="width", type="float", length=255)
     */
    private $width;

    /**
     * @var float
     *
     * @ORM\Column(name="height", type="float", length=255)
     */
    private $height;

    /**
     * @var float
     *
     * @ORM\Column(name="lenght", type="float", length=255)
     */
    private $lenght;

    /**
     * @var float
     *
     * @ORM\Column(name="weight", type="float", length=255)
     */
    private $weight;

    /**
     * @var string
     *
     * @ORM\Column(name="cn", type="string", length=255)
     */
    private $CN;

    /**
     *
     * @ORM\ManyToOne(targetEntity="Gobusgo\GobusgoBundle\Entity\User")
     */
    protected $userId;

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
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name.
     *
     * @param string $name
     *
     * @return Cargo
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set width.
     *
     * @param float $width
     *
     * @return Cargo
     */
    public function setWidth($width)
    {
        $this->width = $width;

        return $this;
    }

    /**
     * Get width.
     *
     * @return float
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * Set height.
     *
     * @param float $height
     *
     * @return Cargo
     */
    public function setHeight($height)
    {
        $this->height = $height;

        return $this;
    }

    /**
     * Get height.
     *
     * @return float
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * Set lenght.
     *
     * @param float $lenght
     *
     * @return Cargo
     */
    public function setLenght($lenght)
    {
        $this->lenght = $lenght;

        return $this;
    }

    /**
     * Get lenght.
     *
     * @return float
     */
    public function getLenght()
    {
        return $this->lenght;
    }

    /**
     * Set weight.
     *
     * @param float $weight
     *
     * @return Cargo
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;

        return $this;
    }

    /**
     * Get weight.
     *
     * @return float
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * Set cN.
     *
     * @param string $cN
     *
     * @return Cargo
     */
    public function setCN($cN)
    {
        $this->CN = $cN;

        return $this;
    }

    /**
     * Get cN.
     *
     * @return string
     */
    public function getCN()
    {
        return $this->CN;
    }

    public function __toString()
    {
        return $this->name;
    }

}
