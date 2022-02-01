<template>
    <Head title="New-Brand"></Head>

    <div class="text-md breadcrumbs mb-5">
        <ul>
            <li>
                <Link href="/">Dashboard</Link>
            </li>
            <li>
                <Link href="/brands">Brands</Link>
            </li>
            <li>Create New Brand</li>
        </ul>
    </div>
    <form @submit.prevent="submit">
        <div class="p-10 card bg-base-200 md:w-3/6 w-full mx-auto">
            <div class="form-control mb-3">
                <label class="label">
                    <span class="label-text">Name</span>
                </label>
                <input type="text" v-model="form.name" placeholder="Brand name" class="input">
                <div v-if="form.errors.name" class="text-red-500 text-sm my-2">{{ form.errors.name }}</div>
            </div>
            <div class="form-control mb-3">
                <label class="label">
                    <span class="label-text">Slogan</span>
                </label>
                <input type="text" v-model="form.slogan" placeholder="Brand slogan" class="input">
                <div v-if="form.errors.slogan" class="text-red-500 text-sm my-2">{{ form.errors.slogan }}</div>
            </div>
            <div class="form-control mb-3">
                <label class="label">
                    <span class="label-text">Brand Logo</span>
                </label>
                <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                    <div class="space-y-1 text-center">
                        <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                            <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <div class="flex text-sm text-gray-600">
                            <label for="file-upload" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                <span>Upload a file</span>
                                <input id="file-upload" @input="form.logo = $event.target.files[0]" name="file-upload" type="file" class="sr-only">
                            </label>
                            <p class="pl-1">or drag and drop</p>
                        </div>
                        <p class="text-xs text-gray-500">
                            PNG, JPG, GIF up to 10MB
                        </p>
                        <progress v-if="form.progress" :value="form.progress.percentage" max="100">
                            {{ form.progress.percentage }}%
                        </progress>
                    </div>
                </div>
                <div v-if="form.errors.logo" class="text-red-500 text-sm my-2">{{ form.errors.logo }}</div>
            </div>
            <div class="form-control mb-5">
                <label for="owner" class="label">
                    <span class="label-text">Brand Owner</span>
                </label>
                <select class="select" id="owner" v-model="form.user_id">
                    <option disabled="disabled" selected="selected">Choose Brand Owner</option>
                    <option v-for="owner in owners" :key="owner.id" :value="owner.id">{{ owner.name }}</option>
                </select>
                <div v-if="form.errors.user_id" class="text-red-500 text-sm my-2">{{ form.errors.user_id }}</div>
            </div>
            <button class="btn">Create</button>
        </div>
    </form>
</template>

<script>
import { useForm } from '@inertiajs/inertia-vue3'
export default {
    setup() {
        const form = useForm({
            name: '',
            slogan: '',
            logo: '',
            user_id: ''
        })

        function submit(){
            form.post('/brands');
        }

        return { form, submit };
    },

    props: {
        owners: Array
    }
}
</script>

<style>

</style>
