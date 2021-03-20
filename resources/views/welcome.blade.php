@extends('layouts.external')

@section('content')
    <welcome-masthead></welcome-masthead>
    <about-section></about-section>
    <portfolio-section></portfolio-section>
    @include('welcome.contact')
    @include('welcome.modal_recent_work')
@endsection
