<?php


namespace Siegerhansma\AcumulusPhp\Parsers;


class InvoiceParser implements ParserInterface{

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