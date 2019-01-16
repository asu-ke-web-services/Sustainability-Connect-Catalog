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

mix.sass('resources/assets/sass/backend/app.scss', 'css/backend.css')
    .js([
        'resources/assets/js/backend/before.js',
        'resources/assets/js/backend/app.js',
        'resources/assets/js/backend/after.js'
    ], 'js/backend.js')
    .extract([
        'jquery',
        'bootstrap',
        'popper.js/dist/umd/popper',
        'axios',
        'sweetalert2',
        'lodash',
        '@fortawesome/fontawesome-svg-core',
        '@fortawesome/free-brands-svg-icons',
        '@fortawesome/free-regular-svg-icons',
        '@fortawesome/free-solid-svg-icons'
    ]);

if (mix.inProduction() || process.env.npm_lifecycle_event !== 'hot') {
    mix.version();
}




let public_js = 'public/js/';
let public_css = 'public/css/';
let resource_sass = 'resources/assets/sass/';
let resource_js = 'resources/assets/js/';

mix.sass(resource_sass + 'frontend/SearchApp.scss', resource_sass + 'frontend')
  .copy(resource_sass + 'frontend/SearchApp.css', public_css);

mix.react(resource_js + 'frontend/searchProject.js', public_js);

mix.react(resource_js + 'frontend/searchCompletedProject.js', public_js);

mix.react(resource_js + 'frontend/searchInternship.js', public_js);

mix.sass('resources/assets/sass/frontend/app.scss', 'css/frontend.css')
  .js('resources/assets/js/frontend/app.js', 'js/frontend.js');

mix.js('resources/assets/js/frontend/app.js', public_js);
