# Unofficial Acumulus PHP SDK
Hey, this is still a work in progress. Please don't use this yet in production.

Official Acumulus documentation: [https://apidoc.sielsystems.nl/]

## Installation
### Via composer
Add the package to your composer.json file
```
    "require": {
        "siegerhansma/acumulus": "~1.0"
    },
```

## Configuration
All of the provider classes take a config array as parameter. 
```
    $config['contractcode'] = 123456;
    $config['username'] = "xxxxxxxxx";
    $config['password'] = "xxxxxxxxx";
```
You could put these variables in a specific config file.

## Usage
### Request
The calls in the API can be called via specific classes corresponding to the categories on the official API docs. 
To start, create a new instance of the provider class you need.
```
    $client = new \Siegerhansma\AcumulusPhp\Providers\ContactsProvider($config);
```
After that, all the calls in that class will be available via the $client variable. 
```
    $client->getContactDetails(14036242)->sendRequest();
```
When the method is called, you can chain the sendRequest method to that. This method actually sends the request to the Acumulus API. The same principle stands for the other provider classes.

### Response
The sendRequest method returns the response given by Acumulus. The response is being cast to an array for multiple records or an instance of the model for a single record.

In the example below is the response of the getAvailableContacts method on the ContactsProvider. 
#### Example response
```
array(3) {
  [0] =>
  class Siegerhansma\AcumulusPhp\Models\Contact#68 (27) {
    protected $contactid =>
    string(7) "1234567"
    protected $contactname1 =>
    string(13) "Contactname 1"
    protected $contactname2 =>
    NULL
    protected $contacttypeid =>
    string(1) "3"
    protected $contacttypename =>
    string(7) "Relatie"
    protected $contactperson =>
    NULL
    protected $contactsalutation =>
    NULL
    protected $contactaddress1 =>
    string(9) "Address 1"
    protected $contactaddress2 =>
    NULL
    protected $contactpostalcode =>
    NULL
    protected $contactcity =>
    string(10) "Leeuwarden"
    protected $contactcountryid =>
    NULL
    protected $contactcountrycode =>
    NULL
    protected $contactcountryname =>
    NULL
    protected $contacttelephone =>
    NULL
    protected $contactfax =>
    NULL
    protected $contactemail =>
    NULL
    protected $contactwebsite =>
    NULL
    protected $contactbankaccountnumber =>
    NULL
    protected $contactiban =>
    NULL
    protected $contactbic =>
    NULL
    protected $contactmark =>
    NULL
    protected $contactvatnumber =>
    NULL
    protected $contactvatstandard =>
    NULL
    protected $contacttemplateid =>
    NULL
    protected $contactnotes =>
    NULL
    protected $contactstatus =>
    NULL
  }
  [1] =>
  class Siegerhansma\AcumulusPhp\Models\Contact#91 (27) {
    protected $contactid =>
    string(7) "3216549"
    protected $contactname1 =>
    string(13) "Contactname 2"
    protected $contactname2 =>
    NULL
    protected $contacttypeid =>
    string(1) "3"
    protected $contacttypename =>
    string(7) "Relatie"
    protected $contactperson =>
    NULL
    protected $contactsalutation =>
    NULL
    protected $contactaddress1 =>
    string(9) "Address 2"
    protected $contactaddress2 =>
    NULL
    protected $contactpostalcode =>
    NULL
    protected $contactcity =>
    string(8) "Drachten"
    protected $contactcountryid =>
    NULL
    protected $contactcountrycode =>
    NULL
    protected $contactcountryname =>
    NULL
    protected $contacttelephone =>
    NULL
    protected $contactfax =>
    NULL
    protected $contactemail =>
    NULL
    protected $contactwebsite =>
    NULL
    protected $contactbankaccountnumber =>
    NULL
    protected $contactiban =>
    NULL
    protected $contactbic =>
    NULL
    protected $contactmark =>
    NULL
    protected $contactvatnumber =>
    NULL
    protected $contactvatstandard =>
    NULL
    protected $contacttemplateid =>
    NULL
    protected $contactnotes =>
    NULL
    protected $contactstatus =>
    NULL
  }
  [2] =>
  class Siegerhansma\AcumulusPhp\Models\Contact#69 (27) {
    protected $contactid =>
    string(5) "00001"
    protected $contactname1 =>
    string(13) "Contactname 3"
    protected $contactname2 =>
    NULL
    protected $contacttypeid =>
    string(1) "3"
    protected $contacttypename =>
    string(7) "Relatie"
    protected $contactperson =>
    NULL
    protected $contactsalutation =>
    NULL
    protected $contactaddress1 =>
    string(9) "Address 3"
    protected $contactaddress2 =>
    NULL
    protected $contactpostalcode =>
    NULL
    protected $contactcity =>
    NULL
    protected $contactcountryid =>
    NULL
    protected $contactcountrycode =>
    string(2) "NL"
    protected $contactcountryname =>
    NULL
    protected $contacttelephone =>
    NULL
    protected $contactfax =>
    NULL
    protected $contactemail =>
    NULL
    protected $contactwebsite =>
    NULL
    protected $contactbankaccountnumber =>
    NULL
    protected $contactiban =>
    NULL
    protected $contactbic =>
    NULL
    protected $contactmark =>
    NULL
    protected $contactvatnumber =>
    NULL
    protected $contactvatstandard =>
    NULL
    protected $contacttemplateid =>
    NULL
    protected $contactnotes =>
    NULL
    protected $contactstatus =>
    NULL
  }
}
```

### Models
For the responses you get from Acumulus, there are several models being used. There models are integral copies of the responses and have their own getters and setters. A Contact model 
### Adding an invoice
By far the most difficult task this package does is adding an invoice to Acumulus. I've tried to create this as easy as possible, but the call being made is pretty complex. 

To (hopefully) make this a little bit easier for you, I made an InvoiceBuilder class. Here's an example of how to use this.
```

    // Instantiate a new InvoiceBuilder object
    $invoiceBuilder = new InvoiceBuilder;
    
    // Create a new contact by instantiating a new Contact model or get it from the API
    $builder = new \Siegerhansma\AcumulusPhp\ContactsProvider($config);
    $contact = $builder->getContactDetails(123456)->sendRequest();
    
    // Set the customer by passing in the Contact model
    $invoiceBuilder->setCustomer($contact);

    // Instantiate a new Invoice model and set Invoice specific settings
    $invoice = new Invoice;
    $invoice
        ->setTemplate('Standaard');

    // Pass in the Invoice model
    $invoiceBuilder->setInvoiceData($invoice);

    // Create a new InvoiceLine object and set the fields
    // Use this in a loop for multiple lines
    $invoiceLine = new InvoiceLine;
    $invoiceLine
        ->setItemnumber(102)
        ->setProduct("Awesome product")
        ->setUnitprice(19.95)
        ->setQuantity(3);
    $invoiceBuilder->addLine($invoiceLine);
    
    // Pass the InvoiceBuilder into the addInvoice method on the InvoicesProvider
    $invoiceSender = new \Siegerhansma\AcumulusPhp\InvoicesProvider($config);
    $response = $invoiceSender->addInvoice($invoiceBuilder)->sendRequest();
```

In the response from Acumulus you will get an array with the following fields:
* invoicenumber
* token
* entryid








## TODO
A lot still to do, here's what:
* Write more tests
* Make documentation
* Support [Picklists](https://apidoc.sielsystems.nl/acumulus-api/picklists)

Again, **please don't use this in production yet!**

If you have any questions or feedback, leave an issue.
