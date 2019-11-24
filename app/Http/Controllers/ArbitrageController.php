<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client as GuzzleClient;

class ArbitrageController extends Controller
{
    private $client;

    public function __construct()
    {
        $options = [				
            'base_uri' => config('app.api_url'),
            'headers' => [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ],
            'timeout'  => 60.0
        ];

        $this->client = new GuzzleClient($options);

    }

    public function index()
    {
        return 'tada';
    }
}
