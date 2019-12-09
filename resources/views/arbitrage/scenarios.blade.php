@extends('layouts.app')

@section('title', 'Arbitrage - Scenarios')

@section('content')

<div class="container mt-4">
    <h2 class="mb-4 text-secondary">Arbitrage - Scenarios</h2>   
    
    <div class="row">
        <table class="table table-dark">
            <thead>
                <tr>
                    <th>Status</th>
                    <th>Last Premium Found</th>
                    <th>Name</th>
                    <th>Investment</th>
                    <th>in USD</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($scenarios as $scenario)
                    <tr>
                        <td class="text-{{ $scenario->active ? 'success' : 'white' }}">
                            {{ $scenario->active ? 'Active' : 'Inactive' }}
                        </td>
                        <td class="text-{{ $scenario->lastPremiumFound < 0 ? 
                            'danger' : ($scenario->lastPremiumFound > 0.25 ? 'success' : 'warning')
                            }}">{{ $scenario->lastPremiumFound }}% <small class="text-white">({{ $scenario->updatedAt ?
                                Carbon\Carbon::parse($scenario->updatedAt)->diffForHumans() :
                                'no data'
                            }})</small>
                        </td>
                        <td>
                            <a href="{{ route('scenario', ['name' => $scenario->name]) }}"
                                class="text-white">
                                {{ $scenario->name }}
                            </a>
                        </td>
                        <td>{{ strtoupper($scenario->currency) }} {{ floatval($scenario->investment) }}</td>
                        <td>{{ number_format($scenario->inUSD, 2) }}</td>
                        <td>
                            <a href="{{ route('snapshot', ['name' => $scenario->name]) }}" 
                                class="btn btn-sm btn-success">
                                Snapshot
                            </a>
                            <a href="{{ route('scenario', ['name' => $scenario->name]) }}" 
                                class="btn btn-sm btn-info">
                                Details
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>    
    </div>    


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