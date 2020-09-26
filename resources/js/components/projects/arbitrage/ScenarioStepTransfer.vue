<template>
    <dd class="col-md-10 text-white">
        <i class="fas fa-paper-plane"></i> {{ step.amount.currency.toUpperCase() }} {{ step.amount.value }} from {{
            step.details.sender.identifier.split('-').join(' ').toUpperCase() }} to {{
            step.details.receiver.identifier.split('-').join(' ').toUpperCase() }}
        <br><small class="text-secondary">
            <i v-if="step.details.sender.feesVerifiedIn"
               class="fa fa-check-circle"
               :title="`Fee verified in ${ step.details.sender.feesVerifiedIn }.`"></i>
            <i v-else class="fa fa-question-circle" title="Fee had expired."></i> {{
                parseFloat(step.amount.value).toString() }} - {{ parseFloat(step.details.txFee.value).toString() }} - {{
                parseFloat(step.details.exchangesFees).toString() }} = {{ step.result.currency.toUpperCase()
                }} {{ parseFloat(step.result.value).toString() }}
        </small>
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
