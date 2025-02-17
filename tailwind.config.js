const theme = require('./theme.json');
const tailpress = require("@jeffreyvr/tailwindcss-tailpress");

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './*.php',
        './**/*.php',
        './resources/css/*.css',
        './resources/js/*.js',
        './safelist.txt'
    ],
    theme: {
        container: {
            padding: {
                DEFAULT: '1rem',
                sm: '2rem',
                lg: '0rem'
            },
        },
        extend: {
            colors: tailpress.colorMapper(tailpress.theme('settings.color.palette', theme)),
            fontFamily: {
				// primary: ["'Poppins', sans-serif"],
			},
            fontSize: {
                'headline-h1': ['64px', '72px'],
                'headline-h2': ['48px', 1.1],
                'headline-h3': ['32px', 1.1],
                'headline-h4': ['24px', 1.1],
                'headline-h5': ['20px', 1.1],
                small: ['14px', '18px'],
            },
            spacing: {
				'4xl': '150px',
				'3xl': '120px',
				'2xl': '100px',
				'xl': '80px',
				'lg': '60px',
				'md': '40px',
				'sm': '30px',
				'xs': '20px',
				'xxs': '10px'
			},
        },
        screens: {
            'xs': '480px',
            'sm': '640px',
            'md': '768px',
            'lg': '1024px',
            'xl': '1280px',
            '2xl': '1440px',
            fhd: '1920px',
        }
    },
    plugins: [
        tailpress.tailwind
    ]
};
