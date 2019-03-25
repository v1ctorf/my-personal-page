@extends('layouts.external')

@section('style')
    <style>
        .text-large{font-size:120%;}
        header{background-color:#16161d;}
        .headline{margin-top:150px;}
    </style>
@stop

@section('content')
    @include('layouts.navbar')
    <header>
        <div class="container h-100">
            <div class="row h-100 align-items-center justify-content-center text-center">
                <div class="col-lg-8 align-self-end">
                    <h1 class="text-white font-weight-bold headline">
                        {{ $post->headline }}
                    </h1>
                    <hr class="divider my-4">
                </div>
                <div class="col-lg-8 align-self-baseline">
                    <h4 class="text-white font-weight-light mb-5 text-light">
                        {{ $post->subhead }}
                    </h4>
                </div>
                <div class="col-lg-8 align-self-baseline">
                    <p class="text-light font-weight-light mb-5">posted by <a href="{{ url('/#about') }}" 
                        target="_blank" class="text-light">
                        victorf</a> on {{ date('F d, Y - H:i', strtotime($post->created_at)) }}
                    </p>
                </div>
                @auth
                    <div class="col-lg-8 align-self-baseline mb-4 text-right">
                        <a href="{{route('post.edit',['id'=>$post->id])}}"
                            class="btn btn-primary">
                            Edit
                        </a>
                    </div>
                @endauth
            </div>
        </div>
    </header>
    <article>
        <div class="container">
            <div class="row mt-5">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <p class="text-large">{{ $post->body_copy }}</p>
                </div>
            </div>
        </div>
    </article>

    
@endsection
