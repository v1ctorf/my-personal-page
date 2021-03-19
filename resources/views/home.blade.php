@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card bg-dark">
                <div class="card-header text-light">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item bg-dark">
                            <a href="{{url('/')}}">
                                View Welcome Page
                            </a>
                        </li>
                        <li class="list-group-item bg-dark">
                            <a href="{{route('blog')}}">
                                View Blog/Posts
                            </a>
                        </li>
                        <li class="list-group-item bg-dark">
                            <a href="{{route('post.create')}}">
                                Create A Post
                            </a>
                        </li>
                        <li class="list-group-item bg-dark">
                            <a href="{{route('logout')}}" class="text-muted">
                                Logout
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
