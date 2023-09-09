/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/views/*.blade.php",
    "./resources/components/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./node_modules/flowbite/**/*.js"
  ],
  theme: {
    extend: {},
  },
  plugins: ['flowbite/plugin'],
}

