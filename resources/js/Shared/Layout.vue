<template>
  <q-layout view="hhh lpR lff">

    <q-header elevated class="bg-blue-grey-10 text-white" height-hint="98">
      <q-toolbar>
        <q-btn dense flat round icon="menu" @click="toggleLeftDrawer" />
        <q-toolbar-title>
          Title
        </q-toolbar-title>
      </q-toolbar>
    </q-header>

    <q-drawer bordered show-if-above v-model="leftDrawerOpen" side="left" class="bg-white text-grey-5 q-py-lg q-px-md" >
      <div class="column px-2 mx-2">
        <SideLink href="/" :label="'Dashboard'" :icon="'dashboard_customize'" />
        <SideLink href="/users" :label="'Users'" :icon="'people'" />
        <SideLink href="/brands" :label="'Brands'" :icon="'branding_watermark'" />
        <SideLink href="/about" :label="'About'" :icon="'description'" />
      </div>
    </q-drawer>

    <q-page-container>
      <q-page class="bg-secondary q-pa-lg q-pb-xl">
        <slot />
      </q-page>
      <router-view />
    </q-page-container>

    <q-footer class="text-center bg-white text-dark q-pa-md" bordered>
      <p class="q-ma-none">Copyright © 2022 - All right reserved by Prameg.</p>
    </q-footer>

  </q-layout>
    <!-- <div v-if="$page.props.flash.message" class="absolute bottom-5 right-3 bg-teal-800 p-2 text-white">
        {{ $page.props.flash.message }}
    </div> -->
</template>

<script>
import { ref } from 'vue'
import SideLink from './SideLink.vue'

export default {
  setup () {
    const leftDrawerOpen = ref(false)
    const rightDrawerOpen = ref(false)

    return {
      leftDrawerOpen,
      toggleLeftDrawer () {
        leftDrawerOpen.value = !leftDrawerOpen.value
      },

      rightDrawerOpen,
      toggleRightDrawer () {
        rightDrawerOpen.value = !rightDrawerOpen.value
      }
    }
  },
  components: { SideLink }
}
</script>

<style>
  a{
    text-decoration: none;
  }
</style>
