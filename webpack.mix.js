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

mix.js('resources/js/app.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css');

/*  APPLICATION ADMIN  */
mix.js('resources/assets/admin/js/app.js', 'public/app_admin/js')
    .sass('resources/assets/admin/sass/app.scss', 'public/app_admin/css');