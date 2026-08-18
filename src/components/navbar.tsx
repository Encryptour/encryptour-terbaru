"use client";

import Image from "next/image";
import Link from "next/link";
import Icon from "./icons";
import { usePathname } from "next/navigation";
import { useEffect, useState } from "react";

const links = [
  { href: "/", label: "Home", icon: "home" },
  { href: "/identity", label: "Identity", icon: "info" },
  { href: "/biodata", label: "Biodata", icon: "users" },
  { href: "/gallery", label: "Gallery", icon: "image" },
];

export default function Navbar() {
  const pathname = usePathname();
  const [scrolled, setScrolled] = useState(false);

  useEffect(() => {
    const onScroll = () => setScrolled(window.scrollY > 40);
    onScroll();
    window.addEventListener("scroll", onScroll, { passive: true });
    return () => window.removeEventListener("scroll", onScroll);
  }, []);

  return (
    <>
      <Rail pathname={pathname} />
    <nav className="hidden lg:flex fixed inset-x-0 top-0 z-50 justify-center px-3 sm:px-4">
      <div
        className={`mt-3 w-full max-w-[1600px] origin-top rounded-full border border-vanilla/20 px-5 py-3 shadow-lg md:px-8 will-change-transform transition-[transform,background-color] duration-500 ease-[cubic-bezier(0.22,1,0.36,1)] ${
          scrolled ? "scale-[0.86] bg-mocca/60 backdrop-blur-md" : "scale-100 bg-mocca"
        }`}
      >
        <div className="flex items-center justify-between gap-4">
          <Link href="/" className="flex items-center gap-2 text-vanilla">
            <Image
              src="/assets/logo.webp"
              alt="Logo Encryptour"
              width={60}
              height={60}
              priority
              className="h-10 w-auto md:h-12"
            />
            <span
              className="hidden font-display text-xl font-bold tracking-tight sm:inline md:text-2xl"
            >
              ENCRYPTOUR
            </span>
          </Link>

          <div className="flex items-center gap-1 font-mono text-sm">
            {links.map((l) => (
              <Link
                key={l.href}
                href={l.href}
                className={`rounded-full px-4 py-2 tracking-tight text-vanilla transition-colors duration-200 hover:bg-chocolate ${
                  pathname === l.href ? "bg-chocolate/80" : ""
                }`}
              >
                <Icon name={l.icon} /> {l.label}
              </Link>
            ))}
          </div>
        </div>
      </div>
    </nav>
    </>
  );
}

/** Mobile + tablet: a floating vertical rail on the left, Linux-dock style. */
function Rail({ pathname }: { pathname: string }) {
  return (
    <nav className="lg:hidden fixed left-3 top-1/2 z-50 -translate-y-1/2">
      <div className="flex flex-col items-center gap-1 rounded-full border border-vanilla/20 bg-mocca/80 p-2 shadow-lg backdrop-blur-md">
        <Image
          src="/assets/logo.webp"
          alt="Logo Encryptour"
          width={40}
          height={40}
          priority
          className="mb-1 h-8 w-8 object-contain"
        />
        {links.map((l) => (
          <Link
            key={l.href}
            href={l.href}
            aria-label={l.label}
            title={l.label}
            className={`flex size-10 items-center justify-center rounded-full text-vanilla transition-colors ${
              pathname === l.href ? "bg-chocolate" : "hover:bg-chocolate/70"
            }`}
          >
            <Icon name={l.icon} className="size-5" />
          </Link>
        ))}
      </div>
    </nav>
  );
}
