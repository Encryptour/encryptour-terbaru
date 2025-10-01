/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            colors: {
                chocolate: "#66391C",
                vanilla: "#F9ECDC",
                mocca: "#AD7D4F",
                white: "#FFFFFF",
                black: "#000000",
                cards: "#F2E5BF",
            },
            fontFamily: {
                montserrat: ["Montserrat"],
            },
            gradientColorStopPositions: {
                65: "65%",
            },
            keyframes: {
                float: {
                    "0%, 100%": { transform: "translateY(0)" },
                    "50%": { transform: "translateY(-5px)" },
                },
                "spin-reverse": {
                    from: { transform: "rotate(360deg)" },
                    to: { transform: "rotate(0deg)" },
                },
                floatglow: {
                    "0%, 100%": {
                        transform: "translateY(0)",
                        textShadow:
                            "0 0 5px #66391C, 0 0 10px #AD7D4F, 0 0 20px #F9ECDC",
                        color: "#fff",
                    },
                    "50%": {
                        transform: "translateY(-6px)",
                        textShadow:
                            "0 0 5px #AD7D4F, 0 0 10px #F9ECDC, 0 0 20px #66391C",
                        color: "#fff",
                    },
                },
            },
            animation: {
                "spin-slow": "spin 3s linear infinite",
                "spin-reverse": "spin-reverse 2s linear infinite",
                float: "float 2s ease-in-out infinite",
                floatglow: "floatglow 3s ease-in-out infinite",
            },
        },
    },
    plugins: [
        function ({ addUtilities }) {
            addUtilities({
                ".spin-reverse": {
                    animation: "spin-reverse 2s linear infinite",
                },
            });
        },
    ],
};
