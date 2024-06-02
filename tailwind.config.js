/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "index.html",
    "./node_modules/Al-Thaqlain International Recruitment Company/**/*.js",
    "careers.html",
  ],
  theme: {
    extend: {
      colors: {
        primary: {
          100: "#F9C8D7",
          400: "#E6376F",
          500: "#e42562",
          600: "#de1c58",
          700: "#c81950",
        },
      },
    },

    screens: {
      sm: "640px",
      md: "768px",
      lg: "1024px",
      xl: "1280px",
      "2xl": "1536px",
    },
  },
  plugins: [require("flowbite/plugin")],
};
