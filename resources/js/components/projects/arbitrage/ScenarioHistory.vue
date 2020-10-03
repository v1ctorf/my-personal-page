<template>
    <div class="container mt-4">
        <h2 class="mb-4">
            <a href="#" class="text-secondary">{{`${scenarioName} - History`}}</a>
        </h2>

        <p v-if="history.length == 0" class="text-white">Loading...</p>

        <div v-else class="row">
            <div class="table-responsive">
                <table class="table table-dark text-center table-sm table-hover text-center mt-3">
                    <thead class="thead-dark">
                        <tr>
                            <th rowspan="2">Created At</th>
                            <th colspan="3">Investment</th>
                            <th colspan="3">Result</th>
                            <th colspan="3">Premium</th>
                        </tr>
                        <tr>
                            <th scope="col">USD</th>
                            <th scope="col">{{ investment.a.currency.toUpperCase() }}</th>
                            <th scope="col">{{ investment.b.currency.toUpperCase() }}</th>
                            <th scope="col">diff USD</th>
                            <th scope="col">{{ investment.a.currency.toUpperCase() }}</th>
                            <th scope="col">{{ investment.b.currency.toUpperCase() }}</th>
                            <th scope="col">{{ investment.a.currency.toUpperCase() }}</th>
                            <th scope="col">{{ investment.b.currency.toUpperCase() }}</th>
                            <th scope="col">var USD %</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="snapshot in history" :class="getPremiumCssClass(snapshot.premiumPct)">
                            <td>{{ getDt(snapshot.createdAt) }}</td>
                            <td>{{ snapshot.inUSD }}</td>
                            <td>{{ fmt(snapshot.investment[investment.a.exchange][investment.a.currency]) }}</td>
                            <td>{{ fmt(snapshot.investment[investment.b.exchange][investment.b.currency]) }}</td>
                            <td>{{ snapshot.resultInUSD }}</td>
                            <td>{{ fmt(snapshot.result[investment.a.currency]) }}</td>
                            <td>{{ fmt(snapshot.result[investment.b.currency]) }}</td>
                            <td>{{ fmt(snapshot.premium[investment.a.currency]) }}</td>
                            <td>{{ fmt(snapshot.premium[investment.b.currency]) }}</td>
                            <td>{{ snapshot.premiumPct }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div v-if="history.length > 0" class="row">
            <div class="col-md-12 text-right">
                <a :href="`/arbitrage/scenarios/${scenarioName}`" class="btn btn-outline-secondary">Back</a>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "ScenarioHistory",
        props:['scenarioName'],
        data() {
            return {
                history: [],
                investment: {
                    a: null,
                    b: null
                }
            }
        },
        mounted() {
            this.getHistory();
        },
        methods: {
            fmt(value) {
                return parseFloat(value).toString()
            },
            setCurrencies(snapshot) {
                let exchanges = Object.keys(snapshot.investment);

                this.investment.a = {
                    currency: Object.keys(snapshot.investment[exchanges[0]])[0],
                    exchange: exchanges[0]
                }

                this.investment.b = {
                    currency: Object.keys(snapshot.investment[exchanges[1]])[0],
                    exchange: exchanges[1]
                }
            },
            getHistory() {
                let uri = `${this.$apiBaseUri}/scenarios/${this.scenarioName}/history`;

                axios.get(uri).then(response => {
                    this.history = response.data.data;
                    this.setCurrencies(this.history[0]);
                });
            },
            getPremiumCssClass(premiumPct) {
                if (premiumPct > 0.3) return 'text-success';

                if (premiumPct >= 0) return 'text-warning';

                return 'text-white';
            },
            getDt(dt) {
                return moment(dt).format('YYYY-MM-DD HH:mm:ss');
            }
        }
    }
</script>
