<template>
    <Head title="ResetPassword" />
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
                <div class="form-control mb-3 w-full">
                    <label class="label">
                        <span class="label">Password</span>
                    </label>
                    <input type="password" v-model="form.password" placeholder="Enter your password" class="input">
                    <div v-if="form.errors.password" class="text-red-500 text-sm my-2">{{ form.errors.password }}</div>
                </div>
                <div class="form-control mb-3 w-full">
                    <label class="label">
                        <span class="label-text">Confirm Password</span>
                    </label>
                    <input type="password" v-model="form.password_confirmation" placeholder="Confirm your password" class="input">
                    <div v-if="form.errors.password_confirmation" class="text-red-500 text-sm my-2">{{ form.errors.password_confirmation }}</div>
                </div>
                <button type="submit" class="btn mt-3 w-full">Reset password</button>
            </form>
        </section>
    </div>
</template>

<script>
import { useForm } from '@inertiajs/inertia-vue3';
export default {
    props: {
        token: String
    },
    setup(props){
        const form = useForm({
            email: '',
            password: '',
            password_confirmation: '',
            token: props.token
        })
        function submit(){
            form.post('/reset-password')
        }
        return { form, submit};
    },
    layout: ''
}
</script>

<style>

</style>
