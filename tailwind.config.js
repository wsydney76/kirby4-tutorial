/** @type {import('tailwindcss').Config} */

const colors = require('tailwindcss/colors')

export default {
  content: [
    './templates/**/*.twig',
  ],
  theme: {
    extend: {
      screens: {
        xl: '1200px',
      },
      colors: {
        // set a brand color
        brand: colors.slate,

        // set the global gray flavor
        gray: colors.slate,

        // let colors match the text of the text color of the typography plugin
        prose: colors.slate[900]
      },

      // make the list bullets a bit more visible
      // https://tailwindcss.com/docs/typography-plugin#adding-custom-color-themes
      typography: (theme) => ({
        slate: {
          css: {
            '--tw-prose-bullets': theme('colors.gray[400]'),
          }
        }
      }),
    },
    transitionDuration: {
      DEFAULT: '400ms',
    }
  },
  plugins: [
    require('@tailwindcss/typography'),
  ],

  safelist: [
    {
      pattern: /col-span-(1|2|3|4|5|6|7|8|9|10|11|12)/
    },
    'bg-layout-light',
    'bg-layout-dark',
  ]
}

