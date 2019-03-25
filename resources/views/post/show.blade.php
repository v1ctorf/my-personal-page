@extends('layouts.external')

@section('content')
    @include('layouts.navbar')
    <!-- Masthead -->
    <header style="background-color:#16161d;">
        <div class="container h-100">
            <div class="row h-100 align-items-center justify-content-center text-center">
                <div class="col-lg-10 align-self-end" style="margin-top:150px;">
                    <h1 class="text-white font-weight-bold">
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
                        victorf</a> on {{ date('F d, Y', strtotime($post->created_at)) }}
                    </p>
                </div>
            </div>
        </div>
    </header>
    
    <section class="page-section">
        <div class="container">
            <p>{{ $post->body_copy }}</p>
        </div>
    </section>
        
    
@endsection
