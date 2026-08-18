import type { Metadata } from "next";
import { Montserrat } from "next/font/google";
import { Analytics } from "@vercel/analytics/react";
import "./globals.css";

const montserrat = Montserrat({ subsets: ["latin"], variable: "--font-montserrat" });

export const metadata: Metadata = {
  title: "ENCRYPTOUR",
  icons: { icon: "/assets/Logo Encryptour.png" },
};

export default function RootLayout({ children }: { children: React.ReactNode }) {
  return (
    <html lang="id" className={`scroll-smooth ${montserrat.variable}`}>
      <head>
        {/* Font Awesome 4 — the Blade markup uses `fa fa-*` icon classes throughout. */}
        <link
          rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
        />
      </head>
      <body className="font-montserrat bg-vanilla">
        {children}
        <Analytics />
      </body>
    </html>
  );
}
