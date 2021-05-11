<template>
    <div v-show="message">
        <p class="help is-danger">
            {{ message }}
        </p>
    </div>
</template>

<script>
    export default {
        props: ['message']
    }
</script>
