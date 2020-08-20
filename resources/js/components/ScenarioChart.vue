<template>
    <canvas id="historyChart"></canvas>
</template>

<script>
    export default {
        name: "ScenarioChart",
        props: ['history'],
        mounted() {
            this.plotChart()
        },
        methods: {
            plotChart() {
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
