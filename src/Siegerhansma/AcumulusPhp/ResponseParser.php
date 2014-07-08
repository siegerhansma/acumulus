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

class ResponseParser{


    function __construct($request)
    {
        $this->request = $request;
    }

    public function parse($json = true){

        // Get the response body and parse it as Json
        $response = $this->request->json();

        if(!is_array($response)){
            return $response;
        }

        // Handle errors returned by Acumulus
        if($response['status'] > 0){
            throw new AcumulusException($response['errors']['error']['message']);
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