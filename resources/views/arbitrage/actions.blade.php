<div class="col-md-6">
    <dl class="row text-secondary">
        @foreach ($scenario->actions as $step => $a)
            <dt class="col-md-2 text-capitalize">Step {{ $step + 1 }}</dt>
            <dd class="col-md-10 text-white">
                {{ $a->type == 'order' ? $a->orderType : $a->type }}
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
    </dl>    
</div>