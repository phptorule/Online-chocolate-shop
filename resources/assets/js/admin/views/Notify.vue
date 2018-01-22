<template>
    <div class="notify">
        <h1>{{ message }}</h1>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                message: 'Notify Test'
            };
        }
    }
</script>

<style>
    .notify {
        background-color: #919191;
    }
</style>