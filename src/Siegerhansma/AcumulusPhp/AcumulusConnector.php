<?php
/**
 * Created by PhpStorm.
 * User: sieger
 * Date: 2-7-14
 * Time: 23:06
 */

namespace Siegerhansma\AcumulusPhp;

use GuzzleHttp;


/**
 * @property GuzzleHttp\Client client
 */
abstract class AcumulusConnector {

    protected $apiUrl = 'https://api.sielsystems.nl/acumulus/stable/';
    protected $client;
    protected $xml;

    protected $apiCall;
    protected $xmlPayload;

    function __construct(array $config)
    {

        $this->client = new GuzzleHttp\Client(['base_url' => $this->apiUrl]);
        $this->xml = new XmlBuilder;
        $this->config = $config;
    }

    public function sendRequest($returnApiCall = false)
    {
        // Some functions need to return the URL instead of send the request.
        if(preg_match('/invoice_get_pdf/', $this->apiCall)){
            return $this->apiUrl . $this->apiCall;
        }

        if(empty($this->config)){
            throw new NoConfigSuppliedException("There is no config supplied.");
        }

        if(empty($this->xmlPayload) and !is_null($this->xmlPayload)){
            throw new NoXmlPayloadSuppliedException("There is no payload.");
        }

        $request = $this->client->post(
            $this->apiCall,
            [
                'body' => [
                    'xmlstring' => $this->xml->buildXML($this->xmlPayload, $this->config)
                ]
            ]);


        return $this->parseResponse($request);

    }

    private function parseResponse($response)
    {
        $parser = new ResponseParser($response);
        return $parser->parse();
    }
}