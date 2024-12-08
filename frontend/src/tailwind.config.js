/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./**/*.{php,js,html}"],
  theme: {
    colors: {
      "white": "#fff",
      "red": "#FF0000",
      "lightgray": "#BFBFBF",
      "gray": "#9E9E9E",
      "darkgray": "#696A68",
    },
    fontFamily: {
      'montserrat': ['Montserrat', 'Arial', 'sans-serif'],
    },
    extend: {
      aspectRatio: {
        '1/2': '1 / 2',
      },
    },
  },
  plugins: [],
}

