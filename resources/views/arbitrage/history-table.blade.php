@extends('layouts.app')

@section('title', $scenario->name)

@section('content')

<div class="container mt-4">
    <h2 class="mb-4">
        <a href="{{ route('scenario-history', ['name' => $scenario->name]) }}" 
            class="text-secondary">{{ $scenario->name }} - History
        </a>
    </h2>

    <div class="row">
        <table class="table table-dark table-borderless table-hover table-sm text-center mt-3"> 
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Created At</th>
                    <th scope="col">Investment ({{ strtoupper($scenario->currency) }})</th>
                    <th scope="col">Result ({{ strtoupper($scenario->currency) }})</th>
                    <th scope="col">Investment (USD)</th>
                    <th scope="col">Result (USD)</th>
                    <th scope="col">Premium</th>
                    <th scope="col">Premium %</th>
                </tr>
            </thead>
            <tbody>
                @foreach (json_decode($history)->data as $h)
                    <tr>
                        <td>{{ Carbon\Carbon::parse($h->createdAt)->format('Y-m-d H:i:s') }}</td>
                        <td>{{ number_format($h->investment,6) }}</td>
                        <td>{{ $h->result }}</td>
                        <td>{{ $h->inUSD }}</td>
                        <td>{{ $h->resultInUSD }}</td>
                        <td>{{ $h->premium }}</td>
                        <td>{{ $h->premiumPct }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="row">
        <div class="col-md-12 text-right">            
            <a href="{{ route('scenario', ['name' => $scenario->name]) }}" class="btn btn-outline-secondary">
                Back
            </a>
        </div>
    </div>    
</div>

@endsection