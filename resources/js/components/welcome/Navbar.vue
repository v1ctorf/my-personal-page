<template>
    <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav" ref="mainnavbar">
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
                }
            }
        },
        created() {
            window.addEventListener('scroll', this.handleScroll());
        },
        mounted() {

            // console.log(this.$refs);
        },
        methods: {
            handleScroll() {
                console.log('handleScroll', new Date());
                let navbar = this.$refs.mainnavbar;

                if (navbar === undefined) {
                    return;
                }

                console.log(navbar.clientLeft, navbar.clientTop);
                // console.log(this.$refs.mainnavbar);
                // const left = this.$refs.mainnavbar.getBoundingClientRect().left
                // const top = this.$refs.mainnavbar.getBoundingClientRect().top
                //
                // console.log(top, left);
            }
        }
    }
</script>

<style scoped>

</style>
