import type { Metadata } from "next";
import { Montserrat, JetBrains_Mono, Space_Grotesk } from "next/font/google";
import { Analytics } from "@vercel/analytics/react";
import "./globals.css";

const montserrat = Montserrat({ subsets: ["latin"], variable: "--font-montserrat" });
const mono = JetBrains_Mono({ subsets: ["latin"], variable: "--font-mono" });
const display = Space_Grotesk({ subsets: ["latin"], variable: "--font-display" });

export const metadata: Metadata = {
  title: "ENCRYPTOUR",
  icons: { icon: "/assets/favicon-logo.png" },
};

export default function RootLayout({ children }: { children: React.ReactNode }) {
  return (
    <html lang="id" className={`${montserrat.variable} ${mono.variable} ${display.variable}`}>
      <body className="overflow-x-hidden font-montserrat bg-vanilla">
        {children}
        <Analytics />
      </body>
    </html>
  );
}
