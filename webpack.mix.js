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


    // mix.styles([
    //     'resources/assets/vendor/line-awesome/line-awesome/line-awesome/css/line-awesome.min.css',
    //     'resources/assets/css/bootstrap.min.css',
    //     'resources/assets/css/plugins/owl-carousel/owl.carousel.css',
    //     'resources/assets/css/plugins/magnific-popup/magnific-popup.css',
    //     'resources/assets/css/plugins/jquery.countdown.css',
    //     // 'resources/assets/css/style.css',
    //     // 'resources/assets/css/skins/skin-demo-13.css',
    //     // 'resources/assets/css/demos/demo-13.css',
    // ], 'public/css/app.css').version();

    
    // mix.scripts([
    //     'resources/assets/js/jquery.min.js',
    //     'resources/assets/js/bootstrap.bundle.min.js',
    //     'resources/assets/js/jquery.hoverIntent.min.js',
    //     'resources/assets/js/jquery.waypoints.min.js',
    //     'resources/assets/js/superfish.min.js',
    //     'resources/assets/js/owl.carousel.min.js',
    //     'resources/assets/js/bootstrap-input-spinner.js',
    //     'resources/assets/js/jquery.magnific-popup.min.js',
    //     'resources/assets/js/jquery.plugin.min.js',
    //     // 'resources/assets/js/jquery.countdown.min.js',
    //     'resources/assets/js/main.js',
    //     'resources/assets/js/demos/demo-13.js',
    // ], 'public/js/app.js').version();

    