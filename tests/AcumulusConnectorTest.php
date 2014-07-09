<?php


class AcumulusConnectorTest extends PHPUnit_Framework_TestCase {

    public function tearDown(){
        Mockery::close();
    }

    /**
     * @test
     * @expectedException  Siegerhansma\AcumulusPhp\AcumulusException
     */
    function it_should_fail_when_credentials_are_wrong()
    {
        $config = [
            'contractcode' => 123456,
            'username' => 'xxxxxxxxxxxxxxxxxxxx',
            'password' => 'xxxxxxxxxxxxxxxxxxxxxx'
        ];

        $contact = new \Siegerhansma\AcumulusPhp\Contacts($config);
        $contact->getAvailableContacts([])->sendRequest();
    }

    /** @test
     *  @expectedException Siegerhansma\AcumulusPhp\NoConfigSuppliedException
     */
    function it_should_fail_when_there_is_no_config()
    {
        $contact = new \Siegerhansma\AcumulusPhp\Contacts([]);
        $contact->getAvailableContacts([])->sendRequest();
    }

    /**
     * @test
     * @expectedException Siegerhansma\AcumulusPhp\NoXmlPayloadSuppliedException
     */
    function it_should_fail_when_there_is_no_payload(){
        $config = [
            'contractcode' => 123456,
            'username' => 'xxxxxxxxxxxxxxxxxxxx',
            'password' => 'xxxxxxxxxxxxxxxxxxxxxx'
        ];

        $invoice = '';

        $invoices = new \Siegerhansma\AcumulusPhp\Invoices($config);
        $invoices->addInvoice($invoice)->sendRequest();


    }





}
 