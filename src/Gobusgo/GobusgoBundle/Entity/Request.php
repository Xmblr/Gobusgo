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

    protected $weight;

    protected $height;

    protected $lenght;

    protected $width;

    protected $cities;

    protected $sum;

    /**
     * @return mixed
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * @param mixed $weight
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;
    }

    /**
     * @return mixed
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * @param mixed $height
     */
    public function setHeight($height)
    {
        $this->height = $height;
    }

    /**
     * @return mixed
     */
    public function getLenght()
    {
        return $this->lenght;
    }

    /**
     * @param mixed $lenght
     */
    public function setLenght($lenght)
    {
        $this->lenght = $lenght;
    }

    /**
     * @return mixed
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * @param mixed $width
     */
    public function setWidth($width)
    {
        $this->width = $width;
    }

    /**
     * @return mixed
     */
    public function getCities()
    {
        return $this->cities;
    }

    /**
     * @param mixed $cities
     */
    public function setCities($cities)
    {
        $this->cities = $cities;
    }

    /**
     * @return mixed
     */
    public function getSum()
    {
        return $this->sum;
    }

    /**
     * @param mixed $sum
     */
    public function setSum($sum)
    {
        $this->sum = $sum;
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