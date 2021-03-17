<template>
    <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" :class="{'navbar-scrolled': isScrolled}" id="mainNav">
        <div class="container">
            <a class="navbar-brand js-scroll-trigger" :href="url.pagetop">victorf</a>

            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                    data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                    aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto my-2 my-lg-0">
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" :href="url.about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" :href="url.portfolio">Recent Work</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" :href="url.contact">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" :href="url.blog">Blog</a>
                    </li>
                    <li v-if="auth" class="nav-item">
                        <a class="nav-link" :href="url.home">Dashboard</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

</template>

<script>
    export default {
        name: "Navbar",
        props: {
            auth: Boolean
        },
        data() {
            return {
                url: {
                    pagetop: window.routes.pagetop,
                    about: window.routes.about,
                    portfolio: window.routes.portfolio,
                    contact: window.routes.contact,
                    blog: window.routes.blog,
                    home: window.routes.home
                },
                isScrolled: false
            }
        },
        created() {
            window.addEventListener('scroll', this.handleScroll);
        },
        destroyed() {
            window.removeEventListener('scroll', this.handleScroll);
        },
        methods: {
            handleScroll() {
                this.isScrolled = (document.getElementById('app').getBoundingClientRect().top < -100);
            }
        }
    }
</script>

<style scoped>

</style>
