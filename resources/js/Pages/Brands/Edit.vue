<template>
    <Head title="Upadte-Brand"></Head>

    <div class="text-md breadcrumbs mb-5">
        <ul>
            <li>
                <Link href="/">Dashboard</Link>
            </li>
            <li>
                <Link href="/brands">Brands</Link>
            </li>
            <li>Update Brand</li>
        </ul>
    </div>
    <form @submit.prevent="submit">
        <div class="p-10 card bg-base-200 md:w-3/6 w-full mx-auto">
            <div class="form-control mb-3">
                <label class="label">
                    <span class="label-text">Name</span>
                </label>
                <input v-model="brand.data.name" class="input" placeholder="Brand name" type="text">
                <!-- <div v-if="this.errors.name" class="text-red-500 text-sm my-2">{{ this.errors.name }}</div> -->
            </div>
            <div class="form-control mb-3">
                <label class="label">
                    <span class="label-text">Slogan</span>
                </label>
                <input v-model="brand.data.slogan" class="input" placeholder="Brand slogan" type="text">
            </div>
            <div class="form-control mb-3">
                <label class="label">
                    <span class="label-text">Brand Logo</span>
                </label>
                <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                    <div class="space-y-1 text-center">
                        <svg aria-hidden="true" class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor"
                             viewBox="0 0 48 48">
                            <path
                                d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                        </svg>
                        <div class="flex text-sm text-gray-600">
                            <label class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500"
                                   for="file-upload">
                                <span>Upload a file</span>
                                <input id="file-upload" class="sr-only" name="file-upload"
                                       type="file" @input="brand.data.logo = $event.target.files[0]">
                            </label>
                            <p class="pl-1">or drag and drop</p>
                        </div>
                        <p class="text-xs text-gray-500">
                            PNG, JPG, GIF up to 10MB
                        </p>
                    </div>
                    <div class="m-auto">
                        <img :src="`/storage/${brand.data.logo}`" alt="Brand_Logo">
                    </div>
                </div>
            </div>
            <div class="form-control mb-5">
                <label class="label" for="owner">
                    <span class="label-text">Brand Owner</span>
                </label>
                <select id="owner" v-model="brand.data.user_id" class="select">
                    <option v-for="owner in owners" :key="owner.id" :value="owner.id">{{ owner.name }}</option>
                    <option selected="selected">{{ brand.data.owner.name }}</option>
                </select>
            </div>
            <button class="btn">Update</button>
        </div>
    </form>
</template>

<script>
import {Inertia} from '@inertiajs/inertia';

export default {
    setup(props) {
        function submit() {
            Inertia.put('/brands/' + props.brand.data.id, props.brand.data);
        }

        return {submit};
    },

    props: {
        owners: Array,
        brand: Object
    }
}
</script>

<style>

</style>
