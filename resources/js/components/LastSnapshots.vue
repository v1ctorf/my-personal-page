<template>
    <section>
        <div class="row">
            <table v-if="scenarios.length > 0" class="table table-dark text-center table-sm">
                <thead>
                    <tr>
                        <th>Scenario</th>
                        <th colspan="2">Last update</th>
                        <th colspan="2">Investment (and total in USD)</th>
                    </tr>
                </thead>

                <tbody>
                    <tr v-for="(scenario, i) in scenarios" :key="i">
                        <td>
                            <a href="#" class="text-white">
    <!--                            scenarioRoute + scenario.name-->
                                {{ scenario.name }}
                            </a><small v-if="!scenario.active">(inactive)</small>
                        </td>
                        <td :class="{
                            'text-danger': scenario.lastPremiumFound < 0,
                            'text-success': scenario.lastPremiumFound > 0.25,
                            'text-warning': (0 <= scenario.lastPremiumFound <= 0.25)
                        }">
                            {{ scenario.lastPremiumFound }}%<br>
                        </td>
                        <td>
                            <small class="text-white">
                                {{ formatDt(scenario.updatedAt) }}
                            </small>
                        </td>
                        <td>
                            {{ parseInvestment(scenario.investment) }}
                        </td>
                        <td>USD {{ scenario.investmentInUSD }}</td>
                    </tr>
                </tbody>

                <caption v-if="isLoading">
                    Updating...
                </caption>
                <caption v-else>
                    Page loaded at {{ pageLoadedAt }}; Updated at {{ lastUpdate }}; {{ dbSize.snapshots.count }} snapshots ({{ dbSize.snapshots.size }} MB); DB {{ dbSize.total.size }} MB
                </caption>
            </table>

            <div v-if="scenarios.length == 0 && isLoading" class="col-md-12 text-white">
                Loading...
            </div>
        </div>

        <div v-if="scenarios.length > 0" class="row">
            <div class="col-md-6 text-left">
                <btn-snapshot-all>Snapshot (All)</btn-snapshot-all>
            </div>

            <div class="col-md-6 text-right">
                <a href="/arbitrage" class="btn btn-outline-secondary">Back</a>
            </div>
        </div>
    </section>
</template>

<script>
    export default {
        name: "LastSnapshots",
        data() {
            return {
                scenarios: [],
                interval: null,
                isLoading: true,
                lastUpdate: moment().format('YYYY-MM-DD HH:mm:ss'),
                pageLoadedAt: moment().format('YYYY-MM-DD HH:mm:ss'),
                dbSize: null
            }
        },
        created() {
            this.interval = setInterval(this.updateData, 60000);
        },
        mounted() {
            this.updateData();

            this.$root.$on('updateScenariosTable', () => {
                this.updateData();
            });
        },
        methods: {
            formatDt(dt) {
                return moment(dt).fromNow();
            },
            updateData() {
                this.isLoading = true;
                this.getScenarios();
                this.getDbSize();
            },
            getDbSize() {
                axios.get(this.$apiBaseUri + this.$routes.dbSize).then(response => {
                    this.dbSize = response.data.data;
                });
            },
            getScenarios() {
                axios.get(this.$apiBaseUri + this.$routes.scenarios).then((response) => {
                    this.scenarios = response.data.data;
                    this.lastUpdate = moment().format('YYYY-MM-DD HH:mm:ss');
                    this.isLoading = false;
                    document.title = '[' + response.data.data[0].lastPremiumFound + '] Arbitrage - Scenarios - victorf';
                });
            },
            parseInvestment(investment) {
                return Object.keys(investment).map(function(exchange){
                    let currency = Object.keys(investment[exchange])[0],
                        value = parseFloat(investment[exchange][currency]);

                    return currency.toUpperCase() + ' ' + value.toFixed(5);
                }).join('; ');
            }
        },
        beforeDestroy () {
            clearInterval(this.timer)
        }
    }
</script>
