import {Quasar} from 'quasar'
import {createApp, h} from 'vue'
import Layout from './Shared/Layout.vue'
import {InertiaProgress} from '@inertiajs/progress'
import {createInertiaApp, Head, Link} from '@inertiajs/inertia-vue3'


createInertiaApp({
  resolve: async name => {
    let page = (await import(`./Pages/${name}`)).default;
    page.layout ??= Layout;

    return page;
  },

  setup({el, App, props, plugin}) {
    createApp({render: () => h(App, props)})
      .use(plugin)
      .use(Quasar)
      .component('Link', Link)
      .component('Head', Head)
      .mount(el)
  },
  title: title => 'Dash - ' + title
})

InertiaProgress.init({
  showSpinner: true,
})
