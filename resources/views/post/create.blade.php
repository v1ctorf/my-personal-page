@extends('layouts.app')

@section('content')

<div class="container mt-4">
    <h2 class="mb-4">Create a Post</h2>
    
    {!! Form::open(['action' => 'PostController@store']) !!}
        @include('post.form', ['submitButtonText' => __('Save')])
    {!! Form::close() !!}
</div>

@endsection