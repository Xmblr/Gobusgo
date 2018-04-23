<?php

namespace Gobusgo\GobusgoBundle\Entity;

class Request
{
    protected $organization;

    protected $UNP;

    protected $bank;

    protected $addressOfTheBank;

    protected $legalAddress;

    protected $settlementAccount;

    protected $code;

    protected $fullName;

    protected $phone;

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