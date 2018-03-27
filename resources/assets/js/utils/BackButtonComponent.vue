<template>
    <a v-on:click="goBack()" class="btn btn-secondary float-left">Back</a>
</template>
<script>
    export default {
        methods: {
            goBack(){
                this.$router.go(-1);
            }
        }
    }
</script>