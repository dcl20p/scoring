import defaultTheme from "tailwindcss/defaultTheme";
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
	darkMode: ["class"],
    safelist: [],
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/preline/dist/*.js"
    ],
    theme: {
        extend: {
            colors: {
                background: "hsl(var(--background) / <alpha-value>)",
                foreground: "hsl(var(--foreground) / <alpha-value>)",
                primary: {
                    DEFAULT: "hsl(var(--primary) / <alpha-value>)",
                    foreground:
                        "hsl(var(--primary-foreground) / <alpha-value>)",
                },
                secondary: {
                    DEFAULT: "hsl(var(--secondary) / <alpha-value>)",
                    foreground:
                        "hsl(var(--secondary-foreground) / <alpha-value>)",
                },
                muted: {
                    DEFAULT: "hsl(var(--muted) / <alpha-value>)",
                    foreground: "hsl(var(--muted-foreground) / <alpha-value>)",
                },
                accent: {
                    DEFAULT: "hsl(var(--accent) / <alpha-value>)",
                    foreground: "hsl(var(--accent-foreground) / <alpha-value>)",
                },
                destructive: {
                    DEFAULT: "hsl(var(--destructive) / <alpha-value>)",
                    foreground:
                        "hsl(var(--destructive-foreground) / <alpha-value>)",
                },
                card: {
                    DEFAULT: "hsl(var(--card) / <alpha-value>)",
                    foreground: "hsl(var(--card-foreground) / <alpha-value>)",
                },
                popover: {
                    DEFAULT: "hsl(var(--popover) / <alpha-value>)",
                    foreground:
                        "hsl(var(--popover-foreground) / <alpha-value>)",
                },
                border: "hsl(var(--border) / <alpha-value>)",
                input: "hsl(var(--input) / <alpha-value>)",
                ring: "hsl(var(--ring) / <alpha-value>)",
                sidebar: {
					DEFAULT: "hsl(var(--sidebar-background) / <alpha-value>)",
					foreground: "hsl(var(--sidebar-foreground) / <alpha-value>)",
					primary: "hsl(var(--sidebar-primary) / <alpha-value>)",
					'primary-foreground': "hsl(var(--sidebar-primary-foreground) / <alpha-value>)",
					accent: "hsl(var(--sidebar-accent) / <alpha-value>)",
					'accent-foreground': "hsl(var(--sidebar-accent-foreground) / <alpha-value>)",
					border: "hsl(var(--sidebar-border) / <alpha-value>)",
					ring: "hsl(var(--sidebar-ring) / <alpha-value>)"
                },
                brand: {
                    blue: "#0A84FF",
                    lightBlue: "#5AC8FA",
                    gray: "#8E8E93",
                    lightGray: "#F5F7FA",
                    darkGray: "#333333",
                },
            },
            fontFamily: {
                sans: [
					"Mulish", ...defaultTheme.fontFamily.sans
                ],
            },
            keyframes: {
                "fade-in": {
                    "0%": { opacity: "0" },
                    "100%": { opacity: "1" },
                },
                "slide-up": {
                    "0%": { transform: "translateY(10px)", opacity: "0" },
                    "100%": { transform: "translateY(0)", opacity: "1" },
                },
                "slide-in-right": {
                    "0%": { transform: "translateX(10px)", opacity: "0" },
                    "100%": { transform: "translateX(0)", opacity: "1" },
                },
            },
            animation: {
                "fade-in": "fade-in 0.5s ease-out",
                "slide-up": "slide-up 0.5s ease-out",
                "slide-in-right": "slide-in-right 0.3s ease-out",
            },
            boxShadow: {
                glass: "0 4px 30px rgba(0, 0, 0, 0.1)",
                subtle: "0 1px 3px rgba(0, 0, 0, 0.05), 0 1px 2px rgba(0, 0, 0, 0.1)",
            },
            backdropBlur: {
                xs: "2px",
            },
            borderRadius: {
                lg: "var(--radius)",
                md: "calc(var(--radius) - 2px)",
                sm: "calc(var(--radius) - 4px)",
            },
        },
    },
    plugins: [
        forms, 
        require("tailwindcss-animate"),
    ],
};
