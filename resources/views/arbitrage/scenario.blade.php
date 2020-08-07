@extends('layouts.app')

@section('title', $scenarioName)

@section('content')

    <scenario name="{{ $scenarioName }}"></scenario>

@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
@endsection
