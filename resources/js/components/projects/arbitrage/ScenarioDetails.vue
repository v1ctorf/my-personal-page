<template>
    <div class="col-md-6">
        <dl class="row text-secondary">
            <dt class="col-md-3">Status</dt>
            <dd class="col-md-9" :class="{ 'text-success': scenario.active, 'text-danger': !scenario.active }">
                {{ scenario.active ? 'Active' : 'Inactive' }}
            </dd>

            <dt class="col-md-3">Description</dt>
            <dd class="col-md-9 text-white">
                {{ scenario.description }}
            </dd>

            <dt class="col-md-3">Investment</dt>
            <dd class="col-md-9 text-white">
                {{ investmentDetails }} <span class="text-muted">
                    (USD {{ scenario.investmentInUSD }})
                </span>
            </dd>

            <dt class="col-md-3">Created At</dt>
            <dd class="col-md-9 text-white">
                {{ createdAt.dt }} <span class="text-secondary">
                    ({{ createdAt.fromNow }})
                </span>
            </dd>

            <dt class="col-md-3">Updated At</dt>
            <dd class="col-md-9 text-white">
                {{ updatedAt.dt }} <span class="text-secondary">
                    ({{ updatedAt.fromNow }})
                </span>
            </dd>
        </dl>
    </div>

</template>

<script>
    export default {
        name: "ScenarioDetails",
        props: {
            scenario: Object
        },
        mounted() {
            this.$root.$on('updateScenarioData', data => {
                console.log(data.data);
            });
        },
        data() {
            return {
                investmentDetails: this.parseInvestment(this.scenario.investment),
                updatedAt: {
                    dt: moment(this.scenario.updatedAt).format('YYYY-MM-DD HH:mm:ss'),
                    fromNow: moment(this.scenario.updatedAt).fromNow(),
                },
                createdAt: {
                    dt: moment(this.scenario.createdAt).format('YYYY-MM-DD HH:mm:ss'),
                    fromNow: moment(this.scenario.createdAt).fromNow(),
                },
            }
        },
        methods: {
            parseInvestment(investment) {
                return Object.keys(investment).map(function(exchange){
                    let currency = Object.keys(investment[exchange])[0],
                        value = parseFloat(investment[exchange][currency]);

                    return currency.toUpperCase() + ' ' + value.toFixed(5);
                }).join('; ');
            }
        }
    }
</script>
