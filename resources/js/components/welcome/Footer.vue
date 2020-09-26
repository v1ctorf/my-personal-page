<template>
    <footer class="bg-dark py-4">
        <div class="container">
            <div class="row text-center">
                <footer-icon v-for="(icon, i) in icons" :key="i" :icon="icon"></footer-icon>
            </div>
            <hr>
            <div class="row text-center mt-4">
                <div class="col-md-8 offset-md-2">
                    <div class="text-secondary">Copyright &copy; 2019 - victorf</div>
                </div>
            </div>
        </div>
    </footer>
</template>

<script>
    export default {
        name: "Footer",
        data() {
            return {
                icons: [
                    {
                        url:"https://linkedin.com/in/fvictor",
                        title:"LinkedIn",
                        fa:"fab fa-linkedin-in"
                    },{
                        url:"https://github.com/v1ctorf/",
                        title:"Github",
                        fa:"fab fa-github"
                    },{
                        url:"https://bitbucket.org/v1ctorf/",
                        title:"BitBucket",
                        fa:"fab fa-bitbucket"
                    },{
                        url:"https://stackoverflow.com/users/1810183/victor-f",
                        title:"StackOverflow",
                        fa:"fab fa-stack-overflow"
                    },{
                        url:"https://www.hackerrank.com/v1ctorf",
                        title:"HackerRank",
                        fa:"fab fa-hackerrank"
                    },{
                        url:"https://www.goodreads.com/victorf",
                        title:"Goodreads",
                        fa:"fab fa-goodreads"
                    },{
                        url:"https://www.chess.com/member/victorfs",
                        title:"Chess.com",
                        fa:"fas fa-chess"
                    }
                ]
            }
        }
    }
</script>

<style scoped>

</style>
