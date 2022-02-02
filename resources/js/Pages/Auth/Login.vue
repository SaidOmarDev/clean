<template>
    <Head title="Login"></Head>

    <div class="min-h-screen grid place-items-center">
        <section class="p-10 card bg-base-200 md:w-3/6 w-full">
            <form @submit.prevent="submit">
                <h1 class="text-center text-primary mb-6">Login</h1>

                <div>
                    <q-btn label="Alert" color="primary" @click="alert = true" />

                    <q-dialog v-model="alert">
                        <q-card class="my-card">
                            <q-img src="https://cdn.quasar.dev/img/chicken-salad.jpg" />

                            <q-card-section>
                                <q-btn
                                    fab
                                    color="primary"
                                    icon="place"
                                    class="absolute"
                                    style="top: 0; right: 12px; transform: translateY(-50%);"
                                />

                                <div class="row no-wrap items-center">
                                    <div class="col text-h6 ellipsis">
                                        Cafe Basilico
                                    </div>
                                    <div class="col-auto text-grey text-caption q-pt-md row no-wrap items-center">
                                        <q-icon name="place" />
                                        250 ft
                                    </div>
                                </div>

                                <q-rating v-model="stars" :max="5" size="32px" />
                            </q-card-section>

                            <q-card-section class="q-pt-none">
                                <div class="text-subtitle1">
                                    $・Italian, Cafe
                                </div>
                                <div class="text-caption text-grey">
                                    Small plates, salads & sandwiches in an intimate setting.
                                </div>
                            </q-card-section>

                            <q-separator />

                            <q-card-actions align="right">
                                <q-btn v-close-popup flat color="primary" label="Reserve" />
                                <q-btn v-close-popup flat color="primary" round icon="event" />
                            </q-card-actions>
                        </q-card>
                    </q-dialog>
                </div>

                <div class="form-control mb-3 w-full">
                    <label class="label">
                        <span class="label-text">Email</span>
                    </label>
                    <input v-model="form.email" class="input" placeholder="Enter your email" type="email">
                    <div v-if="form.errors.email" class="text-red-500 text-sm my-2">{{ form.errors.email }}</div>
                </div>
                <div class="form-control mb-3 w-full">
                    <label class="label">
                        <span class="label-text">Password</span>
                    </label>
                    <input v-model="form.password" class="input" placeholder="Enter your password" type="password">
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

<script setup>
import { useForm } from '@inertiajs/inertia-vue3'
import {ref} from "vue";

const alert = ref(false)

const form = useForm({
    email: '',
    password: '',
})

const submit =  () => {
    form.post('/login');
}
</script>
