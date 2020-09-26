<template>
    <div class="col mb-2">
        <a :href="icon.url" target="_blank" :title="icon.title">
            <i class="fa-2x text-secondary" :class="icon.fa"></i>
        </a>
    </div>
</template>

<script>
    export default {
        name: "FooterIcon",
        props: ['icon']
    }
</script>

<style scoped>

</style>
