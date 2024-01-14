/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./site/**/*.php",
    "./templates/**/*.twig",
  ],
  theme: {
    extend: {
      aspectRatio: {
        '1/1': "1/1",
        '16/9': "16/9",
        '10/8': "10/8",
        '21/9': "21/9",
        '7/5': "7/5",
        '4/3': "4/3",
        '5/3': "5/3",
        '3/2': "3/2",
        '3/1': "3/1",
      },
    },
  },
  plugins: [
    require('@tailwindcss/typography'),
  ],

  /* Safe list dynamically calculated col-spans for layout field, aspect ratio for image block */
  safelist: [
    'col-span-1',
    'col-span-2',
    'col-span-3',
    'col-span-4',
    'col-span-5',
    'col-span-6',
    'col-span-7',
    'col-span-8',
    'col-span-9',
    'col-span-10',
    'col-span-11',
    'col-span-12',
    'aspect-1/1',
    'aspect-16/9',
    'aspect-10/8',
    'aspect-21/9',
    'aspect-7/5',
    'aspect-4/3',
    'aspect-5/3',
    'aspect-3/2',
    'aspect-3/1',
    'bg-layout-light',
    'bg-layout-dark',
  ]
}
