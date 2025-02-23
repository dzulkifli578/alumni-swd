import defaultTheme from "tailwindcss/defaultTheme";

/** @type {import('tailwindcss').Config} */
export default {
    content: ["./resources/views/**/*.blade.php"],
    theme: {
        extend: {
            fontFamily: {
                body: ["Inter", "sans-serif"],
            },
        },
    },
    plugins: [require("daisyui")],
    daisyui: {
        themes: ["dark"],
    },
};
