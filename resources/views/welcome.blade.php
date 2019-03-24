@extends('layouts.external')

@section('content')
    @include('layouts.navbar')
    @include('welcome.masthead')
    @include('welcome.about')
    @include('welcome.recent_work')
    @include('welcome.contact')
    @include('layouts.footer')
    @include('welcome.modal_recent_work')
@endsection
