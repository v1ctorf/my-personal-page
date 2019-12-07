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
        <canvas id="historyChart"></canvas>
    </div>    
    
    <div class="row mt-5">
        @include('arbitrage.scenario-details')
        @include('arbitrage.actions')
    </div>

    <div class="row collapse mt-5" id="snapshotHistory">
        <div class="col-md-12">
            <h2 class="text-secondary">History</h2>
            @include('arbitrage.history-table')
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 text-left">
            <a href="{{ route('arbitrage') }}" class="btn btn-outline-secondary">Back</a>
        </div>
        <div class="col-md-6 text-right">            
            <a href="{{ route($scenario->active ? 'deactivate' : 'activate', ['name' => $scenario->name]) }}" 
                class="btn btn-{{ $scenario->active ? 'outline-' : '' }}light">
                {{ $scenario->active ? 'Deactivate' : 'Activate' }}
            </a>
            <a class="btn btn-info" data-toggle="collapse" href="#snapshotHistory">
                History
            </a>
            <a href="{{ route('snapshot', ['name' => $scenario->name]) }}" 
                class="btn btn-success">
                Snapshot
            </a>
        </div>
    </div>    
</div>

@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>

<script>
$(function(){
    var history = {!! $history !!};
    var timeFormat = 'MM/DD/YYYY HH:mm:ss';

    var labels = Object.keys(history.data).map(function(key, index){
        return moment(history.data[key].createdAt).format(timeFormat)
    });

    var premium = Object.keys(history.data).map(function(key, index){
        return history.data[key].premiumPct
    });

    var chartData = {
        type: 'line',
        options: {
            elements: {
                line: {
                    tension: 0 // disables bezier curves
                }
            },
            legend: {
                display: false
            },
            scales: {
                xAxes: [{
                    type: 'time',
                    display: true,
                    time: {
                        parser: timeFormat
                    }
                }]
            }
        }
    }

    chartData.data = {
        labels: labels,
        datasets: [{
            backgroundColor: 'rgb(255, 99, 132)',
            borderColor: 'rgb(255, 99, 132)',
            data: premium,
            fill: false,
            gridLines:{
                color:'#CCCCC'
            }
        }]
    }

    var ctx = document.getElementById('historyChart').getContext('2d');
    var chart = new Chart(ctx, chartData);    
});


</script>
@endsection