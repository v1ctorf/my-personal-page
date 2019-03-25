<section class="page-section">
    <div class="container">
        @if(Session::has('message'))
            <div class="alert alert-info alert-dismissible"> 
                {{ Session::get('message') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        
        <ul class="list-group list-group-flush">
            @foreach($posts as $post)
                <li class="list-group-item border-top-0 mt-3">
                    <h3>
                        <a href="{{route('post.show',['id' => $post->id])}}" 
                            class="text-dark">
                            {{ $post->headline }}
                        </a>
                    </h3>
                    <h5 class="text-secondary">
                        {{ $post->subhead }}<br>
                    </h5>
                    <p class="text-muted mt-0">posted by <a href="{{ url('/#about') }}" 
                        target="_blank" class="text-dark">
                        victorf</a> on {{ date('F d, Y', strtotime($post->created_at)) }}</p>
                </li>
            @endforeach
        </ul>
    </div>
</section>