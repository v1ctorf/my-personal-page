@extends('layouts.app')

@section('title', $scenarioName)

@section('content')

    <scenario-history scenario-name="{{ $scenarioName }}"></scenario-history>

@endsection
