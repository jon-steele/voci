const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Source Code Pro', ...defaultTheme.fontFamily.sans]
            },
            colors: {
                primary: '#7895B2',
                secondary: '#F5EFE6',
                darkprimary: '#435c75'
            }
        },
    },

    plugins: [require('@tailwindcss/forms')],
};
