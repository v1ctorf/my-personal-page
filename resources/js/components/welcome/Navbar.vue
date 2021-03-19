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
                    <li v-for="(opt, i) in responsiveMenu" :key="i" class="nav-item">
                        <a class="nav-link js-scroll-trigger" :href="opt.url" @click="handleResponsiveMenu">
                            {{ opt.title }}
                        </a>
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
                isScrolled: false,
                responsiveMenu: []
            }
        },
        created() {
            window.addEventListener('scroll', this.handleScroll);
        },
        destroyed() {
            window.removeEventListener('scroll', this.handleScroll);
        },
        mounted() {
            this.loadResponsiveMenu();
        },
        methods: {
            handleScroll() {
                this.isScrolled = (document.getElementById('app').getBoundingClientRect().top < -100);
            },
            loadResponsiveMenu() {
                let menu = [
                    { title: 'About', url: this.url.about },
                    { title: 'Recent Work', url: this.url.portfolio },
                    { title: 'Contact', url: this.url.contact },
                    { title: 'Blog', url: this.url.blog },
                    { title: 'Dashboard', url: this.url.home, auth: true }
                ];

                let hasAuth = this.auth;

                this.responsiveMenu = menu.filter(function (opt) {
                    return opt.auth === undefined || hasAuth == opt.auth;
                });
            },
            handleResponsiveMenu() {
                // console.log(new Date());
                // Closes responsive menu when a scroll trigger link is clicked
                // $('.js-scroll-trigger').click(function() {
                //     $('.navbar-collapse').collapse('hide');
                // });
            }
        }
    }
</script>

<style scoped>

</style>
