const elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');

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

elixir(mix => {
    mix.styles([
        "bootstrap.css",
        "font-awesome.css",
        "style.css",
    ],'public/assets/css/app.css').scripts([
        'jquery.min.js',
        'bootstrap.js',
    ],'public/assets/js/all.js');
});
