<template>
    <Head title="Login"></Head>
    <div class="min-h-screen grid place-items-center">
        <section class="p-10 card bg-base-200 md:w-3/6 w-full">
            <form @submit.prevent="submit">
                <h1 class="text-center font-bold text-2xl mb-6">Login</h1>
                <div class="form-control mb-3 w-full">
                    <label class="label">
                        <span class="label-text">Email</span>
                    </label>
                    <input type="email" v-model="form.email" placeholder="Enter your email" class="input">
                    <div v-if="form.errors.email" class="text-red-500 text-sm my-2">{{ form.errors.email }}</div>
                </div>
                <div class="form-control mb-3 w-full">
                    <label class="label">
                        <span class="label-text">Password</span>
                    </label>
                    <input type="password" v-model="form.password" placeholder="Enter your password" class="input">
                    <div v-if="form.errors.password" class="text-red-500 text-sm my-2">{{ form.errors.password }}</div>
                </div>
                <div>
                    <Link class="text-blue-700 text-sm hover:underline" href="/forgot-password">Forget password?</Link>
                </div>
                <button class="btn mt-3 w-full">Login</button>
            </form>
        </section>
    </div>
</template>

<script>
import { useForm } from '@inertiajs/inertia-vue3';
export default {
    setup() {
        const form = useForm({
            email: '',
            password: '',
        })

        function submit(){
            form.post('/login');
        }

        return { form, submit };
    },
    layout: ''
}
</script>

<style>

</style>
