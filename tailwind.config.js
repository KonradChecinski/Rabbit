const theme = require("./theme.json");
const tailpress = require("@jeffreyvr/tailwindcss-tailpress");

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./*.php",
        "./**/*.php",
        "./resources/css/*.css",
        "./resources/js/*.js",
        "./safelist.txt",
    ],
    theme: {
        container: {
            padding: {
                DEFAULT: "1rem",
                sm: "2rem",
                lg: "0rem",
            },
        },
        borderRadius: {
            none: "0",
            sm: "0.125rem",
            DEFAULT: "0.25rem",
            md: "0.375rem",
            lg: "0.5rem",
            full: "9999px",
            logo: "5rem",
        },
        extend: {
            colors: {
                ...tailpress.colorMapper(
                    tailpress.theme("settings.color.palette", theme)
                ),
                rabbit1: "#01c1f3",
                rabbit2: "#005dac",
                rabbit3: "#d4effc",
                rabbit4: "#00a3e5",
            },
            fontSize: {
                ...tailpress.fontSizeMapper(
                    tailpress.theme("settings.typography.fontSizes", theme)
                ),
            },
            fontFamily: {
                verdana: ["verdana", "sans-serif"],
            },
        },
        screens: {
            xs: "480px",
            sm: "600px",
            md: "782px",
            lg: tailpress.theme("settings.layout.contentSize", theme),
            xl: tailpress.theme("settings.layout.wideSize", theme),
            "2xl": "1440px",
        },
    },
    plugins: [tailpress.tailwind],
};
