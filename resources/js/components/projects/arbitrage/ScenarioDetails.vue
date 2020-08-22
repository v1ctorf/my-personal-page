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
                {{ parseDt(scenario.createdAt) }} <span class="text-secondary">
                    ({{ parseDtFromNow(scenario.createdAt) }})
                </span>
            </dd>

            <dt class="col-md-3">Updated At</dt>
            <dd class="col-md-9 text-white">
                {{ parseDt(scenario.updatedAt) }} <span class="text-secondary">
                    ({{ parseDtFromNow(scenario.updatedAt) }})
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
        data() {
            return {
                investmentDetails: this.parseInvestment(this.scenario.investment),
            }
        },
        methods: {
            parseDt(scenarioDt) {
                return moment(scenarioDt).format('YYYY-MM-DD HH:mm:ss')
            },
            parseDtFromNow(scenarioDt) {
                return moment(scenarioDt).fromNow()
            },
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
