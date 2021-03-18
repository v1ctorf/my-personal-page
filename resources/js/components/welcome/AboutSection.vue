<template>
    <section class="page-section" id="about">
        <div class="container">
            <h2 class="text-center mt-0">About</h2>
            <hr class="divider my-4">

            <div class="row">
                <div v-for="(cat, i) in categories" :key="i" class="col-lg-3 col-md-6 text-center">
                    <div class="mt-5">
                        <i class="fas fa-4x text-info mb-4" :class="cat.fa"></i>
                        <h3 class="h4 mb-2">{{ cat.title }}</h3>
                        <p class="text-muted mb-0">{{ cat.description }}</p>
                    </div>
                </div>
            </div>


            <div class="row who-am-i-skills">
                <div class="col-lg-6 col-md-6 text-center">

                    <img :src="`${assetUrl}/img/photo2.jpg`" class="rounded-circle">

                    <h4 class="h4 mt-3">Who am I?</h4>
                    <div class="row">
                        <div class="col-md-10 offset-md-1 who-am-i">
                            <p class="text-secondary mb-0">
                                I have 9 years of work experience in software development and a degree in Bachelor of Technology in IT.
                            </p>
                            <p class="text-secondary">
                                I love to build solutions quickly, measure their results and learn what customers really want.
                                <a href="#contact" class="js-scroll-trigger alert-link text-info">
                                    Feel free to contact me
                                </a> if you want to share something about new projects or partnerships.
                            </p>
                        </div>
                    </div>
                </div>

                <skills-chart></skills-chart>

            </div>
        </div>
    </section>

</template>

<script>
export default {
    name: "AboutSection",
    data() {
        return {
            assetUrl: window.routes.asset,
            categories: [
                {
                    title: 'Back-End',
                    description: 'MVC frameworks, RESTful APIs and an efficient database management',
                    fa: 'fas fa-database'
                },{
                    title: 'Front-End',
                    description: 'Responsive, intuitive and fast UX/UI solutions using modern JS frameworks',
                    fa: 'fa-code'
                },{
                    title: 'DevOps',
                    description: 'Shorter cycles for continuous gains: BDD, PaaS and version control',
                    fa: 'fa-server'
                },{
                    title: 'Methodology',
                    description: 'Lean development, A/B testing or agile methods for MVPs or legacy systems',
                    fa: 'fa-sticky-note'
                },
            ]
        }
    }
}
</script>

<style scoped>
    .who-am-i { font-size:95% }
    .rounded-circle { max-height:250px; }
    .who-am-i-skills { margin-top:100px; }
</style>
