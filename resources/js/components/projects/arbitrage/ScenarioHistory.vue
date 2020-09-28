<template>
    <div class="container mt-4">
        <h2 class="mb-4">
            <a href="#" class="text-secondary">{{`${scenarioName} - History`}}</a>
        </h2>

        <div class="row">
            <table class="table table-dark table-borderless table-hover table-sm text-center mt-3">
                <thead class="thead-dark">
                    <tr>
                        <th rowspan="2">Created At</th>
                        <th colspan="3">Investment</th>
                        <th colspan="3">Result</th>
                        <th colspan="3">Premium</th>
                    </tr>
                    <tr>
                        <th scope="col">USD</th>
                        <th scope="col">A</th>
                        <th scope="col">B</th>
                        <th scope="col">USD</th>
                        <th scope="col">A</th>
                        <th scope="col">B</th>
                        <th scope="col">A</th>
                        <th scope="col">B</th>
                        <th scope="col">USD %</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="snapshot in history">
                        <td>{{ snapshot.createdAt }}</td>
                        <td>{{ snapshot.inUSD }}</td>
                        <td></td>
                        <td></td>
                        <td>{{ snapshot.resultInUSD }}</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>{{ snapshot.premiumPct }}</td>
                    </tr>
<!--                    @foreach (json_decode($history)->data as $h)-->
<!--                        <tr class="-->
<!--                                {{ $h->premiumPct > 0.3 ? 'table-success' : ( $h->premiumPct >= 0 ? 'table-warning' : '')}}-->
<!--                                {{ $h->premiumPct > 0 ? 'text-dark' : ''}}-->
<!--                                ">-->
<!--                            <td>{{ Carbon\Carbon::parse($h->createdAt)->format('Y-m-d H:i:s') }}</td>-->
<!--                            <td>{{ number_format($h->investment, 6) }}</td>-->
<!--                            <td>{{ $h->result }}</td>-->
<!--                            <td>{{ $h->inUSD }}</td>-->
<!--                            <td>{{ $h->resultInUSD }}</td>-->
<!--                            <td>{{ $h->premium }}</td>-->
<!--                            <td>{{ $h->premiumPct }}</td>-->
<!--                        </tr>-->
<!--                    @endforeach-->
                </tbody>
            </table>
        </div>

        <div class="row">
            <div class="col-md-12 text-right">
                <a href="#" class="btn btn-outline-secondary">
<!--                <a href="{{ route('scenario', ['name' => $scenario->name]) }}" class="btn btn-outline-secondary">-->
                    Back
                </a>
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

            }
        },
        mounted() {
            // alert(this.scenarioName)
            this.getHistory();
        },
        methods: {
            getHistory() {
                let uri = `${this.$apiBaseUri}scenarios/${this.scenarioName}/history`;

                axios.get(uri).then(response => {
                    this.history = response.data.data;
                    // document.title = `[${ response.data.data.lastPremiumFound }] ${this.name}`;
                });
            }
        }
    }
</script>

<style scoped>

</style>
