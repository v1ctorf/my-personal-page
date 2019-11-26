@extends('layouts.app')

@section('title', $scenario->name)

@section('content')

<div class="container mt-4">
    <h2 class="mb-4 text-secondary">
        Scenario <span class="text-white">{{ $scenario->name }}</span>
    </h2>   
    
    <dl class="row text-secondary">
        <dt class="col-md-3">Status</dt>
        <dd class="col-md-9 text-{{ $scenario->active ? 'success' : 'danger' }}">
            {{ $scenario->active ? 'Active' : 'Inactive' }}
        </dt>

        <dt class="col-md-3">Description</dt>
        <dd class="col-md-9 text-white">
            {{ $scenario->description }}
        </dt>

        <dt class="col-md-3">Investment</dt>
        <dd class="col-md-9 text-white">
            {{ strtoupper($scenario->currency) }} {{ floatval($scenario->investment) }} <span class="text-muted">
                (USD {{ number_format($scenario->inUSD, 2) }})
            </span>
        </dt>

        <dt class="col-md-3">Last Premium Found</dt>
        <dd class="col-md-9 text-{{ $scenario->lastPremiumFound < 0 ? 
            'danger' : ($scenario->lastPremiumFound > 0.25 ? 'success' : 'warning')
        }}">
            {{ $scenario->lastPremiumFound }}% <span class="text-secondary">
                ({{ $scenario->updatedAt ?
                    Carbon\Carbon::parse($scenario->updatedAt)->diffForHumans() :
                    'no data'
                }})
            </span>
        </dt>

        <dt class="col-md-3">Created At</dt>
        <dd class="col-md-9 text-white">
            {{ Carbon\Carbon::parse($scenario->createdAt)->toDayDateTimeString() }} <span class="text-secondary">
                    ({{ $scenario->createdAt ?
                        Carbon\Carbon::parse($scenario->createdAt)->diffForHumans() :
                        'no data'
                    }})
                </span>
        </dt>

        <dt class="col-md-3">Updated At</dt>
        <dd class="col-md-9 text-white">
            {{ Carbon\Carbon::parse($scenario->updatedAt)->toDayDateTimeString() }} <span class="text-secondary">
                    ({{ $scenario->updatedAt ?
                        Carbon\Carbon::parse($scenario->updatedAt)->diffForHumans() :
                        'no data'
                    }})
                </span>
        </dt>
    </dl>    

    <div class="row">
        @include('arbitrage.actions')
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