let mix = require("laravel-mix");
let path = require("path");

mix.setResourceRoot("../");
mix.setPublicPath(path.resolve("./"));

// const domain = "rabbit.test"; // <= EDIT THIS
// const homedir = require("os").homedir();

mix.webpackConfig({
    watchOptions: {
        ignored: [
            path.posix.resolve(__dirname, "./node_modules"),
            path.posix.resolve(__dirname, "./css"),
            path.posix.resolve(__dirname, "./js"),
        ],
    },
});

mix.js("resources/js/app.js", "js");
mix.js("resources/js/media-uploader.js", "js");

mix.postCss("resources/css/app.css", "css");

mix.postCss("resources/css/editor-style.css", "css");

// mix.browserSync({
//     // proxy: "https://rabbit.test",
//     // host: "rabbit.test",
//     // open: "external",
//     // port: 8000,
//     proxy: "https://" + domain,
//     host: domain,
//     port: 443,
//     open: "external",
//     https: {
//         key: homedir + "/.config/valet/Certificates/" + domain + ".key",
//         cert: homedir + "/.config/valet/Certificates/" + domain + ".crt",
//     },
//     notify: false, //Enable or disable notifications
// });
mix.disableSuccessNotifications();

if (mix.inProduction()) {
    mix.version();
} else {
    mix.options({ manifest: false });
}
