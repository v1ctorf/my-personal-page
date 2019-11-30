@extends('layouts.app')

@section('title', $scenario->name)

@section('content')

<div class="container mt-4">
    <h2 class="mb-4 text-secondary">
        <span class="text-white">{{ $scenario->name }}</span> 
        <small class="text-{{ $scenario->lastPremiumFound < 0 ? 
                'danger' : ($scenario->lastPremiumFound > 0.25 ? 'success' : 'warning')
            }}">
                {{ $scenario->lastPremiumFound }}%
        </small>
    </h2>

    <div class="row">
        <canvas id="myChart"></canvas>
    </div>    
    
    <div class="row">
        @include ('arbitrage.scenario-details')
        @include('arbitrage.actions')
    </div>

    <div class="row">
        <div class="col-md-12 text-right">
            <a href="{{ route('snapshot', ['name' => $scenario->name]) }}" 
                class="btn btn-success">
                Snapshot
            </a>
            <a href="{{ route('arbitrage') }}" class="btn btn-outline-secondary">Back</a>
        </div>
    </div>    
</div>

@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<script>
    var ctx = document.getElementById('myChart').getContext('2d');
var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'line',

    // The data for our dataset
    data: {
        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
        datasets: [{
            label: 'My First dataset',
            backgroundColor: 'rgb(255, 99, 132)',
            borderColor: 'rgb(255, 99, 132)',
            data: [0, 10, 5, 2, 20, 30, 45]
        }]
    },

    // Configuration options go here
    options: {}
});
</script>
@endsection