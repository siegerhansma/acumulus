<?php

namespace Siegerhansma\AcumulusPhp\Models;

class Contact extends Model
{
    protected $contactid;
    protected $contactname1;
    protected $contactname2;
    protected $contacttypeid;
    protected $contacttypename;
    protected $contactperson;
    protected $contactsalutation;
    protected $contactaddress1;
    protected $contactaddress2;
    protected $contactpostalcode;
    protected $contactcity;
    protected $contactcountryid;
    protected $contactcountrycode;
    protected $contactcountryname;
    protected $contacttelephone;
    protected $contactfax;
    protected $contactemail;
    protected $contactwebsite;
    protected $contactbankaccountnumber;
    protected $contactiban;
    protected $contactbic;
    protected $contactmark;
    protected $contactvatnumber;
    protected $contactvatstandard;
    protected $contacttemplateid;
    protected $contactnotes;
    protected $contactstatus;

    /**
     * @return mixed
     */
    public function getContactaddress1()
    {
        return $this->contactaddress1;
    }

    /**
     * @param mixed $contactaddress1
     */
    public function setContactaddress1($contactaddress1)
    {
        $this->contactaddress1 = $contactaddress1;
    }

    /**
     * @return mixed
     */
    public function getContactaddress2()
    {
        return $this->contactaddress2;
    }

    /**
     * @param mixed $contactaddress2
     */
    public function setContactaddress2($contactaddress2)
    {
        $this->contactaddress2 = $contactaddress2;
    }

    /**
     * @return mixed
     */
    public function getContactbankaccountnumber()
    {
        return $this->contactbankaccountnumber;
    }

    /**
     * @param mixed $contactbankaccountnumber
     */
    public function setContactbankaccountnumber($contactbankaccountnumber)
    {
        $this->contactbankaccountnumber = $contactbankaccountnumber;
    }

    /**
     * @return mixed
     */
    public function getContactbic()
    {
        return $this->contactbic;
    }

    /**
     * @param mixed $contactbic
     */
    public function setContactbic($contactbic)
    {
        $this->contactbic = $contactbic;
    }

    /**
     * @return mixed
     */
    public function getContactcity()
    {
        return $this->contactcity;
    }

    /**
     * @param mixed $contactcity
     */
    public function setContactcity($contactcity)
    {
        $this->contactcity = $contactcity;
    }

    /**
     * @return mixed
     */
    public function getContactcountrycode()
    {
        return $this->contactcountrycode;
    }

    /**
     * @param mixed $contactcountrycode
     */
    public function setContactcountrycode($contactcountrycode)
    {
        $this->contactcountrycode = $contactcountrycode;
    }

    /**
     * @return mixed
     */
    public function getContactcountryid()
    {
        return $this->contactcountryid;
    }

    /**
     * @param mixed $contactcountryid
     */
    public function setContactcountryid($contactcountryid)
    {
        $this->contactcountryid = $contactcountryid;
    }

    /**
     * @return mixed
     */
    public function getContactcountryname()
    {
        return $this->contactcountryname;
    }

    /**
     * @param mixed $contactcountryname
     */
    public function setContactcountryname($contactcountryname)
    {
        $this->contactcountryname = $contactcountryname;
    }

    /**
     * @return mixed
     */
    public function getContactemail()
    {
        // Set an email if it's empty
        if(is_null($this->contactemail)){
            $this->setContactemail(uniqid() . '@' . uniqid() . '.nl');
        }
        return $this->contactemail;
    }

    /**
     * @param mixed $contactemail
     */
    public function setContactemail($contactemail)
    {
        $this->contactemail = $contactemail;
    }

    /**
     * @return mixed
     */
    public function getContactfax()
    {
        return $this->contactfax;
    }

    /**
     * @param mixed $contactfax
     */
    public function setContactfax($contactfax)
    {
        $this->contactfax = $contactfax;
    }

    /**
     * @return mixed
     */
    public function getContactiban()
    {
        return $this->contactiban;
    }

    /**
     * @param mixed $contactiban
     */
    public function setContactiban($contactiban)
    {
        $this->contactiban = $contactiban;
    }

    /**
     * @return mixed
     */
    public function getContactid()
    {
        return $this->contactid;
    }

