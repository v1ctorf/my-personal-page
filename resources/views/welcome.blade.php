@extends('layouts.external')

@section('content')
    <welcome-masthead></welcome-masthead>
    <about-section></about-section>
    @include('welcome.recent_work')
    @include('welcome.contact')
    @include('welcome.modal_recent_work')
@endsection
