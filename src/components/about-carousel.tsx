"use client";

import Image from "next/image";
import { useCallback, useEffect, useState } from "react";

// Was a hardcoded $aboutSlides array inside home.blade.php.
const slides = [
  { key: "init", content: "About Us" },
  {
    key: "acronym",
    content:
      "ENCRYPTOUR (enkriptour) memiliki akronim yaitu ENgineers of Computer, Young Pioneers Twenty fOUR.",
  },
  { key: "encrypt", content: "Diambil dari kata “enkripsi” yang artinya melindungi suatu data." },
  {
    key: "pioneer",
    content:
      "Young Pioneer maksudnya adalah kami penggerak muda dari Teknik Komputer angkatan 2024.",
  },
  {
    key: "duty",
    content:
      "Kami sebagai angkatan memiliki keharusan dan tanggung jawab dalam saling melindungi satu sama lain.",
  },
] as const;

const Arrow = ({ dir }: { dir: "left" | "right" }) => (
  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth={2} className="size-5">
    <path
      strokeLinecap="round"
      strokeLinejoin="round"
      d={dir === "left" ? "M15 5l-7 7 7 7" : "M9 5l7 7-7 7"}
    />
  </svg>
);

export default function AboutCarousel() {
  const [index, setIndex] = useState(0);
  const [paused, setPaused] = useState(false);
  const go = useCallback(
    (n: number) => setIndex(((n % slides.length) + slides.length) % slides.length),
    [],
  );

  useEffect(() => {
    if (paused) return;
    const t = setInterval(() => setIndex((i) => (i + 1) % slides.length), 6000);
    return () => clearInterval(t);
  }, [paused]);

  return (
    <div
      className="w-full pl-24 pr-4 lg:px-4 py-16 md:py-24 font-mono text-chocolate"
      onMouseEnter={() => setPaused(true)}
      onMouseLeave={() => setPaused(false)}
    >
      <div className="mx-auto max-w-5xl overflow-hidden rounded-2xl border border-chocolate/20 bg-cards/40 shadow-xl shadow-chocolate/10">
        {/* Editor chrome */}
        <div className="flex items-center gap-2 border-b border-chocolate/15 bg-chocolate/5 px-4 py-3">
          <span className="size-3 rounded-full bg-chocolate/60" />
          <span className="size-3 rounded-full bg-mocca/70" />
          <span className="size-3 rounded-full bg-chocolate/25" />
          <span className="ml-3 text-xs tracking-widest text-chocolate/60">
            about-us.md — {String(index + 1).padStart(2, "0")}/
            {String(slides.length).padStart(2, "0")}
          </span>
        </div>

        <div className="grid items-center gap-8 p-8 md:grid-cols-[auto_1fr] md:p-12">
          <Image
            src="/assets/logo.webp"
            alt="Logo Encryptour"
            width={200}
            height={200}
            className="mx-auto h-24 w-auto md:h-40"
          />

          <div className="min-h-[9rem] md:min-h-[8rem]">
            <p className="mb-3 text-xs tracking-[0.3em] text-mocca">
              &gt; {slides[index].key.toUpperCase()}
            </p>
            {/* key forces a remount so each slide fades in on change */}
            <p
              key={slides[index].key}
              className="animate-[fadeIn_.4s_ease-out] text-lg leading-relaxed md:text-2xl"
            >
              {index === 0 ? (
                <span className="font-display text-3xl font-bold md:text-5xl">
                  {slides[index].content}
                </span>
              ) : (
                slides[index].content
              )}
            </p>
          </div>
        </div>

        {/* Controls */}
        <div className="flex items-center justify-between gap-4 border-t border-chocolate/15 px-4 py-4 md:px-6">
          <div className="flex min-w-0 flex-1 gap-1.5 md:gap-2">
            {slides.map((s, i) => (
              <button
                key={s.key}
                aria-label={`Slide ${i + 1}`}
                onClick={() => go(i)}
                className={`h-1 shrink transition-all duration-300 ${
                  i === index ? "w-8 bg-chocolate" : "w-4 bg-chocolate/25 hover:bg-chocolate/50"
                }`}
              />
            ))}
          </div>
          <div className="flex shrink-0 gap-2">
            <button
              aria-label="Previous slide"
              onClick={() => go(index - 1)}
              className="rounded-full border border-chocolate/30 p-2 transition-colors hover:bg-chocolate hover:text-vanilla"
            >
              <Arrow dir="left" />
            </button>
            <button
              aria-label="Next slide"
              onClick={() => go(index + 1)}
              className="rounded-full border border-chocolate/30 p-2 transition-colors hover:bg-chocolate hover:text-vanilla"
            >
              <Arrow dir="right" />
            </button>
          </div>
        </div>
      </div>
    </div>
  );
}
