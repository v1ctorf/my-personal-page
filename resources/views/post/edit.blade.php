@extends('layouts.app')

@section('content')

<div class="container mt-4">
    <h2 class="mb-4">Edit Post</h2>
    {!! Form::model($post, ['method' => 'PATCH', 'action' => ['PostController@update', $post->id]]) !!}
        @include('post.form', ['submitButtonText' => __('Save')])
    {!! Form::close() !!}
</div>

@stop