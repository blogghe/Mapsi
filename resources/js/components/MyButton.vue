<template>
    <div>
        <button type="submit" class="my-button btn btn-primary" v-text="text"></button>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        props: [
            'text'
        ]
    }
</script>

<style>
    .my-button{
        padding:10px 20px;
        font-weight: bold;
        background-color:#5446D9;
        border-color: #9561e2;
        color: #fff;
    }
</style>
