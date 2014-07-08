<?php
/**
 * Created by PhpStorm.
 * User: sieger
 * Date: 7-7-14
 * Time: 23:37
 */

namespace Siegerhansma\AcumulusPhp\Parsers;


use Siegerhansma\AcumulusPhp\Models\Contact;

class ContactParser extends Parser implements ParserInterface{


    function __construct($contact)
    {
        $this->contact = $contact;
    }

    public function parse(){
        if(empty($this->contact)){
            return null;
        }
        $model = new Contact();
        return $this->buildModel($this->contact, $model);
    }
} 