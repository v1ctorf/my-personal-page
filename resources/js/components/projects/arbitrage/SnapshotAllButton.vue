<template>
    <button type="button" class="btn btn-success" @click="snapshotAllScenarios" :disabled="isLoading">
        <slot v-if="isLoading == false"></slot>
        <span v-else>Loading...</span>
    </button>
</template>

<script>
    export default {
        name: "SnapshotAllButton",
        data() {
            return {
                isLoading: false
            }
        },
        methods: {
            snapshotAllScenarios() {
                this.isLoading = true;

                axios.post(this.$apiBaseUri + this.$routes.snapshotAll).then(response => {
                    this.$root.$emit('updateScenariosTable');
                    this.isLoading = false;
                });
            }
        }
    }
</script>
