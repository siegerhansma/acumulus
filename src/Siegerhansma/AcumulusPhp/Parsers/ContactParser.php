<?php
namespace Siegerhansma\AcumulusPhp\Parsers;

use Siegerhansma\AcumulusPhp\Models\Contact;

/**
 * Class ContactParser
 * @package Siegerhansma\AcumulusPhp\Parsers
 */
class ContactParser extends Parser implements ParserInterface
{
    /**
     * @param $contact
     */
    public function __construct($contact)
    {
        $this->contact = $contact;
    }

    /**
     * @return null
     */
    public function parse()
    {
        if (empty($this->contact)) {
            return null;
        }
        $model = new Contact();

        return $this->buildModel($this->contact, $model);
    }
}
