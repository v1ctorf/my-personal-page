@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <ul>
                        <li><a href="{{url('/')}}">welcome</a></li>
                        <li><a href="{{route('post.create')}}">create a post</a></li>
                        <li><a href="{{route('blog')}}">blog</a></li>
                        <li><a href="{{route('logout')}}">logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
