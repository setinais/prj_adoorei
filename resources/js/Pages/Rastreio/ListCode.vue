<template>
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
</template>

<style scoped>

</style>

<script>
    import { defineComponent } from 'vue'
    import AddingCode from "@/Pages/Rastreio/AddingCode"
    import JetButton from "@/Jetstream/SecondaryButton"

    export default defineComponent({
        components: {
            AddingCode,
            JetButton
        },
        data(){
            return {
                showModalAddingCode: false,
                form: this.$inertia.form({
                    code: ''
                })
            }
        },
        methods: {
            refreshCode(){

            }
        }
    })
</script>
