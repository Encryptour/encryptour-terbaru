"use client";

import Image from "next/image";
import { useCallback, useEffect, useRef, useState } from "react";
import type { CarouselItem } from "@/lib/types";

export default function HeroCarousel({ items }: { items: CarouselItem[] }) {
  const [index, setIndex] = useState(0);
  const timer = useRef<ReturnType<typeof setTimeout> | undefined>(undefined);
  const total = items.length;

  const go = useCallback((n: number) => setIndex(((n % total) + total) % total), [total]);

  useEffect(() => {
    if (total < 2) return;
    // First slide lingers 10s (it carries the welcome overlay), the rest 3s.
    timer.current = setTimeout(() => go(index + 1), index === 0 ? 10000 : 3000);
    return () => clearTimeout(timer.current);
  }, [index, total, go]);

  if (!total) return null;

  return (
    <div className="relative w-full h-[80vh] md:h-[70vh] overflow-hidden mt-14 md:mt-16">
      <div
        className="flex transition-transform duration-500 h-full"
        style={{ transform: `translateX(-${index * 100}%)` }}
      >
        {items.map((item, i) => (
          <div key={item.id} className="w-full h-full flex-shrink-0 relative snap-center">
            {i === 0 && (
              <div className="w-full h-full flex justify-center items-center bg-gradient-to-b absolute z-10 from-black/50 via-transparent to-black/30">
                <h1 className="text-2xl md:text-5xl drop-shadow-2xl rounded-xl bg-black/5 p-4 backdrop-blur-[1px] font-bold text-vanilla">
                  WELCOME TO OUR PAGE
                </h1>
              </div>
            )}
            <Image
              src={item.img}
              alt={`Slide ${i + 1}`}
              fill
              sizes="100vw"
              priority={i === 0}
              className="object-cover object-center"
            />
          </div>
        ))}
      </div>

      <button
        aria-label="Previous slide"
        onClick={() => go(index - 1)}
        className="absolute top-1/2 left-2 -translate-y-1/2 text-lg hover:text-2xl bg-black/10 hover:bg-black/30 transition-all backdrop-blur-sm text-white/50 w-[4vh] h-[4vh] rounded-full"
      >
        ˂
      </button>
      <button
        aria-label="Next slide"
        onClick={() => go(index + 1)}
        className="absolute top-1/2 right-2 -translate-y-1/2 text-lg hover:text-2xl bg-black/10 hover:bg-black/30 transition-all backdrop-blur-sm text-white/50 w-[4vh] h-[4vh] rounded-full"
      >
        ˃
      </button>

      <div className="absolute bottom-0 left-0 right-0 flex justify-center space-x-2 bg-gradient-to-t md:from-vanilla/80 from-vanilla w-full pb-12 pt-4">
        {items.map((item, i) => (
          <button
            key={item.id}
            aria-label={`Slide ${i + 1}`}
            onClick={() => go(i)}
            className={`shadow-xl h-2 rounded-full transition-all duration-500 ${
              i === index ? "w-10 bg-chocolate opacity-100" : "w-3 bg-vanilla opacity-50"
            }`}
          />
        ))}
      </div>
    </div>
  );
}
