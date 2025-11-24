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
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                primary: {
                    DEFAULT: '#6366f1', // indigo-500
                    light: '#818cf8',  // indigo-400
                    dark: '#4f46e5',   // indigo-600
                    hover: '#4338ca',  // indigo-700
                },
                secondary: {
                    DEFAULT: '#8b5cf6', // violet-500
                    light: '#a78bfa',  // violet-400
                    dark: '#7c3aed',   // violet-600
                    hover: '#6d28d9',  // violet-700
                },
                accent: {
                    DEFAULT: '#10b981', // green-500
                    light: '#6ee7b7',  // green-300
                    dark: '#047857',   // green-700
                },
                danger: {
                    DEFAULT: '#ef4444', // red-500
                    hover: '#dc2626',  // red-600
                },
                warning: {
                    DEFAULT: '#eab308', // yellow-500
                    hover: '#ca8a04',  // yellow-600
                },
                text: {
                    DEFAULT: '#1f2937', // gray-800
                    light: '#374151',  // gray-700
                    muted: '#6b7280',  // gray-500
                    onPrimary: '#fff',
                },
                background: {
                    DEFAULT: '#f9fafb', // gray-50
                    card: '#fff',
                    dark: '#1f2937',
                },
                border: {
                    DEFAULT: '#e5e7eb', // gray-200
                    dark: '#374151',
                },
            },
        },
    },

    plugins: [forms],
};
