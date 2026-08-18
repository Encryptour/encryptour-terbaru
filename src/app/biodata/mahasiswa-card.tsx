"use client";

import type { Mahasiswa } from "@/lib/types";

const titleCase = (s: string) =>
  s.toLowerCase().replace(/\b\w/g, (c) => c.toUpperCase());

/** resources/views/cards/default_card.blade.php (card half only; the modal is
 *  now a single shared component instead of one per row). */
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
      style={{ backgroundImage: `url('${item.formal_picture}')` }}
      className="card overflow-hidden group flex items-end mx-auto aspect-square xl:w-[350px] lg:w-[280px] sm:w-[210px] w-[108px] transition-all duration-700 ease-in-out border-chocolate border-2 hover:bg-chocolate text-black hover:text-vanilla hover:text-opacity-75"
    >
      <div className="grid grid-cols-2">
        <div className="flex flex-col mb-2 sm:mb-4 lg:mb-12 ml-1 sm:ml-2 lg:ml-6 z-10 text-left">
          <div className="text-xs drop-shadow-[1px_-1px_8px_rgba(255,255,255,1)] group-hover:drop-shadow-none sm:text-sm">
            {titleCase(item.nama_lengkap ?? "")}
          </div>
          <div className="hidden sm:block text-2xl uppercase font-bold mb-2">{item.nama_panggilan}</div>
          <div className="hidden sm:block text-sm">{item.nim}</div>
          <div className="hidden sm:block text-sm">{item.asal}</div>
          <div className="hidden sm:block text-sm">{item.mdpl} MDPL</div>
        </div>
      </div>
    </button>
  );
}
