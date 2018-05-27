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



   mix.js(['resources/assets/js/app.js',
        ], 'public/js/Vue-App.js' );

   mix.scripts([
      'resources/assets/js/vendors/toastr.js',
      'resources/assets/js/vendors/select2.full.min.js',
    ], 'public/js/app.js'    ) ;// Archivo de salida JS

   mix.styles ([
        'resources/assets/css/toastr.css',
        'resources/assets/css/app.css',
        'resources/assets/css/select2.css',
       ], 'public/css/app.css') ;     // Archivo de salida CSS


    mix.browserSync({
      proxy: 'http://balquimia-erp.local',
      open: false,
      //browser : 'Google Chrome',
    });

    mix.disableNotifications();

