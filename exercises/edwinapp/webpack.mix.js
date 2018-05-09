const { mix } = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management- Replacing gulp
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS and CSS files.
 |
 | Run this command from terminal:
 |    npm run production
 |
 */

 mix
   //.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css')

   .styles([
        'resources/assets/css/blog-post.css',
        'resources/assets/css/bootstrap.css',
        'resources/assets/css/font-awesome.css',
        'resources/assets/css/metisMenu.css',
        'resources/assets/css/sb-admin-2.css',
        'resources/assets/css/timeline.css',
        'resources/assets/css/styles.css'
    ], 'public/css/all.css')

    .scripts([
        'resources/assets/js/jquery.js',  // IMPORTANT: jquery should be included on top here
        'resources/assets/js/bootstrap.js',
        'resources/assets/js/metisMenu.js',
        'resources/assets/js/sb-admin-2.js',
        //'resources/assets/js/scripts.js',
        //'resources/assets/js/dropzone.js'
    ], 'public/js/all.js');
