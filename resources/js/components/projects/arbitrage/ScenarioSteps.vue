<template>
    <div class="col-md-6">
        <dl v-if="steps.length > 0" class="row text-secondary">
            <template v-for="(step, i) in steps">
                <dt class="col-md-2 text-capitalize">Step {{ i + 1 }}</dt>
                <scenario-step-transfer v-if="step.action == 'transfer'" :step="step"></scenario-step-transfer>
                <scenario-step-trade v-else :step="step"></scenario-step-trade>
            </template>
        </dl>
        <p v-else class="text-white">Loading...</p>
    </div>
</template>

<script>
    export default {
        name: "ScenarioSteps",
        props: ['scenario'],
        mounted() {
            this.getLatestHistory();
        },
        data() {
            return {
                steps: []
            }
        },
        methods: {
            getLatestHistory() {
                let uri = `${this.$apiBaseUri}/scenarios/${this.scenario.name}/history/latest`;

                axios.get(uri).then(response => {
                    this.steps = response.data.data.steps;

                });
            }
        }
    }
</script>

<style scoped>

</style>
