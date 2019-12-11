@extends('layouts.app')

@section('title', 'Arbitrage - Currencies')

@section('content')

<div class="container mt-4">
    <h2 class="mb-4 text-secondary">Arbitrage - Currencies</h2>
    
    <div class="row">
        <table class="table table-dark text-center">
            <thead>
                <tr>
                    <th>Currency</th>
                    <th>Tx Fee</th>
                    <th>Verified</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($currencies as $c)
                    @isset($c->txFee)
                    <tr>
                        <td>
                            {{ $c->name }}
                            @if ($c->active == false)
                                <br><small>(Inactive)</small>
                            @endif
                        </td>
                        <td>
                            <span class="text-uppercase">
                                {{ $c->identifier }}
                            </span>{{ rtrim($c->txFee, 0) }}
                            <br><small>
                                (USD 999.99)
                            </small>
                        </td>
                        <td>
                            <span>{{ $c->txFeeVerifiedIn ?
                                Carbon\Carbon::parse($c->txFeeVerifiedIn)->diffForHumans() :
                                'no data'}}</span><br><small> 
                                <a href="{{ route('update-tx-fee',['identifier' => $c->identifier]) }}"
                                    class="">
                                    Check Fee
                                </a>
                            </small>
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