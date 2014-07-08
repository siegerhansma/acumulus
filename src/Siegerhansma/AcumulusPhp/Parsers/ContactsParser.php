<?php
/**
 * Created by PhpStorm.
 * User: sieger
 * Date: 7-7-14
 * Time: 22:33
 */

namespace Siegerhansma\AcumulusPhp\Parsers;


use Siegerhansma\AcumulusPhp\Models\Contact;

class ContactsParser extends Parser implements ParserInterface{


    protected $contacts;

    function __construct($contacts)
    {
        $this->contacts = $contacts;
    }

    public function parse(){
        //dd($this->contacts);

        // When filter is used, one result comes back in the form of an array
        if(array_key_exists("contactid", $this->contacts)){
            return $this->parseContact($this->contacts);
        }

        foreach($this->contacts as $contact){
            $models[] = $this->parseContact($contact);
        }

        return $models;

    }

    /**
     * @param $contact
     * @param $models
     * @return array
     */
    public function parseContact($contact)
    {
        $model = new Contact();

        // Sometimes a response comes back as contactname instead of
        // contactname1. Fixing it here before model is created.
        if (array_key_exists('contactname', $contact)) {
            $contact['contactname1'] = $contact['contactname'];
            unset($contact['contactname']);
        }

        return $this->buildModel($contact, $model);

    }


}