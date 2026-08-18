"use client";

import Image from "next/image";
import dynamic from "next/dynamic";
import { useEffect, useState } from "react";
import GalleryCard from "@/components/gallery-card";
import type { Category, GalleryItem } from "@/lib/types";

const GallerySwiper = dynamic(() => import("@/components/gallery-swiper"), { ssr: false });

const slug = (s: string) =>
  s.toLowerCase().trim().replace(/[^a-z0-9]+/g, "-").replace(/^-|-$/g, "");

export default function GalleryView({
  items,
  categories,
}: {
  items: GalleryItem[];
  categories: Category[];
}) {
  const [active, setActive] = useState("all");
  const [open, setOpen] = useState<GalleryItem | null>(null);

  useEffect(() => {
    if (!open) return;
    const onKey = (e: KeyboardEvent) => e.key === "Escape" && setOpen(null);
    document.addEventListener("keydown", onKey);
    return () => document.removeEventListener("keydown", onKey);
  }, [open]);

  const visible =
    active === "all" ? items : items.filter((i) => slug(i.category_name ?? "") === active);

  return (
    <section id="gallery" className="container mx-auto mt-20 py-24 px-6 bg-vanilla">
      <h1 className="text-4xl md:text-5xl font-extrabold text-center mb-8 text-chocolate">
        Our Gallery
      </h1>

      {open && (
        <div
          onClick={(e) => e.target === e.currentTarget && setOpen(null)}
          className="fixed inset-0 bg-black bg-opacity-70 flex items-center justify-center z-50"
        >
          <div className="w-[90vw] md:w-[70vw] h-[80vh] shadow-xl bg-white mx-auto relative rounded-2xl overflow-hidden flex flex-col">
            <button
              onClick={() => setOpen(null)}
              aria-label="Close"
              className="absolute right-5 top-3 cursor-pointer text-chocolate text-3xl hover:rotate-90 transition z-20"
            >
              ✖
            </button>
            <div className="bg-mocca text-vanilla p-4 text-center">
              <h2 className="text-2xl font-bold">{open.title}</h2>
            </div>
            <div className="flex-1 overflow-y-auto flex flex-col">
              <div className="w-full flex justify-center items-center bg-mocca">
                <Image
                  src={open.img}
                  alt={open.title}
                  width={1200}
                  height={800}
                  className="max-h-[60vh] w-auto object-contain mx-auto"
                />
              </div>
              <div className="p-6 bg-white">
                <p className="text-gray-700 leading-relaxed whitespace-pre-line">{open.description}</p>
              </div>
            </div>
          </div>
        </div>
      )}

      <div className="justify-center mb-12 hidden lg:flex">
        <div className="flex gap-4 bg-mocca px-4 py-2 rounded-full text-sm font-semibold">
          {[{ id: 0, name: "all" }, ...categories].map((c) => {
            const key = c.id === 0 ? "all" : slug(c.name);
            return (
              <button
                key={c.id}
                onClick={() => setActive(key)}
                className={`px-4 py-2 rounded-full hover:bg-cards ${
                  active === key ? "bg-chocolate text-vanilla" : "text-chocolate"
                }`}
              >
                {c.name}
              </button>
            );
          })}
        </div>
      </div>

      <div className="hidden lg:grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        {visible.map((item) => (
          <button
            key={item.id}
            onClick={() => setOpen(item)}
            className="relative w-full h-80 rounded-lg shadow-lg overflow-hidden text-left"
          >
            <GalleryCard item={item} />
          </button>
        ))}
      </div>

      <div className="lg:hidden">
        <GallerySwiper items={items} coverflow onOpen={setOpen} />
      </div>
    </section>
  );
}
