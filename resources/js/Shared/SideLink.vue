<template>
  <Link class="q-mb-sm" href="/">
    <q-btn
      align="left"
      flat
      rounded
      push
      class="bg-secondary full-width q-px-md q-py-sm text-blue-grey-10 text-weight-bold"
      :label="label"
      :icon="icon" />
  </Link>
</template>

<script>
export default {
  props:{
    label: String,
    icon: String
  }
}
</script>

<style>

</style>
