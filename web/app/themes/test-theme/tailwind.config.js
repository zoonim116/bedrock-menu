/** @type {import('tailwindcss').Config} config */
const config = {
  content: ['./app/**/*.php', './resources/**/*.{php,vue,js}'],
  theme: {
    screens: {
      sm: "340px",
      md: "540px",
      lg: "768px",
      xl: "1240px"
    },
    borderRadius: {
      DEFAULT: '3px',
      md: '5px'
    },
    fontSize: {
      base: '15px'
    },
    fontFamily: {
      Montserrat: ["Montserrat", "serif"]
    },
    container: {
      center: true,
    },
    extend: {
      colors: {}, // Extend Tailwind's default colors
    },
  },
  plugins: [],
};

export default config;
