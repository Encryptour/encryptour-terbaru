"use client";

import Image from "next/image";
import Link from "next/link";
import { usePathname } from "next/navigation";
import { useState } from "react";

const links = [
  { href: "/", label: "Home", icon: "fa-home" },
  { href: "/identity", label: "Identity", icon: "fa-info-circle" },
  { href: "/biodata", label: "Biodata", icon: "fa-users" },
  { href: "/gallery", label: "Gallery", icon: "fa-picture-o" },
];

export default function Navbar() {
  const pathname = usePathname();
  const [open, setOpen] = useState(false);

  return (
    <nav className="sticky z-50">
      <div className="max-w-full px-2 sm:px-4 lg:px-8 bg-mocca items-center fixed top-0 left-0 w-full shadow-md p-2 md:p-4 z-10 drop-shadow-xl">
        <div className="flex items-center justify-between h-10">
          <Link href="/" className="flex items-center gap-2 text-2xl font-bold text-vanilla">
            <Image
              src="/assets/Logo Encryptour.png"
              alt="Logo Encryptour"
              width={60}
              height={60}
              priority
              className="h-10 w-auto md:h-14"
            />
            <span className="hidden sm:inline">ENCRYPTOUR</span>
          </Link>

          <div className="hidden sm:flex sm:ml-auto lg:mr-4 font-semibold">
            <div className="flex space-x-10 items-center transition-all">
              {links.map((l) => (
                <Link
                  key={l.href}
                  href={l.href}
                  className={`${pathname === l.href ? "underline underline-offset-4 animate-floatglow" : ""} rounded-md px-3 py-2 text-md font-semibold text-vanilla hover:bg-chocolate transition-all duration-300 transform hover:scale-105 hover:-translate-y-1`}
                >
                  <i className={`fa ${l.icon}`} /> {l.label}
                </Link>
              ))}
            </div>
          </div>

          <div className="sm:hidden">
            <button
              type="button"
              aria-label="Open main menu"
              aria-expanded={open}
              onClick={() => setOpen((v) => !v)}
              className="relative transition-all duration-300 inline-flex items-center justify-center rounded-md p-2 text-vanilla focus:outline-none focus:ring-2 focus:ring-inset focus:ring-vanilla"
            >
              <svg className="size-6" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor">
                <path
                  strokeLinecap="round"
                  strokeLinejoin="round"
                  d={open ? "M6 18 18 6M6 6l12 12" : "M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"}
                />
              </svg>
            </button>
          </div>
        </div>
      </div>

      {/* Mobile drawer */}
      <div
        onClick={(e) => e.target === e.currentTarget && setOpen(false)}
        className={`sm:hidden w-full h-full fixed flex justify-end z-40 mt-12 ${open ? "" : "hidden"}`}
      >
        <div
          className={`space-y-1 bg-mocca px-4 pb-6 pt-4 w-2/3 h-full shadow-lg transition-all duration-300 ${
            open ? "opacity-100 translate-x-0" : "opacity-0 translate-x-full"
          }`}
        >
          {links.map((l) => (
            <Link
              key={l.href}
              href={l.href}
              onClick={() => setOpen(false)}
              className="block rounded-md px-3 py-2 text-base font-semibold text-vanilla hover:bg-chocolate"
            >
              <i className={`fa ${l.icon}`} /> {l.label}
            </Link>
          ))}
        </div>
      </div>
    </nav>
  );
}
