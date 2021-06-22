module.exports = {
    purge: ['./index.html', './src/**/*.{vue,js,ts,jsx,tsx}'],
    darkMode: false, // or 'media' or 'class'
    theme: {
        fontFamily: {
            'pop': ['Poppins'],
            'benne': ['Benne'],
            'play': ['Playfair Display', 'serif']
        }
    },
    variants: {
        extend: {},
    },
    plugins: [],
}
