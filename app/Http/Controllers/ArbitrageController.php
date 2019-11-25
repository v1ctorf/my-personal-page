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
        $resp = $this->client->get('scenarios');
        $scenarios = collect(json_decode($resp->getBody()->getContents())->data);
        
        return view('arbitrage.scenarios', compact('scenarios'));
    }
    

    
    public function show($scenarioName)
    {
        $resp = $this->client->get("scenarios/$scenarioName");
        $scenario = json_decode($resp->getBody()->getContents())->data;
                
        return view('arbitrage.scenario', compact('scenario'));
    }
}
