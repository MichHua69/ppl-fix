/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./node_modules/flowbite/**/*.js",
    './node_modules/preline/dist/*.js',
  ],
  theme: {
    extend: {
      colors : {
        'primary' : '#538D22' ,
        'primary-light' : '#69CF3A',
        'secondary' : '#FFFFFF',
        'danger' : '#FF204E',
      },
    },
  },
  plugins: [
    require('flowbite/plugin'),
    require('preline/plugin'),
  ],
}