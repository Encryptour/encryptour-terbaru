import Image from "next/image";
import type { GalleryItem } from "@/lib/types";

/** The desktop tile shared by the home page and the gallery page. */
export default function GalleryCard({ item }: { item: GalleryItem }) {
  return (
    <>
      <div className="absolute inset-0">
        <Image src={item.img} alt={item.title} fill sizes="(min-width:1024px) 33vw, 100vw" quality={65} className="object-cover" />
        <div className="absolute inset-0 bg-black/40" />
      </div>
      <div className="absolute top-3 right-3 border border-vanilla/30 bg-chocolate/80 px-3 py-1 font-mono">
        <span className="text-[10px] tracking-widest text-vanilla uppercase">
          {item.category_name ?? "None"}
        </span>
      </div>
      <div className="absolute bottom-0 left-0 right-0 p-4">
        <div className="bg-chocolate/80 px-3 py-2">
          <h3 className="font-display text-lg font-bold text-vanilla">{item.title}</h3>
        </div>
        <p className="mt-2 font-mono text-xs leading-relaxed text-vanilla/80 line-clamp-3">{item.description}</p>
      </div>
    </>
  );
}
