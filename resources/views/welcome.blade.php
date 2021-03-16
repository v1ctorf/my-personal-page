@extends('layouts.external')

@section('content')
    <welcome-navbar :auth="{{ json_encode(Auth::check()) }}"></welcome-navbar>
    <welcome-masthead></welcome-masthead>
    @include('welcome.about')
    @include('welcome.recent_work')
    @include('welcome.contact')
    @include('welcome.modal_recent_work')
@endsection
