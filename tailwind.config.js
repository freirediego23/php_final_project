/** @type {import('tailwindcss').Config} */
//const colors = require("tailwindcss/colors");
//Views contains all the pages that use TAILWIND
module.exports = {
  content: ["./views/**/*", "./src/**/*.{php,html,js}"],
  darkMode: "class",
  theme: {
    extend: {
      colors: {
        cola: "#fff5d2",
      },
    },
  },
  plugins: [],
};
