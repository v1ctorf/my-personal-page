<template>
    <button type="button" @click="switchActiveFlag" :disabled="isLoading" class="btn" :class="{
        'btn-outline-light': isActive,
        'btn-light': !isActive }">
        {{ isLoading ? 'Loading...' : (isActive ? 'Deactivate' : 'Activate') }}
    </button>
</template>

<script>
    export default {
        name: "SwitchScenarioActivationButton",
        props: {
            active: Boolean,
            name: String
        },
        data() {
            return {
                isActive: this.active,
                isLoading: false
            }
        },
        methods: {
            switchActiveFlag() {
                let uri = `${this.$apiBaseUri}/scenarios/${this.name}/activate`,
                    httpMethod = this.isActive ? 'delete' : 'patch';

                this.isLoading = true;

                axios[httpMethod](uri).then(response => {
                    if (response.status == 204) {
                        this.isActive = !this.isActive;
                        this.$root.$emit('markScenarioAsActive', this.isActive);
                        this.isLoading = false;
                    } else {
                        alert('error');
                        throw `switchActiveFlag: can't handle http code ${response.status}`;
                    }
                });
            }
        }
    }
</script>

<style scoped>

</style>
