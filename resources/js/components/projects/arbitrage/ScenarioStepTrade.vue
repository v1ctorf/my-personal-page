<template>
    <dd class="col-md-10 text-white">
        <i class="fas fa-exchange-alt"></i> {{ step.action[0].toUpperCase() + step.action.substring(1) }} {{
            step.details.pair.toUpperCase() }} in {{ step.details.exchange.split('-').join(' ').toUpperCase() }}

<!--        <small class="text-secondary">-->
<!--            @if ($s->details->fee->fees_page_verified_in)-->
<!--            <i class="fa fa-check-circle" title="Fees verified in {{ $s->details->fee->fees_page_verified_in }}."></i>-->
<!--            @else-->
<!--            <i class="fa fa-question-circle" title="Exchange fees to be verified."></i>-->
<!--            @endif-->
<!--            ({{ strtoupper($s->amount->currency) }} {{ rtrim($s->amount->value, 0)-->
<!--            }} {{ $s->action == 'buy' ? '/' : '*'}} {{ rtrim($s->details->ticker, 0)-->
<!--            }}) - {{ number_format($s->details->fee->percentage, 2)-->
<!--            }}% = {{ strtoupper($s->result->currency) }} {{ $s->result->value }}-->
<!--        </small>-->
    </dd>
</template>

<script>
    export default {
        name: "ScenarioStepTrade",
        props: ['step']
    }
</script>

<style scoped>

</style>
