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
    .copy('resources/js/util.js','public/js/util.js')
   .sass('resources/sass/app.scss', 'public/css');
    // .styles('resources/js/summernote/summernote-bs4.css','public/css/summernote.css');
// mix.combine('resources/css/wireframe.css', 'public/css/app.css');