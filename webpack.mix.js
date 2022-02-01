const mix = require('laravel-mix');

mix.disableSuccessNotifications()
  .js('resources/js/app.js', 'public/js')
  .extract()
  .vue({version: 3})
  .sass('resources/scss/app.scss', 'public/css')
  .version()
