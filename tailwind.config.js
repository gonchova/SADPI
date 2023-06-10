const colors = require('tailwindcss/colors');

module.exports = {
  content: [
    "./src/**/*.{html,js}",
    "./resources/**/*.blade.php",
    "./resources/views/auth/login.blade.php",
    "./resources/views/auth/register.blade.php",
    "./resources/views/components/*.blade.php",
    "./resources/views/actividades/*.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./resources/**",
    "./node_modules/flowbite/**/*.js"
  ],
  darkMode: false,
  theme: {
    extend: { ...colors,
      colors: {
      },
    }
  },
  variants: {
    extend: {},
  },
  plugins: [
    require('flowbite/plugin')
]
}