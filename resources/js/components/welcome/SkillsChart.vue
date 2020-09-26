<template>
    <div class="col-lg-6 col-md-6" id="skills">
        <div v-for="skill in skills" class="progress mb-2 skill-bar">
            <div class="progress-bar bg-info text-left" role="progressbar" :style="`width: ${skill.percentage}%`">
                <span class="ml-2 font-weight-bolder text-monospace text-uppercase">
                    {{ skill.name }}
                </span>
            </div>
            <div class="progress-bar bg-light text-right" role="progressbar" :style="`width: ${100 - skill.percentage}%`">
                <span class="mr-2 font-weight-bolder text-monospace text-uppercase text-secondary">{{
                    skill.percentage
                }}%</span>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "SkillsChart",
        data() {
            return {
                skills: [
                    { name:'PHP', percentage: 90 },
                    { name:'Python', percentage: 60 },
                    { name:'Java', percentage: 50 },
                    { name:'Laravel', percentage: 90 },
                    { name:'JavaScript', percentage: 80 },
                    { name:'Vue.js', percentage: 80 },
                    { name:'Heroku', percentage: 70 },
                    { name:'MySQL', percentage: 80 },
                    { name:'Shell Script', percentage: 50 },
                ]
            }
        }
    }
</script>

<style scoped>
    .skill-bar { height: 30px; }
</style>
