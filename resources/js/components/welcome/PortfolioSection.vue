<template>
    <section id="portfolio">
        <div class="container-fluid p-0 mb-4 mt-4">
            <h2 class="text-center mt-0">Recent Work</h2>
            <hr class="divider my-4">
            <div class="row no-gutters">

                <div v-for="(proj, i) in projects" :key="i" class="col-lg-4 col-sm-6" :class="{'offset-lg-2': i % 2 == 0}">
                    <a class="portfolio-box" href="javascript:;" data-toggle="modal" :data-target="`#Modal_${proj.num}`">
                        <img class="img-fluid" :src="`${assetUrl}img/portfolio/thumbnails/${proj.num}.jpg`">
                        <div class="portfolio-box-caption">
                            <div class="project-name">{{ proj.name }}</div>
                            <div class="project-category text-white-50">{{ proj.category }}</div>
                        </div>
                    </a>
                </div>

            </div>
        </div>
    </section>
</template>

<script>
export default {
    name: "PortfolioSection",
    data() {
        return {
            assetUrl: window.routes.asset,
            projects: [
                { num: 1, name: 'Zygä', category: 'Laravel (PHP)' },
                { num: 2, name: 'Korjuu', category: 'Laravel (PHP)' },
                { num: 3, name: 'DuoSystem', category: 'Symfony (PHP)' },
                { num: 4, name: 'Victory Consulting', category: 'Grails (Java & Groovy)' }
            ]
        }

    }
}
</script>

<style scoped>

</style>
