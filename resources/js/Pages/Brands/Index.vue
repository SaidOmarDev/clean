<template>
    <Head>
        <title>Brands</title>
    </Head>

    <div class="text-md breadcrumbs mb-5">
        <ul>
            <li>
                <Link href="/">Dashboard</Link>
            </li>
            <li>Brands</li>
        </ul>
    </div>

    <div class="navbar mb-2 bg-gray-50 text-sky-900">
        <div class="flex-1 hidden px-2 mx-2 lg:flex">
            <span class="text-lg font-bold">Dash-Brands</span>
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
            <Link class="btn btn-square btn-ghost w-fit px-3 text-blue-50 bg-cyan-700 hover:bg-cyan-900" href="brands/create">
                Create brand
            </Link>
        </div>
    </div>

    <div class="overflow-x-auto">
        <table class="table w-full">
            <thead>
            <tr>
                <th>Logo</th>
                <th>Name</th>
                <th>Slogan</th>
                <th>Owner</th>
                <th>Edit</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="brand of brands.data" :key="brand.id">
                <td><img :src="`./storage/${ brand.logo }`" alt="Brand_Logo" style="width: 70px; height:70px"></td>
                <td>{{ brand.name }}</td>
                <td>{{ brand.slogan }}</td>
                <td>{{ brand.owner.name }}</td>
                <td>
                    <Link :href="`/brands/${brand.id}/edit`" class="hover:underline text-sky-700">Edit</Link>
                </td>
            </tr>
            </tbody>
        </table>
        <div class="btn-group mt-10">
            <Component
                :is="link.url ? 'Link' : 'span' "
                v-for="link in brands.meta.links"
                :key="link.label"
                :class="[link.active ? 'btn-active' : '', link.url ? '' : 'btn-disabled']"
                :href="link.url"
                class="btn"
                v-html="link.label"
            />
        </div>
    </div>
    <div v-if="$page.props.flash.message" class="alert">
        {{ $page.props.flash.message }}
    </div>
</template>

<script>
export default {
    props: {
        brands: Object
    }
}
</script>

<style>

</style>
