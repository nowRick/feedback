<template>
    <div class="loading">
        <h3>Подождите, запрос отправляется...</h3>
    </div>
</template>

<script>
    export default {
        name: 'loading'
    }
</script>

<style>
    .loading {
        background-color: #213247;
        color: white;
        padding: 20px;
        border-radius: 10px;
        position: absolute;
        left: 50%;
        top: 20%;
        transform: translate(-50%, -50%)
    }
</style>
