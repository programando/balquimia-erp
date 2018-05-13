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

// componentes      'resources/assets/js/main.js',                  // Instancia de Vue ( #main)

mix.js(['resources/assets/js/app.js',
        ], 'public/js/Vue-App.js' )

   mix.scripts([
      'resources/assets/js/toastr.js',
      'resources/assets/js/vue.js',
      'resources/assets/js/axios.js',
      'resources/assets/js/app-menu.js',
    ], 'public/js/app.js'    ) // Archivo de salida JS
   .styles ([
        'resources/assets/css/toastr.css',
        'resources/assets/css/app.css',
       ], 'public/css/app-temp.css') ;     // Archivo de salida CSS
