"use client";

import Image from "next/image";
import { Swiper, SwiperSlide } from "swiper/react";
import { Autoplay, EffectCoverflow } from "swiper/modules";
import type { GalleryItem } from "@/lib/types";
import "swiper/css";
import "swiper/css/effect-coverflow";

/** Mobile-only carousel. Rendered via next/dynamic so Swiper stays out of the
 *  initial bundle and never runs during SSR. */
export default function GallerySwiper({
  items,
  coverflow = false,
  onOpen,
}: {
  items: GalleryItem[];
  coverflow?: boolean;
  onOpen?: (item: GalleryItem) => void;
}) {
  return (
    <>
    <Swiper
      modules={[Autoplay, ...(coverflow ? [EffectCoverflow] : [])]}
      slidesPerView={1}
      spaceBetween={20}
      loop={items.length > 1}
      {...(coverflow
        ? {
            effect: "coverflow" as const,
            coverflowEffect: { rotate: 50, stretch: 0, depth: 100, modifier: 1, slideShadows: true },
            autoplay: { delay: 2000, disableOnInteraction: false },
          }
        : {})}
    >
      {items.map((item) => (
        <SwiperSlide key={item.id} className="relative">
          <div className="gallery-item relative overflow-hidden rounded-lg border border-chocolate/20 shadow-lg">
            <div className="absolute inset-0 flex flex-col justify-between p-4 z-10">
              <div>
                <span className="border border-vanilla/30 bg-chocolate/80 px-2 py-1 font-mono text-[10px] uppercase tracking-widest text-vanilla">
                  {item.category_name ?? "None"}
                </span>
                <h3 className="mt-2 font-display text-xl font-bold text-vanilla drop-shadow-lg">{item.title}</h3>
              </div>
              {onOpen && (
                <div className="flex justify-center mt-auto">
                  <button
                    onClick={() => onOpen(item)}
                    className="text-chocolate font-bold text-xl py-1 px-2 rounded mx-4 flex flex-col items-center"
                  >
                    <span className="text-lg">&#8593;</span> open
                  </button>
                </div>
              )}
            </div>
            <Image
              src={item.img}
              alt={item.title}
              width={800}
              height={500}
              className="swiper-image w-full"
            />
          </div>
        </SwiperSlide>
      ))}
    </Swiper>

      <p className="mt-4 flex items-center justify-center gap-2 font-mono text-xs tracking-[0.2em] text-chocolate/60">
        swipe
        <span className="inline-block animate-[nudge_1.4s_ease-in-out_infinite]">&rarr;</span>
      </p>
    </>
  );
}
