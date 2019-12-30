@extends('layouts.app')

@section('title', 'Arbitrage - Exchanges')

@section('content')

<div class="container mt-4">
    <h2 class="mb-4">
        <a href="{{ route('exchange', ['exchange' => $exchange->identifier]) }}" class="text-secondary">
            {{ $exchange->name }}
        </a>
    </h2>   
    
    <div class="row text-white">
        <div class="col-md-6">
            <ul class="list-group list-group-flush">
                <li class="list-group-item bg-dark">
                    <a href="{{ $exchange->feesUrl }}" target="_blank">
                        Exchange Fee Page
                    </a>
                    <small>({{ 
                        $exchange->feesPageVerifiedIn ?
                            Carbon\Carbon::parse($exchange->feesPageVerifiedIn)->diffForHumans() :
                            'Verification Pending'
                    }})</small>   
                </li>
                @foreach ($exchange->fees as $fee)
                    @isset($fee->orderType)
                        <li class="list-group-item bg-dark">
                            {{ ucfirst($fee->orderType) }}: {{ $fee->percentage > 0 ? rtrim($fee->percentage, 0) .'%' : 'free' }}
                        </li>
                    @endisset
                    @isset($fee->transactionType)
                        <li class="list-group-item bg-dark">
                            {{ ucfirst($fee->transactionType) }} ({{ strtoupper($fee->currency) }}): 
                            @isset($fee->value)
                                {{ $fee->value > 0 ? strtoupper($fee->currency) . ' '. rtrim($fee->value, 0) : 'free' }} 
                            @endisset
                            @isset($fee->percentage)
                                {{ rtrim($fee->percentage,0) }}%
                            @endisset
                        </li>
                    @endisset
                @endforeach
            </ul>
        </div>    
    </div> 

    <div class="row mt-5">
        <div class="col-md-6 text-left">
            @if ($exchange->feesPageVerifiedIn)
                <a href="{{ route('check-exchange-fee', ['exchange' => $exchange->identifier]) }}" 
                    class="btn btn-info">
                    Check Updates In Fee Page
                </a>            
            @else
                <a href="{{ route('verify-exchange-fee', ['exchange' => $exchange->identifier]) }}" 
                    class="btn btn-danger">
                    Mark Fee Page As Verified
                </a>                            
            @endif
        </div>
        <div class="col-md-6 text-right">
            <a href="{{ route('exchanges') }}" class="btn btn-outline-secondary">
                Back
            </a>
        </div>
    </div>    
</div>

@endsection