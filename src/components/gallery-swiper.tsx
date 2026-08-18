"use client";

import Image from "next/image";
import { Swiper, SwiperSlide } from "swiper/react";
import { Autoplay, EffectCoverflow, Navigation } from "swiper/modules";
import type { GalleryItem } from "@/lib/types";
import "swiper/css";
import "swiper/css/navigation";
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
    <Swiper
      modules={[Navigation, Autoplay, ...(coverflow ? [EffectCoverflow] : [])]}
      slidesPerView={1}
      spaceBetween={20}
      loop={items.length > 1}
      navigation
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
          <div className="gallery-item bg-cards/20 rounded-lg shadow-lg overflow-hidden relative">
            <div className="absolute inset-0 flex flex-col justify-between p-4 z-10">
              <div>
                <span className="text-sm bg-mocca text-chocolate py-1 px-2 rounded-full font-semibold uppercase">
                  {item.category_name ?? "None"}
                </span>
                <h3 className="text-xl font-bold mt-2 text-white">{item.title}</h3>
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
  );
}
