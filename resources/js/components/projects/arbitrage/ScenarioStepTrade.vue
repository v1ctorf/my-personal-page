<template>
    <dd class="col-md-10 text-white">
        <i class="fas fa-exchange-alt"></i> {{ step.action[0].toUpperCase() + step.action.substring(1) }} {{
            step.details.pair.toUpperCase() }} in {{ step.details.exchange.split('-').join(' ').toUpperCase() }}
        <br><small class="text-secondary">
            <i v-if="step.details.fee.fees_page_verified_in" class="fa fa-check-circle"
               :title="`Fees verified in ${ step.details.fee.fees_page_verified_in }.`"></i>
            <i v-else class="fa fa-question-circle" title="Exchange fees to be verified."></i> ({{
            step.amount.currency.toUpperCase() }} {{ parseFloat(step.amount.value).toString() }} {{
            step.action == 'buy' ? '/' : '*' }} {{ step.result.currency.toUpperCase() }} {{
            parseFloat(step.details.ticker).toString() }}) - {{ parseFloat(step.details.fee.percentage).toString() }}% = {{
            step.result.currency.toUpperCase() }} {{ parseFloat(step.result.value).toString() }}
        </small>
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
