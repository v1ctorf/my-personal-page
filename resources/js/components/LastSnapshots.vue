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
                    <td :class="{ 'text-success': scenario.active, 'text-white': !scenario.active }"
                        :text="{ 'Active': scenario.active, 'Inactive': !scenario.active }">
                    </td>
                    <td :class="{
                        'text-danger': scenario.lastPremiumFound < 0,
                        'text-success': scenario.lastPremiumFound > 0.25,
                        'text-warning': (0 <= scenario.lastPremiumFound <= 0.25)
                    }">
                        {{ scenario.lastPremiumFound }}% <small class="text-white">({{ scenario.updatedAt }})</small>
                    </td>
                    <td>
                        <a :href="scenarioRoute + scenario.name" class="text-white">
                            {{ scenario.name }}
                        </a>
                    </td>
                </tr>
            </tbody>
            <caption></caption>
        </table>
<!--                {{&#45;&#45;                        <td>{{ strtoupper($scenario->investment->a->currency) }} {{ floatval($scenario->investment->a->amount) }}</td>&#45;&#45;}}-->
<!--                {{&#45;&#45;                        <td>{{ number_format($scenario->investment->a->inUSD, 2) }}</td>&#45;&#45;}}-->
<!--                {{&#45;&#45;                        <td>&#45;&#45;}}-->
<!--                    {{&#45;&#45;                            <a href="{{ route('scenario', ['name' => $scenario->name]) }}"&#45;&#45;}}-->
<!--                                                       {{&#45;&#45;                                class="btn btn-sm btn-info">&#45;&#45;}}-->
<!--                        {{&#45;&#45;                                Details&#45;&#45;}}-->
<!--                        {{&#45;&#45;                            </a>&#45;&#45;}}-->
<!--                    {{&#45;&#45;                        </td>&#45;&#45;}}-->
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
            }
        }
    }
</script>

<style scoped>

</style>
