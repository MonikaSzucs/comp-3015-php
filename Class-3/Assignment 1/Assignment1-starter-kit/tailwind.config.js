/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./**/*.{html,js,php}"],
  theme: {
    container: {
      center: true,
      padding: '1rem',
    },
    extend: {
      fontFamily: {
        manrope: ['Manrope', 'sans-serif'],
      },
      colors: {
        transparent: 'transparent',
        current: 'currentColor',
        white: '#ffffff',
        black: '#010717',
        primary: '#800000',
        secondary: '#BA5858', 
        gray: {
          lighter: '#FAF7F3',
          light: '#323232', 
          dark: '#010717',    
          txt: '#4c4d56',
        },
      },
      backgroundImage: theme => ({
        'button-gradient': `linear-gradient(to right, ${theme('colors.primary')}, ${theme('colors.secondary')})`,
      }),
      gradientColorStops: theme => ({
        primary: theme('colors.primary'),
        secondary: theme('colors.secondary'),
      }),
    },
  },
  plugins: [require("daisyui")],
};