<?php
/**
 * Created by PhpStorm.
 * User: sieger
 * Date: 2-7-14
 * Time: 23:12
 */

namespace Siegerhansma\AcumulusPhp;
use Siegerhansma\AcumulusPhp\Exceptions\NotAnArrayException;

/**
 * Class XmlBuilder
 * @package Siegerhansma\AcumulusPhp
 */
class XmlBuilder
{
    /**
     * Builds the actual XML being sent to Acumulus
     * @param $xmlPayload
     * @param $config
     * @return string
     * @throws ConfigNotAnArrayException
     */
    public function buildXML($xmlPayload, $config)
    {
        if (!is_array($config)) {
            throw new NotAnArrayException("Config should be an array");
        }

        $xml = '<?xml version="1.0" encoding="UTF-8"?>';
        $xml .= '<myxml>';
        $xml .= '<format>json</format>';
        $xml .= '<contract>';
        $xml .= sprintf('<contractcode>%d</contractcode>', $config['contractcode']);
        $xml .= sprintf('<username>%s</username>', $config['username']);
        $xml .= sprintf('<password>%s</password>', $config['password']);

        if (isset($config['email'])) {
            $xml .= sprintf('<emailonerror>%s</emailonerror>', $config['email']);
            $xml .= sprintf('<emailonwarning>%s</emailonwarning>', $config['email']);
        }

        $xml .= '</contract>';

        $xml .= $xmlPayload;

        $xml .= '</myxml>';

        return $xml;
    }

}
