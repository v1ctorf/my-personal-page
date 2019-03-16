@php

$recent_works = [
    [
        'title' => 'Zygä',
        'body' => 'Tommi, bla bla bla bikes',
        'url' => 'https://zyga.zone'
    ],
    [
        'title' => 'Korjuu',
        'body' => 'Tommi, bla bla bla my groups',
        'url' => 'https://korjuu.com'
    ],
    [
        'title' => 'DuoSystem',
        'body' => 'Cross, bla bla bla sms sergio',
        'url' => 'https://duosystem.com.br'
    ],
    [
        'title' => 'Victory Consulting',
        'body' => 'Dona Vera, bla bla bla VS',
        'url' => 'https://www.victorysolutions.com.br/principal/login/'
    ],
];

@endphp


@foreach ($recent_works as $key => $work)

    <div class="modal fade" id="Modal_{{ ($key+1) }}" tabindex="-1" role="dialog" 
        aria-labelledby="Modal_{{ ($key+1) }}_Label" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="Modal_{{ ($key+1) }}_Label">
                        {{ $work['title'] }}
                    </h5>
                </div>
                <div class="modal-body">
                    {{ $work['body'] }}
                </div>
                <div class="modal-footer justify-content-between">
                    <a target="_blank" href="{{ $work['url'] }}" class="btn btn-primary">
                        <i class="fas fa-external-link-alt"></i> {{ __('View Site') }}
                    </a>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    
@endforeach