<?php
/**
 * API Library for CURLEC
 * User: Mohd Nazrul Bin Mustaffa
 * Date: 18/07/2018
 */

namespace MohdNazrul\CURLECLaravel;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

class CURLECApi
{
    private $serviceURL;

    public function __construct($serviceUrl)
    {
        $this->serviceURL = $serviceUrl;
    }

    public function doTransaction($method, $parameter)
    {
        if (substr($this->serviceURL, -1) != '/')
            $this->serviceURL = $this->serviceURL . '/';

        $url = $this->serviceURL . $parameter;

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => $method,
            CURLOPT_HTTPHEADER => array(
                'cache-control: no-cache',
                'Content-Type: application/json',
                'Connection: Keep-Alive'
            ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);

        if (!empty($err)) {
            return $err;
        }

        return $response;
    }


}