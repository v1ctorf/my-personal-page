<template>
    <div class="row">
        <table class="table table-dark text-center">
            <thead>
                <tr>
                    <th>Status</th>
                    <th>Last Premium Found</th>
                    <th>Name</th>
                    <th>Investment</th>
                    <th>in USD</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(scenario, i) in scenarios" :key="i">
                    <td :class="{ 'text-success': scenario.active, 'text-white': !scenario.active }">
                        {{ scenario.active ? 'Active' : 'Inactive' }}
                    </td>
                    <td :class="{
                        'text-danger': scenario.lastPremiumFound < 0,
                        'text-success': scenario.lastPremiumFound > 0.25,
                        'text-warning': (0 <= scenario.lastPremiumFound <= 0.25)
                    }">
                        {{ scenario.lastPremiumFound }}% <small class="text-white">({{ scenario.updatedAt }})</small>
                    </td>
                    <td>
                        <a href="#" class="text-white">
<!--                            scenarioRoute + scenario.name-->
                            {{ scenario.name }}
                        </a>
                    </td>
                    <td>
                        {{ parseInvestment(scenario.investment) }}
                    </td>
                    <td>Pending</td>
                </tr>
            </tbody>
            <caption></caption>
        </table>



<!--        <td>-->
<!--            <a href="{{ route('scenario', ['name' => $scenario->name]) }}" class="btn btn-sm btn-info">-->
<!--                Details-->
<!--            </a>-->
<!--        </td>-->

<!--Snapshots: size = {{ $dbSize->snapshots->size }} MB; count = {{ $dbSize->snapshots->count }} | Total Size {{ $dbSize->total->size }} MB&#45;&#45;}}-->

    </div>
</template>

<script>
    export default {
        name: "LastSnapshots",
        data() {
            return {
                scenarios: [],
                scenarioRoute: window.routes.scenario
            }
        },
        mounted() {
            // console.log(window.csrf_token);
            // console.log(window.routes);
            this.getScenarios();
        },
        methods: {
            getScenarios() {
                axios.get(window.routes.baseUri + window.routes.scenarios).then((response) => {
                    this.scenarios = response.data.data;
                })
            },
            parseInvestment(investment) {
                return Object.keys(investment).map(function(exchange){
                    let currency = Object.keys(investment[exchange])[0];
                    let value = parseFloat(investment[exchange][currency]);

                    return currency.toUpperCase() + ' ' + value.toFixed(5);
                }).join('; ');
            }
        }
    }
</script>

<style scoped>

</style>
