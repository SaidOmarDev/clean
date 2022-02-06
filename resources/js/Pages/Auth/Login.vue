<template>
    <Head title="Login"></Head>

    <div class="column md flex-center md window-height">
        <q-card flat bordered class="my-card bg-grey-1 q-pa-md" style="width: 500px; height: 350px">
            <q-form @submit="submit" class="column justify-between" style="height: 100%">
                <h4 class="text-center q-ma-none q-mb-lg text-weight-bold">Login</h4>
                <div v-if="form.errors.email" class="text-red text-sm my-2">{{ form.errors.email }}</div>
                <q-input outlined v-model="form.email" type="email" label="Email" />
                <q-input outlined v-model="form.password" type="password" label="Password" />
                <div>
                    <Link class="text-blue-700 text-sm hover:underline" href="/forgot-password">Forget password?</Link>
                </div>
                <q-btn color="black" type="submit" class="full-width" label="Login"/>
            </q-form>
        </q-card>
    </div>
</template>

<script setup>
    import { useForm } from '@inertiajs/inertia-vue3'

    const form = useForm({
        email: '',
        password: '',
    })

    const submit =  () => {
        form.post('/login');
    }
</script>
<script>
export default {
    setup(){

    },
    layout: ''
}
</script>
