<template>
    <div class="col-md-6">
        <dl class="row text-secondary">
            <dt class="col-md-3">Status</dt>
            <dd class="col-md-9" :class="{ 'text-success': scenario.active, 'text-danger': !scenario.active }">
                {{ scenario.active ? 'Active' : 'Inactive' }}
            </dd>

            <dt class="col-md-3">Description</dt>
            <dd class="col-md-9 text-white">
                {{ scenario.description }}
            </dd>

            <dt class="col-md-3">Investment</dt>
            <dd class="col-md-9 text-white">
<!--                {{ strtoupper($scenario->investment->a->currency) }} {{ floatval($scenario->investment->a->amount) }} <span class="text-muted">-->
<!--                (USD {{ number_format($scenario->investment->a->inUSD, 2) }})-->
<!--            </span>-->
            </dd>

            <dt class="col-md-3">Created At</dt>
            <dd class="col-md-9 text-white">
<!--                {{ Carbon\Carbon::parse($scenario->createdAt)->toDayDateTimeString() }} <span class="text-secondary">-->
<!--                    ({{ $scenario->createdAt ?-->
<!--                        Carbon\Carbon::parse($scenario->createdAt)->diffForHumans() :-->
<!--                        'no data'-->
<!--                    }})-->
<!--                </span>-->
            </dd>

            <dt class="col-md-3">Updated At</dt>
            <dd class="col-md-9 text-white">
<!--                {{ Carbon\Carbon::parse($scenario->updatedAt)->toDayDateTimeString() }} <span class="text-secondary">-->
<!--                    ({{ $scenario->updatedAt ?-->
<!--                        Carbon\Carbon::parse($scenario->updatedAt)->diffForHumans() :-->
<!--                        'no data'-->
<!--                    }})-->
                </span>
            </dd>
        </dl>
    </div>

</template>

<script>
    export default {
        name: "ScenarioDetails",
        props: {
            scenario: Object
        }
    }
</script>
