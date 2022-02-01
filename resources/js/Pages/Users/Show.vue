<template>
    <Head title="Profile"></Head>
    <div class="container mx-auto my-5 p-5">
        <div class="md:flex no-wrap md:-mx-2 ">
            <!-- Left Side -->
            <div class="w-full md:w-3/12 md:mx-2">
                <!-- Profile Card -->
                <div class="bg-white p-3 border-t-4 border-green-400">
                    <div class="image overflow-hidden" style="width:100%; height: 200px; border: 1px solid #eee">
                        <img class="h-auto w-full mx-auto"
                            :src="`base_path(storage/${user.avatar})`"
                            alt="User Avatar">
                    </div>
                    <ul
                        class="bg-gray-100 text-gray-600 hover:text-gray-700 hover:shadow py-2 px-3 mt-3 divide-y rounded shadow-sm">
                        <li class="flex items-center py-3">
                            <span>Status</span>
                            <span class="ml-auto"><span
                                    class="bg-green-500 py-1 px-2 rounded text-white text-sm">Active</span></span>
                        </li>
                        <li class="flex items-center py-3">
                            <span>Member since</span>
                            <span class="ml-auto">Nov 07, 2016</span>
                        </li>
                    </ul>
                </div>
                <!-- End of profile card -->
            </div>
            <!-- Right Side -->
            <div class="w-full md:w-9/12 mx-2 h-64">
                <!-- Profile tab -->
                <!-- About Section -->
                <div class="bg-white p-3 shadow-sm rounded-sm">
                    <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8">
                        <span clas="text-green-500">
                            <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </span>
                        <span class="tracking-wide">About</span>
                    </div>
                    <div class="text-gray-700">
                        <div class="grid md:grid-cols-2 text-sm">
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">User Name</div>
                                <div class="px-4 py-2">{{ user.name }}</div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Gender</div>
                                <div class="px-4 py-2">Male</div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Contact No.</div>
                                <div class="px-4 py-2">{{ user.mobile }}</div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Email.</div>
                                <div class="px-4 py-2">
                                    <a class="text-blue-800" :href="'mailto:' + user.email">{{ user.email }}</a>
                                </div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Birthday</div>
                                <div class="px-4 py-2">Feb 06, 1998</div>
                            </div>
                        </div>
                    </div>
                    <label
                        for="profile-modal"
                        class="btn btn-primary modal-button mt-8 text-sm font-semibold rounded-lg hover:bg-gray-100 hover:text-blue-800 focus:outline-none focus:shadow-outline focus:bg-gray-100 hover:shadow-xs p-3 my-4 float-right">
                        Update profile
                    </label>
                    <input type="checkbox" id="profile-modal" class="modal-toggle">
                    <div class="modal">
                        <div class="modal-box">
                            <form @submit.prevent="submit">
                                <div class="p-10 card bg-base-200 w-full mx-auto">
                                    <div class="form-control mb-3">
                                        <label class="label">
                                            <span class="label-text">Name</span>
                                        </label>
                                        <input type="text" v-model="user.name" class="input">
                                        <!-- <div v-if="errors.name" class="text-red-500 text-sm my-2">{{ errors.name }}</div> -->
                                    </div>
                                    <div class="form-control mb-3">
                                        <label class="label">
                                            <span class="label-text">Email</span>
                                        </label>
                                        <input type="email" v-model="user.email" class="input">
                                        <!-- <div v-if="errors.email" class="text-red-500 text-sm my-2">{{ errors.email }}</div> -->
                                    </div>
                                    <div class="form-control mb-3">
                                        <label class="label">
                                            <span class="label-text">User avatar</span>
                                        </label>
                                        <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                                            <div class="space-y-1 text-center">
                                                <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                                <div class="flex text-sm text-gray-600">
                                                    <label for="file-upload" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                                        <span>Upload a file</span>
                                                        <input id="file-upload" @input="user.avatar = $event.target.files[0]" name="file-upload" type="file" class="sr-only">
                                                    </label>
                                                    <p class="pl-1">or drag and drop</p>
                                                </div>
                                                <p class="text-xs text-gray-500">
                                                    PNG, JPG, GIF up to 10MB
                                                </p>
                                            </div>
                                            <div class="m-auto">
                                                <img :src="`/storage/${user.avatar}`" alt="Brand_Logo">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-control mb-5">
                                        <label for="owner" class="label">
                                            <span class="label-text">User Mobile</span>
                                        </label>
                                        <input type="text" v-model="user.mobile" class="input">
                                        <!-- <div v-if="errors.mobile" class="text-red-500 text-sm my-2">{{ errors.mobile }}</div> -->
                                    </div>
                                    <button class="btn">Update</button>
                                </div>
                            </form>
                            <div class="modal-action">
                                <label for="profile-modal" class="btn">Close</label>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End of about section -->
            </div>
                <!-- End of profile tab -->
        </div>
    </div>
</template>

<script>
import { Inertia } from '@inertiajs/inertia';
export default {
    setup(props) {
        function submit(){
            Inertia.put('/users/'+ props.user.id, props.user);
        }

        return { submit };
    },
    props: {
        user: Array
    }
}
</script>

<style>

</style>
