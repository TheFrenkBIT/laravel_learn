<?php

namespace App\Components;

use GuzzleHttp\Client;

class ImportDataClient
{
    public Client $client;
    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://jsonplaceholder.typicode.com/'
        ]);
    }
}
