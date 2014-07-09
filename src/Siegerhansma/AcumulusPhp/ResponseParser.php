<?php
/**
 * Created by PhpStorm.
 * User: sieger
 * Date: 7-7-14
 * Time: 20:09
 */

namespace Siegerhansma\AcumulusPhp;

use Siegerhansma\AcumulusPhp\Parsers\ContactParser;
use Siegerhansma\AcumulusPhp\Parsers\ContactsParser;
use Siegerhansma\AcumulusPhp\Parsers\EntryParser;
use Siegerhansma\AcumulusPhp\Parsers\InvoiceParser;

/**
 * Parses the response returned from Acumulus
 * @package Siegerhansma\AcumulusPhp
 */
class ResponseParser{


    /**
     * @param $request
     */
    function __construct($request)
    {
        $this->request = $request;
    }

    /**
     * Parses the response and sends it to the appropriate response class
     * @return array|mixed|null
     * @throws AcumulusException
     */
    public function parse(){


//        echo $this->request->getBody();
//        die;
        // Get the response body and parse it as Json
        $response = $this->request->json();


        if(!is_array($response)){
            return $response;
        }

        // Handle errors returned by Acumulus
        if($response['status'] == 1){
            throw new AcumulusException($response['errors']['error']['message']);
        }elseif($response['status'] > 1){
            throw new AcumulusException($response['warnings']['warning']['message']);
        }

        // Get the key from the first element from the response
        switch(key($response)){
            case 'contacts':
                $contacts = new ContactsParser(array_shift($response)['contact']);
                return $contacts->parse();
            case 'contact':
                $contact = new ContactParser(array_shift($response));
                return $contact->parse();
            case 'entry':
                $entry = new EntryParser(array_shift($response));
                return $entry->parse();
            case 'invoice':
                $invoice = new InvoiceParser(array_shift($response));
                return $invoice->parse();
        }
        return $response;
    }
}