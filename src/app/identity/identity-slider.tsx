"use client";

import { useState } from "react";

/**
 * Replaces public/slider/script.js. Reuses the existing styles.css class names,
 * so `variant` picks between the logo slider ("") and the mascot slider ("-v2").
 */
export default function IdentitySlider({
  variant = "",
  slides,
}: {
  variant?: "" | "-v2";
  slides: React.ReactNode[];
}) {
  const [index, setIndex] = useState(0);
  const go = (n: number) => setIndex(((n % slides.length) + slides.length) % slides.length);

  return (
    <div className={`slider-container${variant}`}>
      <div
        id={`slider${variant}`}
        style={{ transform: `translateX(-${index * 100}%)` }}
      >
        {slides.map((slide, i) => (
          <div key={i} className={`slide${variant} gap-1 md:gap-5`}>
            {slide}
          </div>
        ))}
      </div>

      <button className={`nav-button${variant} prev${variant}`} aria-label="Previous" onClick={() => go(index - 1)}>
        &lt;
      </button>
      <button className={`nav-button${variant} next${variant}`} aria-label="Next" onClick={() => go(index + 1)}>
        &gt;
      </button>

      <div className={`indicators${variant}`}>
        {slides.map((_, i) => (
          <div
            key={i}
            onClick={() => go(i)}
            className={`slider-indicator${variant} ${i === index ? "active" : ""}`}
          />
        ))}
      </div>
    </div>
  );
}
