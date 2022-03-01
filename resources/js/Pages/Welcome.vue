<template>
    <Head title="Rastrear Encomenda" />
    <div class="grid grid-cols-8 min-h-screen">
        <div class="col-span-2 z-20 inset-0 top-[3.8125rem] bg-gray-100 dark:bg-gray-90 " >
            <div class="flex justify-center mt-9">
                <img :src="adooreiImg" alt="" height="60" width="50">
                <h1 class="font-black text-4xl ">adoorei</h1>
            </div>
        </div>
        <div class="col-span-6">
            <list-code></list-code>
        </div>
    </div>
</template>

<style scoped>
    .bg-gray-100 {
        background-color: #f7fafc;
        background-color: rgba(247, 250, 252, var(--tw-bg-opacity));
    }


</style>

<script>
    import { defineComponent } from 'vue'
    import { Head, Link } from '@inertiajs/inertia-vue3'
    import ListCode from "@/Pages/Rastreio/ListCode";

    export default defineComponent({
        components: {
            Head,
            Link,
            ListCode
        },
        props:{
            adooreiImg: String
        },
    })
</script>
