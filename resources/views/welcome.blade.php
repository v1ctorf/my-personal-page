<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 //EN">
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>victorf - web developer</title>

    <!-- Font Awesome Icons -->
    <link href="{{ secure_asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic' 
        rel='stylesheet' type='text/css'>

    <!-- Plugin CSS -->
    <link href="{{ secure_asset('vendor/magnific-popup/magnific-popup.css') }}" rel="stylesheet">

    <!-- Theme CSS - Includes Bootstrap -->
    <link href="css/creative.min.css" rel="stylesheet">
</head>

<body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
        <div class="container">
            <a class="navbar-brand js-scroll-trigger" href="#page-top">victorf</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" 
                data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" 
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto my-2 my-lg-0">
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="#about">{{__('About')}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="#portfolio">{{__('Recent Work')}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="#contact">{{__('Contact')}}</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Masthead -->
    <header class="masthead">
        <div class="container h-100">
            <div class="row h-100 align-items-center justify-content-center text-center">
                <div class="col-lg-10 align-self-end">
                    <h1 class="text-white font-weight-bold">
                        Olá, {{ __('I\'m Victor Ferreira Silva,')}}
                        <br>{{__('a web developer from Brazil')}}
                        <br>{{__('currently based in Dublin.')}}
                    </h1>
                    <hr class="divider my-4">
                </div>
                <div class="col-lg-8 align-self-baseline">
                    <p class="text-white font-weight-light mb-5">
                        {{__('I am a full-stack developer and I can help you to design, build and maintain your web applications.')}}
                    </p>
                    <a class="btn btn-primary btn-xl js-scroll-trigger" href="#about">
                        {{__('View My Work')}}
                    </a>
                </div>
            </div>
        </div>
    </header>


    <!-- Services Section -->
    <section class="page-section" id="about">
        <div class="container">
            <h2 class="text-center mt-0">{{__('About')}}</h2>
            <hr class="divider my-4">
            <div class="row">
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="mt-5">
                        <i class="fas fa-4x fa-code text-info mb-4"></i>
                        <h3 class="h4 mb-2">{{__('Front-End')}}</h3>
                        <p class="text-muted mb-0">{{__('Responsive, intuitive and fast UX/UI solutions using modern JS libraries')}}</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="mt-5">
                        <i class="fas fa-4x fas fa-database text-info mb-4"></i>
                        <h3 class="h4 mb-2">{{__('Back-End')}}</h3>
                        <p class="text-muted mb-0">{{__('MVC frameworks, RESTful APIs and an efficient database management')}}</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="mt-5">
                        <i class="fas fa-4x fa-server text-info mb-4"></i>
                        <h3 class="h4 mb-2">{{__('DevOps')}}</h3>
                        <p class="text-muted mb-0">{{__('Shorter cycles for continuous gains: TDD, PaaS and version control')}}</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="mt-5">
                        <i class="fas fa-4x fa-sticky-note text-info mb-4"></i>
                        <h3 class="h4 mb-2">{{__('Methodology')}}</h3>
                        <p class="text-muted mb-0">{{__('Lean development, A/B testing or agile methods for MVPs or legacy systems')}}</p>
                    </div>
                </div>
            </div>
            
            
            <div class="row" style="margin-top:100px;">
                <div class="col-lg-6 col-md-6 text-center">
                    <img src="{{ secure_asset('img/photo.jpg') }}" alt="..." class="rounded-circle" style="max-height:250px;">
                    <h4 class="h4 mt-3">{{__('Who am I?')}}</h4>
                    <div class="row">
                        <div class="col-md-10 offset-md-1" style="font-size:95%">
                            <p class="text-secondary mb-0">
                                {{__('I have 7 years of work experience in software development and a degree in Bachelor of Technology in IT.')}}
                            </p>
                            <p class="text-secondary">
                                {{__('I love to build solutions quickly, measure their results and learn what customers really want.')}}
                                <a href="#contact" class="js-scroll-trigger alert-link text-info">
                                    {{__("Feel free to contact me")}}
                                </a> {{__("if you want to share something about new projects or partnerships.")}}
                            </p>
                        </div>
                    </div>
                </div>
                @php
                    $skills = [
                        'HTML' => 90,
                        'CSS' => 80,
                        'Bootstrap' => 90,
                        'React' => 40,
                        'JavaScript' => 80,
                        'PHP' => 90,
                        'Laravel' => 80,
                        'Ruby On Rails' => 50,
                        'Java' => 60,
                        'Python' => '40',
                        'Heroku' => 70,
                        'MySQL' => 80,
                    ];
                @endphp
                <div class="col-lg-6 col-md-6">
                    @foreach ($skills as $skill => $pct)
                        
                        <div class="progress mb-2" style="height: 30px;">
                            <div class="progress-bar bg-info text-left" role="progressbar" 
                                style="width: {{$pct}}%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">
                                <span class="ml-2 font-weight-bolder text-monospace text-uppercase">{{$skill}}</span>
                            </div>
                            <div class="progress-bar bg-light text-right" role="progressbar" 
                                style="width: {{100-$pct}}%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">
                                <span class="mr-2 font-weight-bolder text-monospace text-uppercase text-secondary">{{$pct}}%</span>
                            </div>
                        </div>
                    
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- Portfolio Section -->
    <section id="portfolio">
        <div class="container-fluid p-0 mb-4 mt-4">
            <h2 class="text-center mt-0">{{__('Recent Work')}}</h2>
            <hr class="divider my-4">
            <div class="row no-gutters">
                <div class="col-lg-4 col-sm-6 offset-lg-2">
                    <a class="portfolio-box" href="javascript:;" data-toggle="modal" data-target="#exampleModal">
                        <img class="img-fluid" src="img/portfolio/thumbnails/1.jpg" alt="">
                        <div class="portfolio-box-caption">
                            <div class="project-category text-white-50">
                                Laravel (PHP)
                            </div>
                            <div class="project-name">
                                Zygä
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a class="portfolio-box" href="img/portfolio/fullsize/2.jpg">
                        <img class="img-fluid" src="img/portfolio/thumbnails/2.jpg" alt="">
                        <div class="portfolio-box-caption">
                            <div class="project-category text-white-50">
                                Laravel (PHP)
                            </div>
                            <div class="project-name">
                                Korjuu
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6 offset-lg-2">
                    <a class="portfolio-box" href="img/portfolio/fullsize/3.jpg">
                        <img class="img-fluid" src="img/portfolio/thumbnails/3.jpg" alt="">
                        <div class="portfolio-box-caption">
                            <div class="project-category text-white-50">
                                Symfony (PHP)
                            </div>
                            <div class="project-name">
                                DuoSystem
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a class="portfolio-box" href="img/portfolio/fullsize/4.jpg">
                        <img class="img-fluid" src="img/portfolio/thumbnails/4.jpg" alt="">
                        <div class="portfolio-box-caption">
                            <div class="project-category text-white-50">
                                Grails (Java & Groovy)
                            </div>
                            <div class="project-name">
                                Victory Consulting
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

     <!-- The best way to prove an idea is turning it into a reality in the simplest way possible. -->
    <!-- Contact Section -->
    <section class="page-section" id="contact">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <h2 class="mt-0">Let's Get In Touch!</h2>
                    <hr class="divider my-4">
                    <p class="text-muted mb-5">Ready to start your next project with us? Give us a call or send us an email and we will get back to you as soon as possible!</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 ml-auto text-center">
                    <i class="fas fa-phone fa-3x mb-3 text-muted"></i>
                    <div>+1 (202) 555-0149</div>
                </div>
                <div class="col-lg-4 mr-auto text-center">
                    <i class="fas fa-envelope fa-3x mb-3 text-muted"></i>
                    <!-- Make sure to change the email address in anchor text AND the link below! -->
                    <a class="d-block" href="mailto:contact@yourwebsite.com">contact@yourwebsite.com</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-light py-5">
        <div class="container">
        <div class="small text-center text-muted">Copyright &copy; 2019 - Start Bootstrap</div>
        </div>
    </footer>
    
    
    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/creative.min.js"></script>

</body>

</html>
