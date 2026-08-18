"use client";

import Image from "next/image";
import { useEffect, useState } from "react";
import type { CarouselItem } from "@/lib/types";

export default function HeroCarousel({ items }: { items: CarouselItem[] }) {
  const [index, setIndex] = useState(0);
  const total = items.length;

  useEffect(() => {
    if (total < 2) return;
    const t = setInterval(() => setIndex((i) => (i + 1) % total), 5000);
    return () => clearInterval(t);
  }, [total]);

  if (!total) return null;

  return (
    <div className="relative w-full h-[100svh] md:h-[92vh] overflow-hidden font-mono">
      {items.map((item, i) => {
        // Only the current/adjacent slides stay mounted — the rest never hit the network.
        const near = i === index || i === (index + 1) % total || i === (index - 1 + total) % total;
        if (!near) return null;
        return (
          <Image
          key={item.id}
          src={item.img}
          alt={`Slide ${i + 1}`}
          fill
          sizes="100vw"
            priority={i === 0}
            quality={70}
            className={`object-cover object-center transition-opacity duration-1000 ${
              i === index ? "opacity-100" : "opacity-0"
            }`}
          />
        );
      })}

      {/* Scrim: hard-stop gradient = blocky "pixel" steps instead of a smooth fade. */}
      <div
        className="absolute inset-0 z-10"
        style={{
          backgroundImage:
            "linear-gradient(to right, rgba(0,0,0,.85) 0 30%, rgba(0,0,0,.7) 30% 45%, rgba(0,0,0,.55) 45% 58%, rgba(0,0,0,.4) 58% 70%, rgba(0,0,0,.25) 70% 82%, rgba(0,0,0,.1) 82% 100%)",
        }}
      />
      {/* Checker dither over the step edges, sells the pixel look. */}
      <div
        className="absolute inset-0 z-10 opacity-40"
        style={{
          backgroundImage:
            "linear-gradient(45deg, rgba(0,0,0,.5) 25%, transparent 25% 75%, rgba(0,0,0,.5) 75%), linear-gradient(45deg, rgba(0,0,0,.5) 25%, transparent 25% 75%, rgba(0,0,0,.5) 75%)",
          backgroundSize: "12px 12px",
          backgroundPosition: "0 0, 6px 6px",
          maskImage: "linear-gradient(to right, black 20%, transparent 85%)",
          WebkitMaskImage: "linear-gradient(to right, black 20%, transparent 85%)",
        }}
      />

      <div className="absolute inset-0 z-20 flex flex-col justify-center gap-5 pl-24 pr-6 lg:px-20 [text-shadow:0_2px_12px_rgba(0,0,0,0.9)]">
        <p className="text-xs md:text-sm tracking-[0.3em] text-mocca">&gt; ENCRYPTOUR_2024</p>
        <h1 className="max-w-4xl text-2xl md:text-5xl font-bold leading-tight tracking-tight text-vanilla">
          Integrity, Unbreakable,
          <br />
          We Are Competent<span className="text-mocca">!!!</span>
        </h1>
        <p className="max-w-2xl text-xs md:text-sm leading-relaxed text-vanilla/70">
          Encryptour = <span className="text-vanilla">EN</span>gineers of{" "}
          <span className="text-vanilla">Compu</span>ter, <span className="text-vanilla">Y</span>oung
          Pioneers <span className="text-vanilla">T</span>wenty f<span className="text-vanilla">OUR</span>.
          Mahasiswa Teknik Komputer angkatan 2024.
        </p>
        <a
          href="#aboutUs"
          className="w-fit border border-chocolate bg-vanilla px-6 py-3 text-xs md:text-sm font-bold tracking-widest text-chocolate transition-colors duration-300 hover:bg-chocolate hover:text-vanilla"
        >
          CHECK US OUT
        </a>

        <div className="mt-6 flex gap-2">
        {items.map((item, i) => (
          <span
            key={item.id}
            className={`h-[3px] transition-all duration-500 ${
              i === index ? "w-8 bg-vanilla" : "w-3 bg-vanilla/40"
            }`}
          />
        ))}
        </div>
      </div>

      {/* Melts the hero into the vanilla page background. */}
      <div className="pointer-events-none absolute inset-x-0 bottom-0 z-10 h-40 bg-gradient-to-t from-vanilla via-vanilla/70 to-transparent" />

    </div>
  );
}
