/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      fontFamily:{
        'headings':['Niramit', 'Karla', 'Mulish', 'system-ui', '-apple-system', 'ui-sans-serif'],
        'body':['"Noto Sans"', 'Roboto', 'system-ui', '-apple-system', 'ui-sans-serif'],
      }
    },
  },
  plugins: [
    require('@tailwindcss/forms'),
  ],
}

