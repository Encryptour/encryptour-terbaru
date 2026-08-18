"use client";

import dynamic from "next/dynamic";
import type { GalleryItem } from "@/lib/types";

// Client boundary so Swiper can be split out with ssr:false — it is only ever
// visible below the lg breakpoint, so it must not sit in the initial bundle.
const GallerySwiper = dynamic(() => import("./gallery-swiper"), { ssr: false });

export default function MobileGallery({ items }: { items: GalleryItem[] }) {
  return <GallerySwiper items={items} />;
}
