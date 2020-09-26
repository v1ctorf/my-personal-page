<!-- Services Section -->
<section class="page-section" id="about">
    <div class="container">
        <h2 class="text-center mt-0">{{__('About')}}</h2>
        <hr class="divider my-4">
        <div class="row">
            <div class="col-lg-3 col-md-6 text-center">
                <div class="mt-5">
                    <i class="fas fa-4x fas fa-database text-info mb-4"></i>
                    <h3 class="h4 mb-2">{{__('Back-End')}}</h3>
                    <p class="text-muted mb-0">
                        {{__('MVC frameworks, RESTful APIs and an efficient database management')}}
                    </p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 text-center">
                <div class="mt-5">
                    <i class="fas fa-4x fa-code text-info mb-4"></i>
                    <h3 class="h4 mb-2">{{__('Front-End')}}</h3>
                    <p class="text-muted mb-0">
                        {{__('Responsive, intuitive and fast UX/UI solutions using modern JS libraries')}}
                    </p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 text-center">
                <div class="mt-5">
                    <i class="fas fa-4x fa-server text-info mb-4"></i>
                    <h3 class="h4 mb-2">{{__('DevOps')}}</h3>
                    <p class="text-muted mb-0">
                        {{__('Shorter cycles for continuous gains: BDD, PaaS and version control')}}
                    </p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 text-center">
                <div class="mt-5">
                    <i class="fas fa-4x fa-sticky-note text-info mb-4"></i>
                    <h3 class="h4 mb-2">{{__('Methodology')}}</h3>
                    <p class="text-muted mb-0">
                        {{__('Lean development, A/B testing or agile methods for MVPs or legacy systems')}}
                    </p>
                </div>
            </div>
        </div>


        <div class="row" style="margin-top:100px;">
            <div class="col-lg-6 col-md-6 text-center">

                <img src="{{ secure_asset('img/photo2.jpg') }}" class="rounded-circle" style="max-height:250px;">

                <h4 class="h4 mt-3">{{__('Who am I?')}}</h4>
                <div class="row">
                    <div class="col-md-10 offset-md-1" style="font-size:95%">
                        <p class="text-secondary mb-0">
                            {{__('I have 8 years of work experience in software development and a degree in Bachelor of Technology in IT.')}}
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

            <skills-chart></skills-chart>

        </div>
    </div>
</section>
