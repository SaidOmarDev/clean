<template>
    <Head title="ForgetPassword" />
    <div class="min-h-screen grid place-items-center">
        <section class="p-10 card bg-base-200 md:w-3/6 w-full">
            <form @submit.prevent="submit">
                <div class="form-control mb-3 w-full">
                    <label class="label">
                        <span class="label-text">Email</span>
                    </label>
                    <input type="email" v-model="form.email" placeholder="Enter your email" class="input">
                    <div v-if="form.errors.email" class="text-red-500 text-sm my-2">{{ form.errors.email }}</div>
                </div>
                <button class="btn mt-3 w-full">Send reset link</button>
            </form>
        </section>
    </div>
</template>

<script>
import { useForm } from '@inertiajs/inertia-vue3';
export default {
    setup(){
        const form = useForm({
            email: ''
        })
        function submit(){
            form.post('/forgot-password')
        }
        return { form, submit};
    },
    layout: ''
}
</script>

<style>

</style>
