import Image from "next/image";
import type { GalleryItem } from "@/lib/types";

/** The desktop tile shared by the home page and the gallery page. */
export default function GalleryCard({ item }: { item: GalleryItem }) {
  return (
    <>
      <div className="absolute inset-0">
        <Image src={item.img} alt={item.title} fill sizes="(min-width:1024px) 33vw, 100vw" className="object-cover" />
        <div className="absolute inset-0 bg-black/40" />
      </div>
      <div className="absolute top-3 right-3 backdrop-blur-md bg-chocolate/40 rounded-full px-3 py-1">
        <span className="text-xs text-white font-semibold uppercase">
          {item.category_name ?? "None"}
        </span>
      </div>
      <div className="absolute bottom-0 left-0 right-0 p-4">
        <div className="backdrop-blur-sm bg-mocca/40 rounded-lg px-3 py-2">
          <h3 className="text-lg font-bold text-white">{item.title}</h3>
        </div>
        <p className="text-white/90 text-sm mt-2 line-clamp-3">{item.description}</p>
      </div>
    </>
  );
}
