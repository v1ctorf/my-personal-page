@extends('layouts.app')

@section('title', 'Arbitrage')

@section('content')

<div class="container mt-4">
    <h2 class="mb-4 text-secondary">Arbitrage</h2>   
    
    <div class="row">
        <table class="table table-dark">
            <thead>
                <tr>
                    <th>Active</th>
                    <th>Premium</th>
                    <th>Name</th>
                    <th>Investment</th>
                    <th>in USD</th>
                    <th>Updated At</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($scenarios as $scenario)
                    <tr>
                        <td>
                            {{ $scenario->active ? 'Yes' : 'No' }}
                        </td>
                        <td>
                            {{ $scenario->lastPremiumFound }}%
                        </td>
                        <td>
                            <a href="{{ route('scenario', ['name' => $scenario->name]) }}">
                                {{ $scenario->name }}
                            </a>
                        </td>
                        <td>{{ strtoupper($scenario->currency) }} {{ floatval($scenario->investment) }}</td>
                        <td>{{ number_format($scenario->inUSD, 2) }}</td>
                        <td>
                            @if ($scenario->updatedAt)
                                {{ Carbon\Carbon::parse($scenario->updatedAt)->diffForHumans() }}
                            @else
                                -
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>    
    </div>    


    <div class="row">
        <div class="col-md-12 text-right">
            <a href="{{ route('home') }}" class="btn btn-outline-secondary">Back</a>
        </div>
    </div>    
</div>

@endsection

{{-- @section('js')
<script>
    
</script>
@endsection --}}