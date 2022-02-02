<template>
    <Head>
        <title>Users</title>
    </Head>

    <div class="navbar mb-2 bg-gray-50 text-sky-900">
        <div class="flex-1 hidden px-2 mx-2 lg:flex">
            <span class="text-lg font-bold">Dash-Users</span>
        </div>
        <div class="flex-1 lg:flex-none">
            <div class="form-control">
                <input class="input" placeholder="Search" type="text">
            </div>
        </div>
        <div class="flex-none">
            <button class="btn btn-square btn-ghost ml-2">
                <svg class="inline-block w-6 h-6 stroke-current" fill="none" viewBox="0 0 24 24"
                     xmlns="http://www.w3.org/2000/svg">
                    <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" stroke-linecap="round" stroke-linejoin="round"
                          stroke-width="2"></path>
                </svg>
            </button>
        </div>
        <div class="flex-none ml-3">
            <button class="btn btn-square btn-ghost w-fit px-3 text-blue-50 bg-cyan-700 hover:bg-cyan-900">
                Create user
            </button>
        </div>
    </div>

    <div class="overflow-x-auto">
        <table class="table w-full">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Mobile</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="user of users" :key="user.id">
                <th>{{ user.id }}</th>
                <td class="hover:underline">
                    <Link :href="'/users/' + user.id + '/profile'">{{ user.name }}</Link>
                </td>
                <td>{{ user.email }}</td>
                <td>{{ user.mobile }}</td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    props: {
        users: Array
    }
}
</script>

<style>

</style>
