const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
                playfair: ['Playfair Display'],
                marker: ['Permanent Marker']
            },
            backgroundImage: {
                'salt-banner': "url('/storage/Salt.jpg')"
            }
        },
    },

    plugins: [require('@tailwindcss/forms')],
};
