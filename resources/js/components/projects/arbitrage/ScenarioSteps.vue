<template>
    <div class="col-md-6">
        <dl class="row text-secondary">
            <template v-for="(step, i) in steps">
                <dt class="col-md-2 text-capitalize">Step {{ i + 1 }}</dt>
                <scenario-step-transfer v-if="step.action == 'transfer'" :step="step"></scenario-step-transfer>
                <scenario-step-trade v-else :step="step"></scenario-step-trade>
            </template>
        </dl>
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
                let uri = `${this.$apiBaseUri}scenarios/${this.scenario.name}/history/latest`;

                axios.get(uri).then(response => {
                    this.steps = response.data.data.steps;
                    // document.title = `[${ response.data.data.lastPremiumFound }] ${this.name}`;
                });
            }
        }
        //        $resp = $this->client->get("scenarios/{$scenarioName}/history/latest");
//        $latest = json_decode($resp->getBody()->getContents())->data;
    }
</script>

<style scoped>

</style>
