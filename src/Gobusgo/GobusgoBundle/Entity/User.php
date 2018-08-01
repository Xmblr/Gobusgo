<?php
// src/AppBundle/Entity/User.php

namespace Gobusgo\GobusgoBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
//use Symfony\Component\Security\Core\User\UserInterface;
use Sonata\UserBundle\Model\UserInterface;
//use FOS\UserBundle\Model\UserInterface;



/**
 * @ORM\Entity
 * @ORM\Table(name="User")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }

    /**
     * @ORM\Column(type="string", length=255)
     *
     */
    protected $organization;

    /**
     * @ORM\Column(type="string")
     */
    protected $UNP;

    /**
     * @ORM\Column(type="string")
     */
    protected $bank;

    /**
     * @ORM\Column(type="string")
     */
    protected $addressOfTheBank;

    /**
     * @ORM\Column(type="string")
     */
    protected $legalAddress;

    /**
     * @ORM\Column(type="string")
     */
    protected $settlementAccount;

    /**
     * @ORM\Column(type="string")
     */
    protected $code;

    /**
     * @ORM\Column(type="string")
     */
    protected $phone;

    /**
     * @ORM\Column(type="string")
     */
    protected $fullName;

    /**
     * @ORM\Column(type="string")
     */
    protected $contractNumber;

    public static function getGenderList()
    {
        return [
            'gender_unknown' => UserInterface::GENDER_UNKNOWN,
            'gender_female' => UserInterface::GENDER_FEMALE,
            'gender_male' => UserInterface::GENDER_MALE,
        ];
    }
    /**
     * @return mixed
     */
    public function getOrganization()
    {
        return $this->organization;
    }

    /**
     * @param mixed $organization
     */
    public function setOrganization($organization)
    {
        $this->organization = $organization;
    }

    /**
     * @return mixed
     */
    public function getUNP()
    {
        return $this->UNP;
    }

    /**
     * @param mixed $UNP
     */
    public function setUNP($UNP)
    {
        $this->UNP = $UNP;
    }

    /**
     * @return mixed
     */
    public function getBank()
    {
        return $this->bank;
    }

    /**
     * @param mixed $bank
     */
    public function setBank($bank)
    {
        $this->bank = $bank;
    }

    /**
     * @return mixed
     */
    public function getAddressOfTheBank()
    {
        return $this->addressOfTheBank;
    }

    /**
     * @param mixed $addressOfTheBank
     */
    public function setAddressOfTheBank($addressOfTheBank)
    {
        $this->addressOfTheBank = $addressOfTheBank;
    }

    /**
     * @return mixed
     */
    public function getLegalAddress()
    {
        return $this->legalAddress;
    }

    /**
     * @param mixed $legalAddress
     */
    public function setLegalAddress($legalAddress)
    {
        $this->legalAddress = $legalAddress;
    }

    /**
     * @return mixed
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param mixed $code
     */
    public function setCode($code)
    {
        $this->code = $code;
    }

    /**
     * @return mixed
     */
    public function getContractNumber()
    {
        return $this->contractNumber;
    }

    /**
     * @param mixed $contractNumber
     */
    public function setContractNumber($contractNumber)
    {
        $this->contractNumber = $contractNumber;
    }

    /**
     * @return mixed
     */
    public function getFullName()
    {
        return $this->fullName;
    }

    /**
     * @param mixed $fullName
     */
    public function setFullName($fullName)
    {
        $this->fullName = $fullName;
    }

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
    public function getSettlementAccount()
    {
        return $this->settlementAccount;
    }

    /**
     * @param mixed $settlementAccount
     */
    public function setSettlementAccount($settlementAccount)
    {
        $this->settlementAccount = $settlementAccount;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param mixed $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }


}
