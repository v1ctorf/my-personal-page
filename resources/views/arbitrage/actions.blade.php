<div class="col-md-6">
    {{-- <dl class="row text-secondary">
        @foreach ($scenario->actions as $step => $a)
            <dt class="col-md-2 text-capitalize">Step {{ $step + 1 }}</dt>
            <dd class="col-md-10 text-white">
                {{ ucfirst($a->type == 'order' ? $a->orderType : $a->type) }}
                @if ($a->type == 'order')
                    {{ strtoupper($a->pair) }} @ {{ 
                        strtoupper(implode(' ', explode('-',$a->exchange)))
                    }}
                @else
                    {{ strtoupper($a->currency) }} from {{ strtoupper(implode(' ', explode('-', $a->from))) }} to {{
                        strtoupper(implode(' ', explode('-', $a->to)))
                    }}
                @endif
            </dd>
        @endforeach
    </dl>     --}}

    <dl class="row text-secondary">
        @foreach ($latest->steps as $key => $s)
            <dt class="col-md-2 text-capitalize">
                Step {{ $key + 1 }}
            </dt>
            <dd class="col-md-10 text-white">
                @if ($s->action == 'transfer')
                    <i class="fas fa-paper-plane"></i> {{ strtoupper($s->amount->currency) 
                    }} {{ $s->amount->value }} from {{ 
                        strtoupper(implode(' ', explode('-', $s->details->sender->identifier))) 
                    }} to {{
                        strtoupper(implode(' ', explode('-', $s->details->receiver->identifier)))
                    }}<br>
                    <small class="text-secondary">
                        @if ($s->details->sender->feesVerifiedIn)
                            <i class="fa fa-check-circle" title="Fee verified in {{ $s->details->sender->feesVerifiedIn }}."></i>
                        @else
                            <i class="fa fa-question-circle" title="Fee had expired."></i>
                        @endif
                        {{ $s->amount->value }} - {{ $s->details->txFee->value 
                        }} - {{ rtrim($s->details->exchangesFees, 0) 
                        }} = {{ strtoupper($s->result->currency) }} {{ $s->result->value }}
                    </small>
                @else
                <i class="fas fa-exchange-alt"></i> {{ ucfirst($s->action) 
                    }} {{ strtoupper($s->details->pair) }} in {{ 
                        strtoupper(implode(' ', explode('-',$s->details->exchange)))
                    }}<br>
                    <small class="text-secondary">
                        @if ($s->details->fee->fees_page_verified_at)
                            <i class="fa fa-check-circle" title="Fees verified in {{ $s->details->fee->fees_page_verified_at }}."></i>
                        @else
                            <i class="fa fa-question-circle" title="Exchange fees to be verified."></i>
                        @endif
                        ({{ strtoupper($s->amount->currency) }} {{ rtrim($s->amount->value, 0) 
                        }} {{ $s->action == 'buy' ? '/' : '*'}} {{ rtrim($s->details->ticker, 0) 
                        }}) - {{ number_format($s->details->fee->percentage, 2) 
                        }}% = {{ strtoupper($s->result->currency) }} {{ $s->result->value }} 
                    </small>
                @endif
            </dd>
        @endforeach
    </dl>    

</div>