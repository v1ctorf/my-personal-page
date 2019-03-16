@php

$recent_works = [
    [
        'title' => 'Zygä',
        'body' => 'Zygä is a bike registry and sharing platform, aimed to increase the use of the already existing resources, such as bicycles, encouraging their repair. In this project, I acted as Technical Lead, System Design and Full-Stack Developer.',
        'url' => 'https://zyga.zone'
    ],
    [
        'title' => 'Korjuu',
        'body' => 'Based in Helsinki, Korjuu is a P2P market platform, aiming to minimize overproduction and wastage of agricultural products and services. In this project, I acted as Technical Lead, System Design and Full-Stack Developer.',
        'url' => 'https://korjuu.com'
    ],
    [
        'title' => 'DuoSystem',
        'body' => 'DuoSystem is a company focused for public health management systems in some brazilian states such as São Paulo, Goiás and Mato Grosso do Sul. I was part of their team as Full-Stack Web Developer, using Symfony for new projects, but also maintaining a legacy system.',
        'url' => 'https://duosystem.com.br'
    ],
    [
        'title' => 'Victory Consulting',
        'body' => 'Victory is an employee benefits brokerage firm with hundreds of customers in Brazil, including Bridgestone, DHL, Toyota, PepsiCo, etc. I was acting as Full-Stack Developer of a benefits management application built in Grails (Java and Groovy), specially designed for HR users.',
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