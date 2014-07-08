<?php namespace Siegerhansma\AcumulusPhp;

use Siegerhansma\AcumulusPhp\Models\Contact;
use Siegerhansma\AcumulusPhp\Models\Invoice;
use Siegerhansma\AcumulusPhp\Models\InvoiceLine;

class InvoiceBuilder {

    protected $customer;
    protected $invoiceLines;



    function __construct()
    {
        $this->invoice = new Invoice;
    }

    public function addLine(InvoiceLine $invoiceLine){
        $this->invoiceLines[] = $invoiceLine;
        return $this;
    }

    public function setCustomer(Contact $customer, $overwriteIfExists = false){
        if(!$customer instanceof Contact)
        {
            throw new \Exception("Customer should be a contact model");
        }

        $this->customer = $customer;
        return $this;
    }

    public function setInvoiceData(Invoice $invoice){
        if(!$invoice instanceof Invoice)
        {
            throw new \Exception("Invoice should be an invoice model");
        }

        $this->invoice = $invoice;
        return $this;
    }

    public function build(){

        $customer = new \SimpleXMLElement('<customer></customer>');

        $customer->addChild('type', $this->customer->getContacttypeid());;
        $customer->addChild('companyname1', $this->customer->getContactname1());
        $customer->addChild('companyname2', $this->customer->getContactname2());
        $customer->addChild('fullname', $this->customer->getContactperson());
        $customer->addChild('salutation', $this->customer->getContactsalutation());
        $customer->addChild('address1', $this->customer->getContactaddress1());
        $customer->addChild('address2', $this->customer->getContactaddress2());
        $customer->addChild('postalcode', $this->customer->getContactpostalcode());
        //$customer->addChild('locationcode', $this->customer->get);
        $customer->addChild('countrycode', $this->customer->getContactcountrycode());
        $customer->addChild('vatnumber', $this->customer->getContactvatnumber());
        $customer->addChild('telephone', $this->customer->getContacttelephone());
        $customer->addChild('fax', $this->customer->getContactfax());
        $customer->addChild('email', $this->customer->getContactemail());
        $customer->addChild('bankaccountnumber', $this->customer->getContactbankaccountnumber());
        $customer->addChild('mark', $this->customer->getContactmark());

        $invoice = $customer->addChild('invoice');
        $invoice->addChild('concept', $this->invoice->getConcept());
        $invoice->addChild('number', $this->invoice->getNumber());
        $invoice->addChild('vattype', $this->invoice->getVattype());
        $invoice->addChild('issuedate', $this->invoice->getIssuedate());
        $invoice->addChild('costcenter', $this->invoice->getCostcenter());
        $invoice->addChild('accountnumber', $this->invoice->getAccountnumber());
        $invoice->addChild('paymentstatus', $this->invoice->getPaymentstatus());
        $invoice->addChild('paymentdate', $this->invoice->getPaymentdate());
        $invoice->addChild('description', $this->invoice->getDescription());
        $invoice->addChild('template', $this->invoice->getConcept());

        if(count($this->invoiceLines) == 0){
            throw new \Exception("You need to have invoicelines for your invoice");
        }
        foreach($this->invoiceLines as $invoiceLine){
            $line = $invoice->addChild('line');
            $line->addChild('itemnumber', $invoiceLine->getItemnumber());
            $line->addChild('product', $invoiceLine->getProduct());
            $line->addChild('unitprice', $invoiceLine->getUnitprice());
            $line->addChild('vatrate', $invoiceLine->getVatrate());
            $line->addChild('quantity', $invoiceLine->getQuantity());
            $line->addChild('costprice', $invoiceLine->getCostprice());
        }
        if(!is_null($this->invoice->getEmailto())){
            $emailaspdf = $invoice->addChild('emailaspdf');
            $emailaspdf->addChild('emailto', $this->invoice->getEmailto());
            $emailaspdf->addChild('emailbcc', $this->invoice->getEmailbcc());
            $emailaspdf->addChild('emailfrom', $this->invoice->getEmailfrom());
            $emailaspdf->addChild('subject', $this->invoice->getSubject());
            $emailaspdf->addChild('message', $this->invoice->getMessage());
            $emailaspdf->addChild('confirmreading', $this->invoice->getConfirmreading());
        }

        $xml = $customer->asXML();

        // XML output starts with an xml version declaration, this cuts that off.
        // Pretty hacky, but it works.
        return substr($xml, 21);



    }






} 