<template>
    <div class="container mt-4">
        <h2 v-if="scenario != null" class="mb-4">
            <a href="#" class="text-secondary">
<!--            <a href="{{ route('scenario', ['name' => $scenario->name]) }}" class="text-secondary">-->
                {{ scenario.name }}
<!--            </a><small class="text-{{ $scenario->lastPremiumFound < 0 ? 'danger' : ($scenario->lastPremiumFound > 0.25 ? 'success' : 'warning')}}">-->
            </a><small class="text-light">
                {{ scenario.lastPremiumFound }}%
            </small>
        </h2>

        <div v-if="scenario != null" class="row">
            <canvas id="historyChart"></canvas>
        </div>

        <div v-if="scenario != null" class="row mt-5">
<!--            {{&#45;&#45;        @include('arbitrage.scenario-details')&#45;&#45;}}-->
<!--            {{&#45;&#45;        @include('arbitrage.actions')&#45;&#45;}}-->
        </div>

        <div v-if="scenario != null" class="row">
            <div class="col-md-6 text-left">
                <a href="#" class="btn" :class="{'btn-outline-light': scenario.active, 'btn-light': !scenario.active }">
<!--                <a href="{{ route($scenario->active ? 'deactivate' : 'activate', ['name' => $scenario->name]) }}"-->
                    {{ scenario.active ? 'Deactivate' : 'Activate' }}
                </a>
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
<!--                <a href="{{ route('scenarios') }}" class="btn btn-outline-secondary">-->
                <a href="#" class="btn btn-outline-secondary">
                    Back
                </a>
            </div>
        </div>

        <p v-if="scenario == null">Loading...</p>
    </div>
</template>

<script>
    export default {
        name: "Scenario",
        props: ['name'],
        data() {
            return {
                scenario: null,
                history: null
            }
        },
        mounted() {
            this.getScenarioData();
        },
        methods: {
            getScenarioData() {
                axios.get(`${this.$apiBaseUri}scenarios/${this.name}`).then(response => {
                    this.scenario = response.data.data;
                    this.getHistory();
                });
            },
            getHistory() {
                axios.get(`${this.$apiBaseUri}scenarios/${this.name}/history`).then(response => {
                    this.history = response.data.data;
                    this.createChart();
                });
            },
            createChart() {
                let historyData = this.history;
                let timeFormat = 'MM/DD/YYYY HH:mm:ss';

                let labels = Object.keys(historyData).map(function(key, index){
                    return moment(historyData[key].createdAt).format(timeFormat)
                });

                let premium = Object.keys(historyData).map(function(key, index){
                    return historyData[key].premiumPct
                });

                let chartData = {
                    type: 'line',
                    options: {
                        elements: {
                            line: {
                                tension: 0 // disables bezier curves
                            }
                        },
                        legend: {
                            display: false
                        },
                        scales: {
                            xAxes: [{
                                type: 'time',
                                display: true,
                                time: {
                                    parser: timeFormat
                                }
                            }]
                        }
                    }
                }

                chartData.data = {
                    labels: labels,
                    datasets: [{
                        backgroundColor: 'rgb(255, 99, 132)',
                        borderColor: 'rgb(255, 99, 132)',
                        data: premium,
                        fill: false,
                        gridLines:{
                            color:'#CCCCC'
                        }
                    }]
                }

                let ctx = document.getElementById('historyChart').getContext('2d');
                let chart = new Chart(ctx, chartData);
            },
        }
    }
</script>

<style scoped>

</style>
