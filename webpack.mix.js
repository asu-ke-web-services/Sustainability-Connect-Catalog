const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.setPublicPath('public');

mix.sass('resources/sass/frontend/coreui/app.scss', 'css/frontend.css')
  .sass('resources/sass/backend/app.scss', 'css/backend.css')
  .js(
    [
      'resources/js/frontend/before.js',
      'resources/js/frontend/app.js',
      'resources/js/frontend/after.js'
    ],
    'js/frontend.js'
  )
  .js([
    'resources/js/backend/before.js',
    'resources/js/backend/app.js',
    'resources/js/backend/after.js'
  ], 'js/backend.js')
  .extract([
    'jquery',
    'jquery-validation',
    'bootstrap',
    '@coreui/coreui-plugin-chartjs-custom-tooltips',
    'ladda',
    'toastr',
    'popper.js/dist/umd/popper',
    'axios',
    'sweetalert2',
    'lodash',
    '@fortawesome/fontawesome-svg-core',
    '@fortawesome/free-brands-svg-icons',
    '@fortawesome/free-regular-svg-icons',
    '@fortawesome/free-solid-svg-icons',
    'datatables.net',
    'datatables.net-bs4',
    'datatables.net-fixedheader-bs4',
    'datatables.net-responsive-bs4',
    'selectize',
  ]);
// .autoload({
//   jquery: ['$', 'window.jQuery'],
//   DataTable: 'datatables.net-bs4'
// });

// ReactJS Search apps (not used)
// mix
//   .sass('resources/sass/frontend/asu/SearchApp.scss', 'css/')
//   .react('resources/js/frontend/searchProject.js', 'js/')
//   .react('resources/js/frontend/searchCompletedProject.js', 'js/')
//   .react('resources/js/frontend/searchInternship.js', 'js/');


if (mix.inProduction() || process.env.npm_lifecycle_event !== 'hot') {
  mix.version();
}
