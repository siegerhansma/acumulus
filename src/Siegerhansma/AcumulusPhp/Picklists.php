<?php namespace Siegerhansma\AcumulusPhp;


class Picklists extends AcumulusConnector{

    public function getAccounts(){
        $this->apiCall = 'picklists/picklist_accounts.php';
        $this->xmlPayload = null;

        return $this;
    }


} 