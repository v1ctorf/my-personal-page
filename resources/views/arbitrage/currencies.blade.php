@extends('layouts.app')

@section('title', 'Arbitrage - Currencies')

@section('content')

<div class="container mt-4">
    <h2 class="mb-4 text-secondary">Arbitrage - Currencies</h2>
    
    <div class="row">
        <table class="table table-dark text-center">
            <thead>
                <tr>
                    <th>Active</th>
                    <th>Currency</th>
                    <th>Name</th>
                    <th>Tx Fee</th>
                    <th>in USD</th>
                    <th>Verified In</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($currencies as $c)
                    @isset($c->txFee)
                    <tr>
                        <td class="text-{{ $c->active ? 'success' : 'white' }}">
                            {{ $c->active ? 'Active' : 'Inactive' }}
                        </td>
                        <td>
                            {{ $c->name }}
                        </td>
                        <td class="text-uppercase">
                            {{ $c->identifier }}
                        </td>
                        <td>{{ $c->txFee }}</td>
                        <td>TBC</td>
                        <td>
                            {{ $c->txFeeVerifiedIn ?
                                Carbon\Carbon::parse($c->txFeeVerifiedIn)->diffForHumans() :
                                'no data'}} 
                        </td>                        
                        <td>
                            <a href="{{ route('update-tx-fee',['identifier' => $c->identifier]) }}"
                                class="btn btn-sm btn-info">
                                Check Fee
                            </a>
                        </td>
                    </tr>
                    @endisset
                @endforeach
            </tbody>
        </table>    
    </div>    

    <div class="row">
        <div class="col-md-6 text-left">
            {{-- <a href="{{ route('snapshot-all') }}" class="btn btn-success">
                Snapshot All
            </a> --}}
        </div>
        <div class="col-md-6 text-right">
            <a href="{{ route('arbitrage') }}" class="btn btn-outline-secondary">
                Back
            </a>
        </div>
    </div>    
</div>

@endsection