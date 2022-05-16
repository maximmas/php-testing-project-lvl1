<?php

namespace App;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class Loader
{

    private Client $httpClient;

    public function __construct(Client $httpClient)
    {
        $this->httpClient = $httpClient;
    }


    public function getPageContent(string $url): string
    {
        return $this->httpClient->get($url)->getBody()->getContents();
    }

}
