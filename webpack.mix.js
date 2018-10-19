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

mix.sass('resources/assets/sass/frontend/SearchApp.scss', '../resources/assets/sass/frontend')
    .react('resources/assets/js/frontend/searchProject.js', 'public/js')
    .react('resources/assets/js/frontend/searchInternship.js', 'public/js');

mix.sass('resources/assets/sass/frontend/app.scss', 'css/frontend.css')
    .sass('resources/assets/sass/backend/app.scss', 'css/backend.css')
    .js('resources/assets/js/frontend/app.js', 'js/frontend.js')
    .js([
        'resources/assets/js/backend/before.js',
        'resources/assets/js/backend/app.js',
        'resources/assets/js/backend/after.js'
    ], 'js/backend.js');

if (mix.inProduction() || process.env.npm_lifecycle_event !== 'hot') {
    mix.version();
}
