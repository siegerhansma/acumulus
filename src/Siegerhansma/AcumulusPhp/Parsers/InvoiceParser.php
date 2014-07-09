<?php


namespace Siegerhansma\AcumulusPhp\Parsers;


/**
 * Class InvoiceParser
 * @package Siegerhansma\AcumulusPhp\Parsers
 */
class InvoiceParser implements ParserInterface{

    /**
     * @param $invoice
     */
    function __construct($invoice)
    {
        $this->invoice = $invoice;
    }

    /**
     * Returns array with keys 'invoicenumber', 'token' and 'entryid'
     * @return mixed
     */
    public function parse()
    {
        return $this->invoice;
    }
}