    /**
     * @param mixed $contactid
     */
    public function setContactid($contactid)
    {
        $this->contactid = $contactid;
    }

    /**
     * @return mixed
     */
    public function getContactmark()
    {
        return $this->contactmark;
    }

    /**
     * @param mixed $contactmark
     */
    public function setContactmark($contactmark)
    {
        $this->contactmark = $contactmark;
    }

    /**
     * @return mixed
     */
    public function getContactname1()
    {
        return $this->contactname1;
    }

    /**
     * @param mixed $contactname1
     */
    public function setContactname1($contactname1)
    {
        $this->contactname1 = $contactname1;
    }

    /**
     * @return mixed
     */
    public function getContactname2()
    {
        return $this->contactname2;
    }

    /**
     * @param mixed $contactname2
     */
    public function setContactname2($contactname2)
    {
        $this->contactname2 = $contactname2;
    }

    /**
     * @return mixed
     */
    public function getContactnotes()
    {
        return $this->contactnotes;
    }

    /**
     * @param mixed $contactnotes
     */
    public function setContactnotes($contactnotes)
    {
        $this->contactnotes = $contactnotes;
    }

    /**
     * @return mixed
     */
    public function getContactperson()
    {
        return $this->contactperson;
    }

    /**
     * @param mixed $contactperson
     */
    public function setContactperson($contactperson)
    {
        $this->contactperson = $contactperson;
    }

    /**
     * @return mixed
     */
    public function getContactpostalcode()
    {
        return $this->contactpostalcode;
    }

    /**
     * @param mixed $contactpostalcode
     */
    public function setContactpostalcode($contactpostalcode)
    {
        $this->contactpostalcode = $contactpostalcode;
    }

    /**
     * @return mixed
     */
    public function getContactsalutation()
    {
        return $this->contactsalutation;
    }

    /**
     * @param mixed $contactsalutation
     */
    public function setContactsalutation($contactsalutation)
    {
        $this->contactsalutation = $contactsalutation;
    }

    /**
     * @return mixed
     */
    public function getContactstatus()
    {
        return $this->contactstatus;
    }

    /**
     * @param mixed $contactstatus
     */
    public function setContactstatus($contactstatus)
    {
        $this->contactstatus = $contactstatus;
    }

    /**
     * @return mixed
     */
    public function getContacttelephone()
    {
        return $this->contacttelephone;
    }

    /**
     * @param mixed $contacttelephone
     */
    public function setContacttelephone($contacttelephone)
    {
        $this->contacttelephone = $contacttelephone;
    }

    /**
     * @return mixed
     */
    public function getContacttemplateid()
    {
        return $this->contacttemplateid;
    }

    /**
     * @param mixed $contacttemplateid
     */
    public function setContacttemplateid($contacttemplateid)
    {
        $this->contacttemplateid = $contacttemplateid;
    }

    /**
     * @return mixed
     */
    public function getContacttypeid()
    {
        return $this->contacttypeid;
    }

    /**
     * @param mixed $contacttypeid
     */
    public function setContacttypeid($contacttypeid)
    {
        $this->contacttypeid = $contacttypeid;
    }

    /**
     * @return mixed
     */
    public function getContacttypename()
    {
        return $this->contacttypename;
    }

    /**
     * @param mixed $contacttypename
     */
    public function setContacttypename($contacttypename)
    {
        $this->contacttypename = $contacttypename;
    }

    /**
     * @return mixed
     */
    public function getContactvatnumber()
    {
        return $this->contactvatnumber;
    }

    /**
     * @param mixed $contactvatnumber
     */
    public function setContactvatnumber($contactvatnumber)
    {
        $this->contactvatnumber = $contactvatnumber;
    }

    /**
     * @return mixed
     */
    public function getContactvatstandard()
    {
        return $this->contactvatstandard;
    }

    /**
     * @param mixed $contactvatstandard
     */
    public function setContactvatstandard($contactvatstandard)
    {
        $this->contactvatstandard = $contactvatstandard;
    }

    /**
     * @return mixed
     */
    public function getContactwebsite()
    {
        return $this->contactwebsite;
    }

    /**
     * @param mixed $contactwebsite
     */
    public function setContactwebsite($contactwebsite)
    {
        $this->contactwebsite = $contactwebsite;
    }

}
