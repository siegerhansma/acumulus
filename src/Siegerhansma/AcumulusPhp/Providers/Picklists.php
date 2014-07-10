<?php namespace Siegerhansma\AcumulusPhp;

/**
 * Class Picklists
 * @package Siegerhansma\AcumulusPhp
 */
class Picklists extends AcumulusConnector
{
    /**
     * @return $this
     */
    public function getAccounts()
    {
        $this->apiCall = 'picklists/picklist_accounts.php';
        $this->xmlPayload = null;

        return $this;
    }

}
