@extends('layouts.app')

@section('title', 'Arbitrage - Exchanges')

@section('content')

<div class="container mt-4">
    <h2 class="mb-4">
        <a href="{{ route('exchange', ['exchange' => $exchange->identifier]) }}" class="text-secondary">
            {{ $exchange->name }}
        </a>
    </h2>   
    
    <div class="row">
        {{ var_dump($exchange) }}
    </div>    


    <div class="row">
        <div class="col-md-6 text-left">
            {{-- <a href="{{ route('snapshot-all') }}" class="btn btn-success">
                Snapshot All
            </a> --}}
        </div>
        <div class="col-md-6 text-right">
            <a href="{{ route('exchanges') }}" class="btn btn-outline-secondary">
                Back
            </a>
        </div>
    </div>    
</div>

@endsection