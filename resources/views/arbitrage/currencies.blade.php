@extends('layouts.app')

@section('title', 'Arbitrage - Currencies')

@section('content')

<div class="container mt-4">
    <h2 class="mb-4">
        <a href="{{ route('currencies') }}" class="text-secondary">
            Arbitrage - Currencies
        </a>
    </h2>   
    
    <div class="row">
        <table class="table table-dark text-center table-sm">
            <thead>
                <tr>
                    <th>Currency</th>
                    <th>In USD</th>
                    <th>Ticker Verified In</th>
                    <th>Tx Fee</th>
                    <th>Fee Verified In</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($currencies as $c)
                    @isset($c->ticker)
                    <tr>
                        <td>
                            {{ $c->name }}
                            @if ($c->active == false)
                                <br><small>(Inactive)</small>
                            @endif
                        </td>

                        <td>
                            {{ number_format($c->ticker->inUSD, 2) }}
                        </td>
                        <td>
                            @if (strtoupper($c->identifier) != 'USD')
                                <span>{{ $c->txFee->verifiedIn ?
                                    Carbon\Carbon::parse($c->ticker->verifiedIn)->diffForHumans() :
                                    'no data'}}</span><br><small> 
                                    <a href="{{ route('update-in-usd',['identifier' => $c->identifier]) }}">
                                        (Check Fee)
                                    </a>
                                </small>                                
                            @else
                                N/A
                            @endif
                        </td>

                        <td>
                            @if ($c->txFee->value == 0)
                                N/A
                            @else
                                <span class="text-uppercase">
                                    {{ $c->identifier }}
                                </span>{{ rtrim($c->txFee->value, 0) }}
                                <br><small>
                                    (USD {{ $c->txFee->inUSD }})
                                </small>                                
                            @endif
                        </td>
                        <td>
                            @if ($c->txFee->value == 0)
                                N/A
                            @else
                                <span>{{ $c->txFee->verifiedIn ?
                                    Carbon\Carbon::parse($c->txFee->verifiedIn)->diffForHumans() :
                                    'no data'}}</span><br><small> 
                                    <a href="{{ route('update-tx-fee',['identifier' => $c->identifier]) }}">
                                        (Check Fee)
                                    </a>
                                </small>                                
                            @endif
                        </td>                        
                    </tr>
                    @endisset
                @endforeach
            </tbody>
        </table>    
    </div>    

    <div class="row">
        <div class="col-md-6 text-left"></div>
        <div class="col-md-6 text-right">
            <a href="{{ route('arbitrage') }}" class="btn btn-outline-secondary">
                Back
            </a>
        </div>
    </div>    
</div>

@endsection