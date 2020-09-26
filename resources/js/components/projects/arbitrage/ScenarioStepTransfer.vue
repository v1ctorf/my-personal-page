<template>
    <dd class="col-md-10 text-white">
        <i class="fas fa-paper-plane"></i> {{ step.amount.currency.toUpperCase() }} {{ step.amount.value }} from {{
            step.details.sender.identifier.split('-').join(' ').toUpperCase() }} to {{
            step.details.receiver.identifier.split('-').join(' ').toUpperCase() }}

        <!--        <small class="text-secondary">-->
        <!--            @if ($s->details->sender->feesVerifiedIn)-->
        <!--            <i class="fa fa-check-circle" title="Fee verified in {{ $s->details->sender->feesVerifiedIn }}."></i>-->
        <!--            @else-->
        <!--            <i class="fa fa-question-circle" title="Fee had expired."></i>-->
        <!--            @endif-->
        <!--            {{ $s->amount->value }} - {{ $s->details->txFee->value-->
        <!--            }} - {{ rtrim($s->details->exchangesFees, 0)-->
        <!--            }} = {{ strtoupper($s->result->currency) }} {{ $s->result->value }}-->
        <!--        </small>-->
    </dd>
</template>

<script>
    export default {
        name: "ScenarioStepTransfer",
        props: ['step']
    }
</script>

<style scoped>

</style>
