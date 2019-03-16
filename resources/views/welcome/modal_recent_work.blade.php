@php

$recent_works = [
    [
        'title' => 'Zygä',
        'body' => 'Zygä is a bike registry and sharing platform, aimed to increase the use of the already existing resources, such as bicycles, encouraging their repair. In this project, I acted as Technical Lead, System Design and Full-Stack Developer.',
        'url' => 'https://zyga.zone',
        'tech' => ['PHP 7.1', 'Laravel 5.6', 'Eloquent', 'JavaScript', 'jQuery', 'CSS3', 'HTML5', 'Bootstrap', 'Git', 'MySQL']
    ],
    [
        'title' => 'Korjuu',
        'body' => 'Based in Helsinki, Korjuu is a P2P market platform, aiming to minimize overproduction and wastage of agricultural products and services. In this project, I acted as Technical Lead, System Design and Full-Stack Developer.',
        'url' => 'https://korjuu.com',
        'tech' => ['PHP 7.1', 'Laravel 5.7', 'Eloquent', 'JavaScript', 'jQuery', 'CSS3', 'HTML5', 'Bootstrap', 'Git', 'MySQL']
    ],
    [
        'title' => 'DuoSystem',
        'body' => 'DuoSystem is a company focused for public health management systems in some brazilian states such as São Paulo, Goiás and Mato Grosso do Sul. I was part of their team as Full-Stack Web Developer, using Symfony for new projects, but also maintaining a legacy system.',
        'url' => 'https://duosystem.com.br',
        'tech' => ['PHP', 'Symfony', 'JavaScript', 'jQuery', 'CSS3', 'HTML5', 'Bootstrap', 'Git', 'MS SQL Server']
    ],
    [
        'title' => 'Victory Consulting',
        'body' => 'Victory is an employee benefits brokerage firm with hundreds of customers in Brazil, including Bridgestone, DHL, Toyota, PepsiCo, etc. I was acting as Full-Stack Developer of a benefits management application built in Grails (Java and Groovy), specially designed for HR users.',
        'url' => 'https://www.victorysolutions.com.br/principal/login/',
        'tech' => ['Grails', 'PHP', 'Java', 'Groovy', 'Hibernate', 'JavaScript', 'jQuery', 'CSS3', 'HTML5', 'Bootstrap', 'Git', 'MySQL']
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
                    <img class="img-fluid mb-2" src="img/portfolio/thumbnails/{{ ($key+1) }}.jpg" alt="">
                    {{ $work['body'] }}
                    <div class="row mt-2">
                        <div class="col-md-12 text-center">
                            @foreach ($work['tech'] as $tech)
                                <span class="badge badge-pill badge-info">
                                    {{ $tech }}
                                </span>
                            @endforeach
                        </div>
                    </div>
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