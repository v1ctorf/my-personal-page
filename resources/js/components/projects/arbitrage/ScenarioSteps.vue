<template>
    <div class="col-md-6">
        <dl class="row text-secondary">
            <template v-for="(step, i) in steps">
                <dt class="col-md-2 text-capitalize">Step {{ i + 1 }}</dt>
                <dd class="col-md-10 text-white">
                    <i class="fas" :class="{'fa-paper-plane':step.action == 'transfer', 'fa-exchange-alt':step.action != 'transfer'}"></i>
                </dd>
            </template>
        </dl>
    </div>
<!--    @foreach ($latest->steps as $key => $s)-->
<!--    <dt class="col-md-2 text-capitalize">-->
<!--        Step {{ $key + 1 }}-->
<!--    </dt>-->
<!--    <dd class="col-md-10 text-white">-->
<!--        @if ($s->action == 'transfer')-->
<!--        <i class="fas fa-paper-plane"></i> {{ strtoupper($s->amount->currency)-->
<!--        }} {{ $s->amount->value }} from {{-->
<!--            strtoupper(implode(' ', explode('-', $s->details->sender->identifier)))-->
<!--        }} to {{-->
<!--            strtoupper(implode(' ', explode('-', $s->details->receiver->identifier)))-->
<!--        }}<br>-->
<!--        <small class="text-secondary">-->
<!--            @if ($s->details->sender->feesVerifiedIn)-->
<!--            <i class="fa fa-check-circle" title="Fee verified in {{ $s->details->sender->feesVerifiedIn }}."></i>-->
<!--            @else-->
<!--            <i class="fa fa-question-circle" title="Fee had expired."></i>-->
<!--            @endif-->
<!--            {{ $s->amount->value }} - {{ $s->details->txFee->value-->
<!--            }} - {{ rtrim($s->details->exchangesFees, 0)-->
<!--            }} = {{ strtoupper($s->result->currency) }} {{ $s->result->value }}-->
<!--        </small>-->
<!--        @else-->
<!--        <i class="fas fa-exchange-alt"></i> {{ ucfirst($s->action)-->
<!--        }} {{ strtoupper($s->details->pair) }} in {{-->
<!--            strtoupper(implode(' ', explode('-',$s->details->exchange)))-->
<!--        }}<br>-->
<!--        <small class="text-secondary">-->
<!--            @if ($s->details->fee->fees_page_verified_in)-->
<!--            <i class="fa fa-check-circle" title="Fees verified in {{ $s->details->fee->fees_page_verified_in }}."></i>-->
<!--            @else-->
<!--            <i class="fa fa-question-circle" title="Exchange fees to be verified."></i>-->
<!--            @endif-->
<!--            ({{ strtoupper($s->amount->currency) }} {{ rtrim($s->amount->value, 0)-->
<!--            }} {{ $s->action == 'buy' ? '/' : '*'}} {{ rtrim($s->details->ticker, 0)-->
<!--            }}) - {{ number_format($s->details->fee->percentage, 2)-->
<!--            }}% = {{ strtoupper($s->result->currency) }} {{ $s->result->value }}-->
<!--        </small>-->
<!--        @endif-->
<!--    </dd>-->
<!--    @endforeach-->
</template>

<script>
    export default {
        name: "ScenarioSteps",
        props: ['scenario'],
        mounted() {
            this.getLatestHistory();
        },
        data() {
            return {
                steps: null
            }
        },
        methods: {
            getLatestHistory() {
                let uri = `${this.$apiBaseUri}scenarios/${this.scenario.name}/history/latest`;

                axios.get(uri).then(response => {
                    this.steps = response.data.data.steps;
                    // document.title = `[${ response.data.data.lastPremiumFound }] ${this.name}`;
                });
            }
        }
        //        $resp = $this->client->get("scenarios/{$scenarioName}/history/latest");
//        $latest = json_decode($resp->getBody()->getContents())->data;
    }
</script>

<style scoped>

</style>
