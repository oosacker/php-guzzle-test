<?php

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
require_once 'api_key.php';
require 'vendor/autoload.php';

class MyAPIReader 
{
    private $BASE_URL;

    function __construct($base_url)
    {
        $this->BASE_URL = $base_url;
    }

    
    function executePost($endPoint, $data)
    {
        try {
            $client = new Client();
            $url = $this->BASE_URL . $endPoint;

            $response = $client->post($url, [
                'json' => $data
            ]);

            if(isset($response)) {
                $data = json_encode(
                    json_decode(
                        $response
                        ->getBody()
                        ->getContents()
                    ), 
                    JSON_PRETTY_PRINT);
                echo '<pre>' . $data . '</pre>';
            }
            return $response;

        } catch (RequestException $e) {
            
            if ($e->hasResponse()) {
                $response = $e->getResponse();

                echo 'HTTP status code: <br>' . $response->getStatusCode() . '<br>';
                echo '<br>';

                echo 'Response message: <br>' . $response->getReasonPhrase() . '<br>';
                echo '<br>';

                echo 'Body: <br>' . $response->getBody() . '<br>';
                echo '<br>';

                echo 'Headers: <br>';
                print_r($response->getHeaders()); 
                echo '<br>';

            }
        }
    }


    function executeGet($endPoint)
    {
        try {
            $client = new Client();
            $url = $this->BASE_URL . $endPoint;
            $response = $client->get($url);

            if(isset($response)) {
                $data = json_encode(
                    json_decode(
                        $response
                        ->getBody()
                        ->getContents()
                    ), 
                    JSON_PRETTY_PRINT);

                echo '<pre>' . $data . '</pre>';
            }
            return $response;

        } catch (RequestException $e) {

            if ($e->hasResponse()) {
                $response = $e->getResponse();

                echo 'HTTP status code: <br>' . $response->getStatusCode() . '<br>';
                echo '<br>';

                echo 'Response message: <br>' . $response->getReasonPhrase() . '<br>';
                echo '<br>';

                echo 'Body: <br>' . $response->getBody() . '<br>';
                echo '<br>';

                echo 'Headers: <br>';
                print_r($response->getHeaders()); 
                echo '<br>';

            }
        }
    }


    function Main() 
    {
        echo API_KEY;
    }
    
}