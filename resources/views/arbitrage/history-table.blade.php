<table class="table table-dark table-borderless table-hover table-sm text-center mt-3"> 
    <thead class="thead-dark">
        <tr>
            <th scope="col">Created At</th>
            <th scope="col">Investment ({{ strtoupper($scenario->currency) }})</th>
            <th scope="col">Result ({{ strtoupper($scenario->currency) }})</th>
            <th scope="col">Investment (USD)</th>
            <th scope="col">Result (USD)</th>
            <th scope="col">Premium</th>
            <th scope="col">Premium %</th>
        </tr>
    </thead>
    <tbody>
        @foreach (json_decode($history)->data as $h)
            <tr>
                <td>{{ Carbon\Carbon::parse($h->createdAt)->format('Y-m-d H:i:s') }}</td>
                <td>{{ number_format($h->investment,6) }}</td>
                <td>{{ $h->result }}</td>
                <td>{{ $h->inUSD }}</td>
                <td>{{ $h->resultInUSD }}</td>
                <td>{{ $h->premium }}</td>
                <td>{{ $h->premiumPct }}</td>
            </tr>
        @endforeach
    </tbody>
</table>