<template>
    <jet-input></jet-input>
</template>

<style scoped>

</style>

<script>
    import { defineComponent } from 'vue'
    import JetInput  from '@/Jetstream/Input'
    import JetInputError from '@/Jetstream/InputError'

    export default defineComponent({
        components: {
            JetInput,
            JetInputError
        },
        methods: {

        }
    })
</script>
