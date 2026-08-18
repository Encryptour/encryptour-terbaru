"use client";

import Image from "next/image";
import type { Mahasiswa } from "@/lib/types";

const titleCase = (s: string) => s.toLowerCase().replace(/\b\w/g, (c) => c.toUpperCase());

/** Grid tile. Photo fills the card; details sit on a scrim along the bottom. */
export default function MahasiswaCard({
  item,
  onOpen,
}: {
  item: Mahasiswa;
  onOpen: (item: Mahasiswa) => void;
}) {
  return (
    <button
      onClick={() => onOpen(item)}
      className="group relative aspect-[3/4] w-full overflow-hidden rounded-xl border border-chocolate/25 bg-cards/40 text-left font-mono shadow-sm transition-shadow hover:shadow-xl"
    >
      {item.formal_picture ? (
        <Image
          src={item.formal_picture}
          alt={item.nama_lengkap ?? item.nim}
          fill
          sizes="(min-width:1024px) 20vw, (min-width:640px) 33vw, 50vw"
          quality={60}
          className="object-cover transition-transform duration-500 group-hover:scale-105"
        />
      ) : (
        <div className="flex h-full items-center justify-center text-4xl text-chocolate/30">?</div>
      )}

      <div className="absolute inset-x-0 bottom-0 bg-gradient-to-t from-chocolate via-chocolate/85 to-transparent p-3 pt-10">
        <p className="truncate text-[10px] tracking-widest text-vanilla/60">{item.nim}</p>
        <p className="truncate font-display text-sm font-bold uppercase text-vanilla md:text-base">
          {item.nama_panggilan || titleCase(item.nama_lengkap ?? "")}
        </p>
        <p className="truncate text-[10px] text-vanilla/70">
          {item.asal}
          {item.mdpl != null && ` · ${item.mdpl} MDPL`}
        </p>
      </div>
    </button>
  );
}
