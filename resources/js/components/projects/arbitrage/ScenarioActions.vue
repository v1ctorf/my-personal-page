<template>

</template>

<script>
    export default {
        name: "ScenarioActions",
        props: ['scenario'],
        mounted() {
            this.getLatestHistory();
        },
        data() {
            return {
                actions: null
            }
        },
        methods: {
            getLatestHistory() {
                let uri = `${this.$apiBaseUri}scenarios/${this.scenario.name}/history/latest`;

                axios.get(uri).then(response => {
                    this.actions = response.data.data.steps;
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
