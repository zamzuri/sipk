var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.sass('app.scss')

	mix.copy('node_modules/sweetalert/dist/sweetalert.css','public/sweetalert/dist/')
    mix.copy('node_modules/sweetalert/dist/sweetalert.min.js','public/sweetalert/dist/')
    
    mix.copy('node_modules/selectize/dist/css/selectize.bootstrap3.css','public/selectize/dist/css/')
    mix.copy('node_modules/selectize/dist/js/standalone/selectize.min.js','public/selectize/dist/js/standalone/')
    mix.copy('node_modules/highcharts/highcharts.js','public/highcharts/')
    mix.copy('node_modules/chart.js/dist/Chart.js','public/chartjs/')
});
