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
                'source': ['Source Code Pro'],
                'qs': ['Quicksand']
            },
            colors: {
                primary: '#7895B2',
                lightblue: '#AEBDCA',
                secondary: '#F5EFE6',
                darkwhite: '#E8DFCA'
                // secondary: '#F5EFE6',
                // darkprimary: '#435c75'
            }
        },
    },

    plugins: [require('@tailwindcss/forms')],
};
