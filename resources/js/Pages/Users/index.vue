<template>
    <Head>
        <title>Users</title>
    </Head>

    <div class="q-pa-md bg-white q-mb-lg">
      <q-breadcrumbs>
        <q-breadcrumbs-el icon="home">
          <Link href="/" class="text-blue-grey-10">Dashboard</Link>
        </q-breadcrumbs-el>
        <q-breadcrumbs-el label="Users" icon="people" />
      </q-breadcrumbs>
    </div>

    <q-card class="bg-white row items-center justify-between q-pa-md q-mb-sm">
      <div class="px-2 mx-2 lg:flex">
          <span class="text-h6 text-weight-bold">Dash-Users</span>
      </div>
      <div class="row justify-between">
        <div class="row">
          <q-input filled v-model="text" label="Search..." dense />
          <q-btn icon="search" rounded dense class="q-ml-sm q-mr-lg q-px-sm" />
        </div>
        <Link href="/users/create">
          <q-btn label="Create user" />
        </Link>
      </div>
    </q-card>

    <div class="">
      <q-table
        title="Users"
        :rows="rows"
        :columns="columns"
        row-key="name"
      />
    </div>
</template>

<script>
  const columns = [
    {
      name: 'id',
      required: true,
      label: 'ID',
      align: 'left',
      field: row => row.id,
      format: val => `${val}`,
      sortable: true
    },
    { name: 'name', align: 'left', label: 'Name', field: row => row.name },
    { name: 'email', align: 'left', label: 'Email', field: row => row.email},
    { name: 'mobile', align: 'left', label: 'Mobile', field: row => row.mobile },

  ]
  let rows = []
  export default {

    props: {
        users: Array
    },
    setup(props){
      rows = props.users.map((user) => {
        return {
          id: user.id,
          name: user.name,
          email: user.email,
          mobile: user.mobile,
        }
      })
      return { columns, rows }
    }
  }
</script>

<style>

</style>
