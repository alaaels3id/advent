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

mix.js([
	'resources/assets/js/app.js',
	'resources/assets/js/bootstrap.js',
	], 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css');

mix.styles([
    'resources/assets/css/bootstrap.min.css',
	'resources/assets/css/animate.css',
	'resources/assets/css/hamburgers.min.css',
	'resources/assets/css/animsition.min.css',
	'resources/assets/css/select2.min.css',
	'resources/assets/css/daterangepicker.css',
	'resources/assets/css/slick.css',
	'resources/assets/css/hover.css',
	'resources/assets/css/magnific-popup.css',
	'resources/assets/css/perfect-scrollbar.css',
	'resources/assets/css/util.css',
	'resources/assets/css/main.css',
], 'public/css/cozastore.css');
