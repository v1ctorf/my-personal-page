@extends('layouts.app')

@section('title', 'Arbitrage - Scenarios')

@section('content')

<div class="container mt-4">
    <h2 class="mb-4">
        <a href="{{ route('scenarios') }}" class="text-secondary">
            Arbitrage - Scenarios
        </a>
    </h2>

    <last-snapshots></last-snapshots>




    <div class="row">
        <div class="col-md-6 text-left">
            <a href="{{ route('snapshot-all') }}" class="btn btn-success">
                Snapshot All
            </a>
        </div>
        <div class="col-md-6 text-right">
            <a href="{{ route('arbitrage') }}" class="btn btn-outline-secondary">
                Back
            </a>
        </div>
    </div>
</div>

@endsection
