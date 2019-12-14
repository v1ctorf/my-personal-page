@extends('layouts.app')

@section('title', 'Arbitrage')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card bg-dark">
                <div class="card-header text-light">Arbitrage</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <ul class="list-group list-group-flush">                        
                        <li class="list-group-item bg-dark">
                            <a href="{{ route('scenarios') }}">
                                Scenarios
                            </a>
                        </li>
                        <li class="list-group-item bg-dark">
                            <a href="{{ route('currencies') }}">
                                Currencies
                            </a>
                        </li>
                        <li class="list-group-item bg-dark">
                            <a href="{{ route('exchanges') }}">
                                Exchanges
                            </a>
                        </li>
                        <li class="list-group-item bg-dark">
                            <a href="{{route('home')}}" class="text-muted">
                                Home
                            </a>
                        </li>
                    </ul>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
