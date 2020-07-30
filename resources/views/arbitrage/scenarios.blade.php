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
</div>

@endsection
