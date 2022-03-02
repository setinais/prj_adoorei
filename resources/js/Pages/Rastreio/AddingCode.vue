<template>
    <jet-button @click="showModalAddCode" class="bg-gray-400 text-white text-[9px]">
        CADASTRAR CÓDIGO
    </jet-button>
    <jet-modal :show="showModalAddingCode" @close="closeModal">
        <template #title>
            Cadastrar Código
        </template>
        <template #content>
            Informe o codigo de rastreio que deseja acompanhar
            <div class="mt-4">
                <jet-input type="text" class="mt-1 block w-3/4" placeholder="Código"
                           ref="Código"
                           v-model="form.code"
                           @keyup.enter="createCode"
                           aria-required="true"/>
                <jet-input-error :message="form.errors.code" class="mt-2" />
            </div>
        </template>
        <template #footer>
            <jet-button class="ml-3" :class="{ 'opacity-25': form.processing }" :disabled="form.processing" @click="createCode">
                MONITORAR
            </jet-button>
        </template>
    </jet-modal>
</template>

<style scoped>

</style>

<script>
    import { defineComponent } from 'vue'
    import JetInput  from '@/Jetstream/Input'
    import JetInputError from '@/Jetstream/InputError'
    import JetButton from '@/Jetstream/SecondaryButton'
    import JetModal from '@/Jetstream/DialogModal'

    export default defineComponent({
        components: {
            JetInput,
            JetInputError,
            JetButton,
            JetModal
        },
        data(){
            return {
                showModalAddingCode: false,
                form: this.$inertia.form({
                    code: ''
                }),
                codeData: this.$inertia.form({

                })

            }
        },
        methods: {
            showModalAddCode(){
                this.showModalAddingCode = true;
            },
            closeModal() {
                this.showModalAddingCode = false
                this.form.reset()
            },
            createCode() {
                this.form.post(route('code.store'), {
                    preserveScroll: true,
                    onSuccess: () => this.closeModal(),
                    onError: () => this.$refs.code.focus(),
                    onFinish: () => this.form.reset(),
                })
            },
        }
    })
</script>
