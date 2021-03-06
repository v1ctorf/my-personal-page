@extends('layouts.app')

@section('title', 'Arbitrage - Exchanges')

@section('content')

<div class="container mt-4">
    <h2 class="mb-4">
        <a href="{{ route('exchanges') }}" class="text-secondary">
            Arbitrage - Exchanges
        </a>
    </h2>   
    
    <div class="row">
        <table class="table table-dark text-center">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Fees Verified In</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($exchanges as $e)
                    <tr>
                        <td>
                            <a href="{{ route('exchange', ['name' => $e->identifier]) }}" class="text-white">
                                {{ $e->name }}
                            </a>
                        </td>
                        <td>
                            {{ $e->feesPageVerifiedIn ?
                                Carbon\Carbon::parse($e->feesPageVerifiedIn)->diffForHumans() :
                                'not verified' }}
                        </td>
                    </tr>
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