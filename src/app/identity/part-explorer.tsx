"use client";

import Image from "next/image";
import { useState } from "react";
import type { Part } from "./parts-data";

/**
 * One artwork stays on screen; picking a part fades its detail image over the
 * whole and swaps the explanation. No slide track — the subject never moves.
 */
export default function PartExplorer({
  parts,
  label,
  ratio = "1 / 1",
}: {
  parts: Part[];
  label: string;
  ratio?: string;
}) {
  const [i, setI] = useState(0);
  const part = parts[i];

  return (
    <div className="mx-auto max-w-5xl pl-24 pr-6 font-mono lg:px-6">
      <div className="grid gap-8 rounded-2xl border border-chocolate/20 bg-cards/40 p-6 md:grid-cols-[minmax(0,1fr)_minmax(0,1.1fr)] md:p-10">
        {/* Stage — every part is pre-normalised to one canvas, so switching
            parts never changes the artwork's size or position. */}
        <div className="relative mx-auto w-full max-w-sm" style={{ aspectRatio: ratio }}>
          <Image
            key={part.img}
            src={part.img}
            alt={part.title}
            fill
            sizes="(min-width:768px) 24rem, 80vw"
            priority
            className="animate-[fadeIn_.45s_ease-out] object-contain"
          />
        </div>

        {/* Legend */}
        <div className="flex flex-col">
          <p className="mb-4 text-xs tracking-[0.3em] text-mocca">
            &gt; {label}.parts[{String(i).padStart(2, "0")}]
          </p>

          <div className="mb-5 flex flex-wrap gap-2">
            {parts.map((p, n) => (
              <button
                key={p.title}
                onClick={() => setI(n)}
                aria-pressed={n === i}
                className={`border px-2.5 py-1 text-[10px] uppercase tracking-widest transition-colors ${
                  n === i
                    ? "border-chocolate bg-chocolate text-vanilla"
                    : "border-chocolate/30 text-chocolate/70 hover:border-chocolate"
                }`}
              >
                {String(n + 1).padStart(2, "0")}
              </button>
            ))}
          </div>

          <div key={part.title} className="animate-[fadeIn_.45s_ease-out]">
            <h3 className="font-display text-xl font-bold text-chocolate md:text-3xl">
              {part.title}
            </h3>
            <p className="mt-1 text-xs tracking-[0.2em] text-mocca">{part.tag}</p>
            <p className="mt-4 whitespace-pre-line text-sm leading-relaxed text-chocolate/80">
              {part.body}
            </p>
          </div>
        </div>
      </div>
    </div>
  );
}
