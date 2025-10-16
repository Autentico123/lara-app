import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Inter", ...defaultTheme.fontFamily.sans],
            },
            colors: {
                "trade-blue": {
                    DEFAULT: "#3B82F6", // blue-500
                    light: "#DBEAFE", // blue-100
                    dark: "#1D4ED8", // blue-700
                },
                "trade-teal": {
                    DEFAULT: "#14B8A6", // teal-500
                    light: "#CCFBF1", // teal-100
                    dark: "#0D9488", // teal-600
                },
                "deal-orange": {
                    DEFAULT: "#F59E0B", // amber-500
                    light: "#FEF3C7", // amber-100
                    dark: "#D97706", // amber-600
                },
            },
            boxShadow: {
                card: "0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06)",
                "card-hover":
                    "0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05)",
            },
            transitionDuration: {
                400: "400ms",
            },
        },
    },

    plugins: [forms],
};
