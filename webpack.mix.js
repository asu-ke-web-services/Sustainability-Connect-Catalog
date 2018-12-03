let mix = require('laravel-mix');

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

let public_js = 'public/js/';
let public_css = 'public/css/';
let resource_sass = 'resources/assets/sass/';
let resource_js = 'resources/assets/js/';

// mix.sass(resource_sass + 'frontend/SearchApp.scss', resource_sass + 'frontend')
//   .copy(resource_sass + 'frontend/SearchApp.css', public_css);

mix.react(resource_js + 'frontend/searchProject.js', public_js);

mix.react(resource_js + 'frontend/searchCompletedProject.js', public_js);

mix.react(resource_js + 'frontend/searchInternship.js', public_js);

mix.sass(resource_sass + 'backend/app.scss', public_css + 'backend.css')
  .js([
    resource_js + 'backend/before.js',
    resource_js + 'backend/app.js',
    resource_js + 'backend/after.js'
  ], public_js + 'backend.js');

// mix.sass('resources/assets/sass/frontend/app.scss', 'css/frontend.css');
//   .js('resources/assets/js/frontend/app.js', 'js/frontend.js');

// mix.js('resources/assets/js/frontend/app.js', public_js);

if (mix.inProduction() || process.env.npm_lifecycle_event !== 'hot') {
  mix.version();
}
