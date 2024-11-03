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
        sans: ["'Inter', sans-serif"],
        mono: ["monospace"],
        'primary': ["'Inter', sans-serif"],
      },
      colors: {
        brand: {
          100: '#0F172A',
          200: '#00DBC9',
          300: '#00C9B1',
          400: '#00B99E',
          500: '#00AA8B',
          600: '#00DCC8',
          'dark-blue': '#0F172A',
          'link-blue': '#00A5FD',
          'electric-blue': '#00A5FD',
        },
        neutral: {
          100: '#F3F4F6',
          200: '#E5E7EB',
          300: '#9CA3AF',
          500: '#6B7280',
          700: '#374151',
          900: '#111827',
        },
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
    // require('@tailwindcss/forms'),
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
