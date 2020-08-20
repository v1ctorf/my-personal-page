<template>
    <canvas v-show="history" id="historyChart"></canvas>
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
            this.getHistory()
        },
        methods: {
            getHistory() {
                axios.get(`${this.$apiBaseUri}scenarios/${this.name}/history`).then(response => {
                    this.history = response.data.data;
                    this.plotChart();
                });
            },
            plotChart() {
                let historyData = this.history;
                let timeFormat = 'MM/DD/YYYY HH:mm:ss';

                let labels = Object.keys(historyData).map(function(key){
                    return moment(historyData[key].createdAt).format(timeFormat)
                });

                let premium = Object.keys(historyData).map(function(key){
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
