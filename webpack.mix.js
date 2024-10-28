const mix = require('laravel-mix');
require('laravel-mix-jigsaw');
require('mix-tailwindcss');

mix.disableSuccessNotifications();
mix.setPublicPath('source/assets/build/');

mix.jigsaw()
    .js('source/_assets/js/main.js', 'js').vue()
    .sass('source/_assets/sass/main.scss', 'css/main.css', )
    .tailwind()
    .options({ processCssUrls: false })
    .browserSync({
        server: 'build_local',
        files: ['build_local/**'],
    })
    .version();