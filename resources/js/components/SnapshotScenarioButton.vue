<template>
    <button type="button" class="btn btn-success" @click="takeSnapshot" :disabled="isLoading">
        {{ isLoading ? 'Loading...' : 'Snapshot' }}
    </button>
</template>

<script>
    export default {
        name: 'SnapshotScenarioButton',
        props: ['name'],
        data() {
            return {
                isLoading: false
            }
        },
        methods: {
            takeSnapshot() {
                let uri = `${this.$apiBaseUri}scenarios/${this.name}/snapshot`;
                this.isLoading = true;

                axios.post(uri).then(() => {
                    this.$root.$emit('updateScenarioChart');
                    this.isLoading = false;
                });
            }
        }
    }
</script>

<style scoped>

</style>
