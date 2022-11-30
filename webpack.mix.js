const mix = require("laravel-mix");

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
mix.js(
    "resources/assets/adminlte/js/AdminLTE.js",
    "public/admin-assets/js/adminlte.js"
)
    .sass(
        "resources/assets/adminlte/sass-ltr/adminlte.scss",
        "public/admin-assets/css/adminlte-ltr.min.css"
    )
    .options({
        processCssUrls: false,
    });
mix.sass(
    "resources/assets/adminlte/sass-rtl/adminlte.scss",
    "public/admin-assets/css/adminlte-rtl.min.css"
).options({
    processCssUrls: false,
});

mix.css(
    "resources/assets/adminlte/css/adminlte.min.css",
    "public/admin-assets/css/adminlte.min.css"
);

mix.copy(
    "node_modules/@fortawesome/fontawesome-free/webfonts",
    "public/admin-assets/webfonts"
);
mix.copy("node_modules/flag-icon-css/flags", "public/admin-assets/flags");
