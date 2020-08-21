<template>
    <button type="button" class="btn btn-success" @click="takeSnapshot">
        Snapshot
    </button>
</template>

<script>
    export default {
        name: 'SnapshotScenarioButton',
        props: ['name'],
        methods: {
            takeSnapshot() {
                console.log('from proper component');
                let uri = `${this.$apiBaseUri}scenarios/${this.name}/snapshot`;

                axios.post(uri).then(() => {
                    this.$root.$emit('updateChart');
                });
            }
        }
    }
</script>

<style scoped>

</style>
