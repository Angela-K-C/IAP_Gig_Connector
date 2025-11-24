import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            colors: {
                primary: '#4F37AD', // Figma Primary/600
                accent: '#6449CC',  // Figma Button
                dark: '#374151',    // Figma Text
                warning: '#DE612E', // Figma Status Closed
                border: '#D6D6D6',  // Figma Input Border
                white: '#FFFFFF',
                gray50: '#F9FAFB',
                gray100: '#F3F4F6',
                gray200: '#E5E7EB',
                gray800: '#1F2937',
            },
            fontFamily: {
                sans: ['Figtree', 'Plus Jakarta Sans', ...defaultTheme.fontFamily.sans],
                serif: ['Quattrocento', ...defaultTheme.fontFamily.serif],
                roboto: ['Roboto', ...defaultTheme.fontFamily.sans],
            },
            fontWeight: {
                normal: '400',
                medium: '500',
                bold: '700',
                extrabold: '800',
            },
        },
    },

    plugins: [forms],
};
