const mix = require('laravel-mix');

mix
    .options({
        terser: {
            extractComments: false,
        },
    })
    .js('resources/js/app.js', 'resources/dist');
