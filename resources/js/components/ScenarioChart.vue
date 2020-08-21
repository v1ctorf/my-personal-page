<template>
    <canvas id="historyChart"></canvas>
</template>

<script>
    export default {
        name: 'ScenarioChart',
        props: ['name'],
        data() {
            return {
                history: null
            }
        },
        mounted() {
            this.getHistoryUpdateChart();

            this.$root.$on('updateScenarioChart', () => {
                this.getHistoryUpdateChart();
            });
        },
        methods: {
            getHistoryUpdateChart() {
                axios.get(`${this.$apiBaseUri}scenarios/${this.name}/history`).then(response => {
                    this.history = response.data.data;
                    this.plotChart();
                });
            },
            plotChart() {
                let historyData = this.history,

                    timeFormat = 'MM/DD/YYYY HH:mm:ss',

                    labels = Object.keys(historyData).map(function(key){
                        return moment(historyData[key].createdAt).format(timeFormat)
                    }),

                    premium = Object.keys(historyData).map(function(key){
                        return historyData[key].premiumPct
                    }),

                    chartData = {
                        type: 'line',
                        options: {
                            elements: { line: { tension: 0 } }, // disables bezier curves
                            legend: { display: false },
                            scales: {
                                xAxes: [{
                                    type: 'time',
                                    display: true,
                                    time: { parser: timeFormat }
                                }]
                            }
                        },
                        data: {
                            labels: labels,
                            datasets: [{
                                backgroundColor: 'rgb(255, 99, 132)',
                                borderColor: 'rgb(255, 99, 132)',
                                data: premium,
                                fill: false,
                                gridLines: { color:'#CCCCC' }
                            }]
                        }
                    },

                    ctx = document.getElementById('historyChart').getContext('2d'),
                    chart = new Chart(ctx, chartData);
            },
        }
    }
</script>
