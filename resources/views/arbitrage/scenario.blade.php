@extends('layouts.app')

@section('title', 'Scenario')

@section('content')

<div class="container mt-4">
    <h2 class="mb-4 text-secondary">
        Scenario
    </h2>   
    
    <div class="row">
        {{ var_dump($scenario) }}
    </div>    

    <div class="row">
        {{ var_dump($scenario->actions) }}
    </div>    

    <div class="row">
        <div class="col-md-12 text-right">
            <a href="{{ route('arbitrage') }}" class="btn btn-outline-secondary">Back</a>
        </div>
    </div>    
</div>

@endsection

{{-- @section('js')
<script>
    
</script>
@endsection --}}