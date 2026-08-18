"use client";

import Image from "next/image";
import { useState } from "react";

// Was a hardcoded $aboutSlides array inside home.blade.php.
const slides = [
  { type: "title", content: "About Us" },
  {
    type: "text",
    content:
      "ENCRYPTOUR (enkriptour) memiliki akronim yaitu ENgineers of Computer, Young Pioneers Twenty fOUR.",
  },
  { type: "text", content: "Diambil dari kata “enkripsi” yang artinya melindungi suatu data." },
  {
    type: "text",
    content:
      "Young Pioneer maksudnya adalah kami penggerak muda dari Teknik Komputer angkatan 2024.",
  },
  {
    type: "text",
    content:
      "Kami sebagai angkatan memiliki keharusan dan tanggung jawab dalam saling melindungi satu sama lain.",
  },
] as const;

export default function AboutCarousel() {
  const [index, setIndex] = useState(0);
  const go = (n: number) => setIndex(((n % slides.length) + slides.length) % slides.length);

  return (
    <div className="relative w-full h-[80vh] md:h-[70vh] flex justify-center items-center mt-14 md:mt-16">
      <div className="relative w-[90vw] lg:w-[65vw] xl:w-[80vw] h-[60vh] shadow-2xl shadow-chocolate bg-mocca bg-opacity-10 rounded-3xl p-6 xl:px-24 flex flex-col justify-center items-center text-chocolate overflow-hidden">
        <div className="relative w-full h-[300px] overflow-hidden">
          <div
            className="flex transition-transform duration-500 w-full h-full items-center"
            style={{ transform: `translateX(-${index * 100}%)` }}
          >
            {slides.map((slide) => (
              <div
                key={slide.content}
                className="min-w-full flex flex-col items-center justify-center text-center px-10"
              >
                {slide.type === "title" ? (
                  <>
                    <Image
                      src="/assets/Logo Encryptour.png"
                      alt="logo"
                      width={250}
                      height={250}
                      className="w-auto h-[100px] md:h-[200px] xl:h-[250px]"
                    />
                    <h2 className="text-2xl md:text-3xl font-bold">{slide.content}</h2>
                  </>
                ) : (
                  <p className="text-base md:text-2xl">{slide.content}</p>
                )}
              </div>
            ))}
          </div>
        </div>

        <div className="absolute bottom-4 flex space-x-2">
          {slides.map((slide, i) => (
            <button
              key={slide.content}
              aria-label={`Slide ${i + 1}`}
              onClick={() => go(i)}
              className={`h-3 rounded-full bg-chocolate transition-all ${
                i === index ? "w-6 opacity-100" : "w-3 opacity-40"
              }`}
            />
          ))}
        </div>
      </div>

      <button
        aria-label="Previous"
        onClick={() => go(index - 1)}
        className="absolute left-4 top-1/2 -translate-y-1/2 text-lg hover:text-2xl bg-black/10 hover:bg-black/30 transition-all text-white/70 w-[4vh] h-[4vh] rounded-full flex items-center justify-center"
      >
        ˂
      </button>
      <button
        aria-label="Next"
        onClick={() => go(index + 1)}
        className="absolute right-4 top-1/2 -translate-y-1/2 text-lg hover:text-2xl bg-black/10 hover:bg-black/30 transition-all text-white/70 w-[4vh] h-[4vh] rounded-full flex items-center justify-center"
      >
        ˃
      </button>
    </div>
  );
}
