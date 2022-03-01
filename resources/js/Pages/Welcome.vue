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
            <div class="flex items-top 0">
                <div class="grid grid-cols-8">
                    <div class="col-span-5 p-8">
                        <h1 class="text-xl font-medium">RASTREAMENTO DE ENCOMENDAS</h1>
                        <h5 class="text-sm">Acompanhe seus pacotes enviados em tempo real</h5>
                    </div>
                    <div class="col-span-3 fixed top-0 right-0 px-6 py-4 sm:block">
                        <adding-code></adding-code>
                        <jet-button @click="refreshCode" class="ml-3 bg-gray-400 text-white text-[9px]">
                            ATUALIZAR CÓDIGOS
                        </jet-button>
                    </div>
                </div>
            </div>
            <div class="p-5">
                <table class="text-left border-collapse table-auto">
                    <thead>
                        <tr class="border-b border-slate-200">
                            <th class="sticky z-10 top-0 text-base font-black leading-6 font-semibold text-slate-700 p-0 mr-0 pr-0 dark:bg-slate-900 dark:text-slate-300">
                                <div class="py-2 pr-2">
                                    CÓDIGO
                                </div>
                            </th>
                            <th class="sticky z-10 top-0 text-base font-black leading-6 font-semibold text-slate-700 p-0 dark:bg-slate-900 dark:text-slate-300">
                                <div class="py-2 pl-20">
                                    STATUS
                                </div>
                            </th>
                            <th class="w-full sticky z-10 top-0 text-base font-black leading-6 font-semibold text-slate-700 p-0 dark:bg-slate-900 dark:text-slate-300">
                                <div class="py-2 pl-16 ">
                                    ÚLTIMA ATUALIZAÇÃO
                                </div>
                            </th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody class="align-baseline">
                        <tr class="border-b border-slate-100">
                            <td translate="no" class="py-6 font-mono font-medium text-xs leading-6 whitespace-nowrap dark:text-sky-400">
                                table-auto
                            </td>
                            <td translate="no" class="pl-16 py-6 font-mono text-xs leading-6 whitespace-pre dark:text-indigo-300">
                                <span class="bg-gray-500 dark:bg-slate-500 rounded-3xl px-4 py-2 text-white">
                                    table-layout: auto;
                                </span>
                            </td>
                            <td translate="no" class="pl-16 py-6 font-mono text-xs leading-6 whitespace-pre dark:text-indigo-300">
                                table-layout: auto;
                            </td>
                            <td translate="no" class="py-6 pr-10 font-mono text-xs leading-6 whitespace-pre dark:text-indigo-300 ">
                                <span class="hover:text-gray-500">
                                    <i class="fa-solid fa-truck-fast fa-xl cursor-pointer focus:outline-none focus:ring focus:ring-violet-300 bg-gray-200"></i>
                                </span>
                            </td>

                        </tr>
                    </tbody>
                </table>
            </div>
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
    import AddingCode from "@/Pages/Rastreio/AddingCode"
    import JetButton from "@/Jetstream/SecondaryButton"

    export default defineComponent({
        components: {
            Head,
            Link,
            AddingCode,
            JetButton
        },
        props:{
            adooreiImg: String
        },
        methods: {
            refreshCode(){

            }
        }
    })
</script>
