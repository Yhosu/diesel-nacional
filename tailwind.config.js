import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    theme: {
        colors: {
            primary: 'var(--primary-color)',
            secondary: 'var(--secondary-color)',
            tertiary: 'var(--tertiary-color)',
        },
        fontFamily: {
            'sans': ['var(--font-text)', ...defaultTheme.fontFamily.sans],
        },
        screens: {
            'tl': '992px',
            // => @media (min-width: 992px) { ... }
            'xs': '576px',
            // => @media (min-width: 576px) { ... }
        },
    },
    plugins: [],
};
