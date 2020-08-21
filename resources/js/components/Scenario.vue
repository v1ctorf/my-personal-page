<template>
    <div class="container mt-4">
        <h2 class="mb-4 text-secondary" @click="refreshPage">
            {{ name }}
            <small v-if="scenario && scenario.active == false">(Inactive)</small>
            <small v-if="scenario" :class="{
                'text-danger' : scenario.lastPremiumFound <= 0,
                'text-warning': 0 < scenario.lastPremiumFound <= 0.25,
                'text-success': 0.25 < scenario.lastPremiumFound
            }">
                {{ scenario.lastPremiumFound }}%
            </small>
        </h2>

        <div v-if="scenario" class="row">
            <scenario-chart :name="name"></scenario-chart>
        </div>

        <div v-if="scenario" class="row mt-5">
            <scenario-details :scenario="scenario"></scenario-details>
<!--            {{&#45;&#45;        @include('arbitrage.actions')&#45;&#45;}}-->
        </div>

        <div v-if="scenario" class="row">
            <div class="col-md-6 text-left">
                <de-activate-scenario-btn
                    :active="scenario.active"
                    :name="scenario.name"
                ></de-activate-scenario-btn>

                <snapshot-scenario-btn :name="name"></snapshot-scenario-btn>

                <a class="btn btn-info" href="#">
<!--                <a class="btn btn-info" href="{{ route('scenario-history', ['name' => $scenario->name]) }}">-->
                    History
                </a>
            </div>

            <div class="col-md-6 text-right">
                <a href="/arbitrage/scenarios" class="btn btn-outline-secondary">Back</a>
            </div>
        </div>

        <p v-if="!scenario" class="text-light">Loading...</p>
    </div>
</template>

<script>
    import SwitchScenarioActivationButton from "./SwitchScenarioActivationButton";
    export default {
        name: 'Scenario',
        components: {SwitchScenarioActivationButton},
        props: ['name'],
        data() {
            return {
                scenario: null,
            }
        },
        mounted() {
            this.getScenarioData();

            this.$root.$on('markScenarioAsActive', isActive => {
                this.scenario.active = isActive;
            })
        },
        methods: {
            getScenarioData() {
                let uri = `${this.$apiBaseUri}scenarios/${this.name}`;

                axios.get(uri).then(response => {
                    this.scenario = response.data.data;
                    document.title = `[${ response.data.data.lastPremiumFound }] ${this.name}`;
                });
            },
            refreshPage() {
                location.reload(true);
            }
        }
    }
</script>

<style scoped>
    .mb-4.text-secondary { cursor: pointer }
</style>
