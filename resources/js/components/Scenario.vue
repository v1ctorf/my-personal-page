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
<!--            {{&#45;&#45;        @include('arbitrage.scenario-details')&#45;&#45;}}-->
<!--            {{&#45;&#45;        @include('arbitrage.actions')&#45;&#45;}}-->
        </div>

        <div v-if="scenario" class="row">
            <div class="col-md-6 text-left">
                <button type="button" @click="switchActiveFlag" class="btn" :class="{
                    'btn-outline-light': scenario.active,
                    'btn-light': !scenario.active }">
                    {{ scenario.active ? 'Deactivate' : 'Activate' }}
                </button>
<!--                <a href="{{ route('snapshot', ['name' => $scenario->name]) }}" class="btn btn-success">-->
                <a href="#" class="btn btn-success">
                    Snapshot
                </a>
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
    export default {
        name: "Scenario",
        props: ['name'],
        data() {
            return {
                scenario: null,
            }
        },
        mounted() {
            this.getScenarioData();
        },
        methods: {
            getScenarioData() {
                let uri = `${this.$apiBaseUri}scenarios/${this.name}`;

                axios.get(uri).then(response => {
                    this.scenario = response.data.data;
                });
            },
            refreshPage() {
                location.reload(true);
            },
            switchActiveFlag() {
                let uri = `${this.$apiBaseUri}scenarios/${this.name}/activate`,
                    httpMethod = this.scenario.active ? 'delete' : 'patch';

                axios[httpMethod](uri).then(response => {
                    if (response.status == 204) {
                        this.scenario.active = !this.scenario.active;
                    } else {
                        throw `switchActiveFlag: can't handle http code ${response.status}`;
                    }
                });
            },
        }
    }
</script>

<style scoped>
    .mb-4.text-secondary { cursor: pointer }
</style>
