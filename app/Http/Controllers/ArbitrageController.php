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
            'timeout' => 60.0
        ];

        $this->client = new GuzzleClient($options);
    }


    public function updateTxFee($identifier)
    {
        $this->client->patch("currencies/{$identifier}/tx-fee");

        return redirect()->back();
    }


    public function updateInUsd($identifier)
    {
        $this->client->patch("currencies/{$identifier}/in-usd");

        return redirect()->back();
    }


    public function currencies()
    {
        $resp =  $this->client->get('currencies');
        $currencies = json_decode($resp->getBody()->getContents())->data;

        return view('arbitrage.currencies', compact('currencies'));
    }


    public function exchanges()
    {
        $resp =  $this->client->get('exchanges');
        $exchanges = json_decode($resp->getBody()->getContents())->data;

        return view('arbitrage.exchanges', compact('exchanges'));
    }


    public function exchange($exchange)
    {
        $resp = $this->client->get("exchanges/{$exchange}");
        $exchange = json_decode($resp->getBody()->getContents())->data;

        return view('arbitrage.exchange', compact('exchange'));
    }


    public function checkExchangeFee($exchange)
    {
        $this->client->post("exchanges/{$exchange}/fee-page-check");

        return redirect()->back();
    }


    public function verifyExchangeFee($exchange)
    {
        $this->client->patch("exchanges/{$exchange}/fee-page-verification-date");

        return redirect()->back();
    }
}
