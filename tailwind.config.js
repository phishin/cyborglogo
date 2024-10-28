module.exports = {
  future: {
    removeDeprecatedGapUtilities: true,
    purgeLayersByDefault: true,
  },
  content: [
    "./source/_assets/js/**/*.{js,vue}",
    "./source/_layouts/**/*.php",
    "./source/_modules/**/*.php",
    "./source/_nav/**/*.php",
    "./source/_components/**/*.php",
    "./source/index.blade.php",
    // Add more files to be watched here. See index.blade.php one line above for example
  ],
  theme: {
    extend: {
      fontFamily: {
        sans: ["Nunito Sans"],
        mono: ["monospace"],
        'primary': ["'Inter', sans-serif"],
      },
      colors: {
        brand: {
          100: '#0F172A',
          200: '#00C9B1',

          'dark-blue': '#0F172A',
        },
        'brand-grey': {
          // different shades of grey for the brand. 100 - 900, increment by 100
        },
        "primitive-off-white": '#d9d2be',
        'bind-blue': '#248dee',
      },
      maxWidth: {
        'mobile': '92.5%',
      },
      spacing: {
        "mobile": '92.5%',
      },
      boxShadow: {
        lg:
          "0 -1px 27px 0 rgba(0, 0, 0, 0.04), 0 4px 15px 0 rgba(0, 0, 0, 0.08)",
      },
    },
  },
  plugins: [
    require('@tailwindcss/typography'),
    require('@tailwindcss/forms'),
    function({ addUtilities }) {
      const newUtilities = {
        ".transition-fast": {
          transition: "all .2s ease-out",
        },
      };
      addUtilities(newUtilities);
    },
  ],
};
