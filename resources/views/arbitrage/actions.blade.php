<table class="table table-dark col-md-6">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th>Action</th>
            <th>Details</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($scenario->actions as $step => $a)
            <tr>
                <th scope="row">{{ $step + 1 }}</th>
                <td class="text-capitalize">{{ $a->type }}</td>                
                <td>                
                    @if ($a->type == 'order')
                        {{ ucfirst($a->orderType) }} {{strtoupper($a->pair)}} @ {{ 
                            strtoupper(implode(' ', explode('-',$a->exchange)))
                        }}
                    @else
                        {{ strtoupper($a->currency) }} from {{ strtoupper(implode(' ', explode('-', $a->from))) }} to {{
                            strtoupper(implode(' ', explode('-', $a->to)))
                        }}
                    @endif
                </td>                
                
                {{-- <td>{{ $action->amount->currency }} {{ $action->amount->value }}</td>                
                <td>{{ $action->result->currency }} {{ $action->result->value }}</td>                 --}}
            </tr>
        @endforeach
    </tbody>
</table>