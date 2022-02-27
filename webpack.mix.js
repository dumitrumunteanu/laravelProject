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
    .vue()
    .sass('resources/sass/app.scss', 'public/css');

mix.js('resources/js/calendarUI.js', 'public/js')
    .postCss('resources/css/calendarUI.css', 'public/css');

mix.js('resources/js/blog/blog.js', 'public/js/blog');

mix.js('resources/js/settings/settings.js', 'public/js/settings');
