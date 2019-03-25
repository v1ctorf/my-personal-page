@extends('layouts.app')

@section('content')

<div class="container mt-4">
    <h2 class="mb-4">Edit Post</h2>
    {!! Form::model($post, ['method' => 'PATCH', 'action' => ['PostController@update', $post->id]]) !!}
        @include('post.form', ['submitButtonText' => __('Save')])
    {!! Form::close() !!}
    
</div>

<form action="{{action('PostController@destroy', $post->id)}}" method="post" 
    id="delete_post" class="delete">
    @csrf
    <input name="_method" type="hidden" value="DELETE">
</form>

@stop

@section('js')
    <script src="{{asset('js/confirmdelete.js')}}"></script>
@stop