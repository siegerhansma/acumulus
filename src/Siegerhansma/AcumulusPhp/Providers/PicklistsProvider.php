<?php namespace Siegerhansma\AcumulusPhp\Providers;
use Siegerhansma\AcumulusPhp\AcumulusConnector;

/**
 * Class Picklists
 * @package Siegerhansma\AcumulusPhp
 */
class PicklistsProvider extends AcumulusConnector
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
