import defaultTheme from "tailwindcss/defaultTheme";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            colors: {
                primary: {
                    DEFAULT: "#0A84FF",
                    50: "#E6F3FF",
                    100: "#CCE7FF",
                    200: "#99CFFF",
                    300: "#66B7FF",
                    400: "#339FFF",
                    500: "#0A84FF",
                    600: "#0068CC",
                    700: "#004C99",
                    800: "#003366",
                    900: "#001933",
                    950: "#000F1F",
                },
                sidebar: {
                    DEFAULT: "var(--sidebar-background, #f8fafc)",
                    foreground: "var(--sidebar-foreground, #334155)",
                    primary: "var(--sidebar-primary, #0891b2)",
                    "primary-foreground":
                        "var(--sidebar-primary-foreground, #f8fafc)",
                    accent: "var(--sidebar-accent, #f1f5f9)",
                    "accent-foreground":
                        "var(--sidebar-accent-foreground, #0f172a)",
                    border: "var(--sidebar-border, #e2e8f0)",
                    ring: "var(--sidebar-ring, #94a3b8)",
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
                    "Mulish",
                    // "Inter",
					// "Poppins",
                    "ui-sans-serif",
                    "system-ui",
                    "-apple-system",
                    "BlinkMacSystemFont",
                    "Segoe UI",
                    "Roboto",
                    "Helvetica Neue",
                    "Arial",
                    "sans-serif",
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
        },
    },
    plugins: [],
};
