"use client";

import { useEffect } from "react";
import Lenis from "lenis";

declare global {
  // `window.lenis` is already claimed by the package's own types, so the shared
  // instance lives under its own key.
  interface Window {
    __lenis?: Lenis;
  }
}

/** Lenis smooth scrolling, mounted once at the app shell. */
export default function SmoothScroll() {
  useEffect(() => {
    if (window.matchMedia("(prefers-reduced-motion: reduce)").matches) return;
    const lenis = new Lenis({ duration: 1.1, smoothWheel: true });
    window.__lenis = lenis;
    let id = requestAnimationFrame(function raf(t: number) {
      lenis.raf(t);
      id = requestAnimationFrame(raf);
    });
    return () => {
      cancelAnimationFrame(id);
      lenis.destroy();
      window.__lenis = undefined;
    };
  }, []);

  return null;
}
