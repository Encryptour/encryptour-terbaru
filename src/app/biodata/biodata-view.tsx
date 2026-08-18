"use client";

import { useRouter, useSearchParams } from "next/navigation";
import { useEffect, useMemo, useState } from "react";
import MahasiswaCard from "./mahasiswa-card";
import MahasiswaModal from "./mahasiswa-modal";
import type { Mahasiswa } from "@/lib/types";

/** Page-size choices, capped at the number of people actually on file. */
function pageSizes(total: number) {
  return [12, 24, 48].filter((n) => n < total).concat(total);
}

export default function BiodataView({
  items,
  search,
  order,
}: {
  items: Mahasiswa[];
  search: string;
  order: "asc" | "desc";
}) {
  const router = useRouter();
  const params = useSearchParams();
  const [term, setTerm] = useState(search);
  const [open, setOpen] = useState<Mahasiswa | null>(null);
  const sizes = useMemo(() => pageSizes(items.length), [items.length]);
  const [perPage, setPerPage] = useState(sizes[0] ?? 12);
  const [page, setPage] = useState(1);

  // Debounced live search — replaces the /biodata/search JSON+HTML endpoint.
  useEffect(() => {
    if (term === search) return;
    const t = setTimeout(() => {
      const next = new URLSearchParams(params);
      term ? next.set("search", term) : next.delete("search");
      router.replace(`/biodata?${next}`);
    }, 200);
    return () => clearTimeout(t);
  }, [term, search, params, router]);

  // A shorter result set can leave the viewer stranded past the last page.
  const pages = Math.max(1, Math.ceil(items.length / perPage));
  useEffect(() => setPage(1), [search, order, perPage]);
  const current = Math.min(page, pages);
  const shown = items.slice((current - 1) * perPage, current * perPage);

  const goSort = () => {
    const next = new URLSearchParams(params);
    next.set("order", order === "asc" ? "desc" : "asc");
    router.replace(`/biodata?${next}`);
  };

  return (
    <div className="mx-auto max-w-7xl pb-24 pl-24 pr-6 font-mono lg:px-8">
      {/* pt clears the floating navbar pill */}
      <header className="pt-28 lg:pt-36">
        <p className="mb-2 text-xs tracking-[0.3em] text-mocca">&gt; SELECT * FROM angkatan</p>
        <h1 className="font-display text-4xl font-bold tracking-tight text-chocolate md:text-6xl">
          BIODATA
        </h1>
        <p className="mt-3 text-sm text-chocolate/70">
          {items.length} anggota terdaftar{search && ` · hasil untuk “${search}”`}
        </p>
      </header>

      <div className="sticky top-24 z-30 -mx-2 mb-8 mt-8 flex flex-wrap items-center gap-3 rounded-2xl border border-chocolate/20 bg-vanilla/90 p-3 backdrop-blur-sm lg:top-28">
        <label className="flex flex-1 items-center gap-2 rounded-full border border-chocolate/30 px-4 py-2">
          <span className="text-mocca">&gt;</span>
          <input
            type="text"
            value={term}
            onChange={(e) => setTerm(e.target.value)}
            placeholder="cari nama..."
            aria-label="Search mahasiswa"
            className="w-full min-w-0 bg-transparent text-sm text-chocolate placeholder:text-chocolate/40 focus:outline-none"
          />
        </label>

        <button
          onClick={goSort}
          className="rounded-full border border-chocolate/30 px-4 py-2 text-xs uppercase tracking-widest text-chocolate transition-colors hover:bg-chocolate hover:text-vanilla"
        >
          mdpl {order === "asc" ? "↑" : "↓"}
        </button>

        <label className="flex items-center gap-2 text-xs uppercase tracking-widest text-chocolate/70">
          show
          <select
            value={perPage}
            onChange={(e) => setPerPage(Number(e.target.value))}
            className="rounded-full border border-chocolate/30 bg-transparent px-3 py-2 text-chocolate focus:outline-none"
          >
            {sizes.map((n) => (
              <option key={n} value={n}>
                {n === items.length ? `all (${n})` : n}
              </option>
            ))}
          </select>
        </label>
      </div>

      {shown.length ? (
        <div className="grid grid-cols-2 gap-4 sm:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5">
          {shown.map((item) => (
            <MahasiswaCard key={item.nim} item={item} onOpen={setOpen} />
          ))}
        </div>
      ) : (
        <p className="py-20 text-center text-sm text-chocolate/60">// no data found</p>
      )}

      {pages > 1 && (
        <div className="mt-10 flex flex-wrap items-center justify-center gap-2 text-xs">
          <button
            onClick={() => setPage(current - 1)}
            disabled={current === 1}
            className="rounded-full border border-chocolate/30 px-4 py-2 text-chocolate transition-colors hover:bg-chocolate hover:text-vanilla disabled:opacity-30 disabled:hover:bg-transparent disabled:hover:text-chocolate"
          >
            &larr; prev
          </button>
          {Array.from({ length: pages }, (_, i) => i + 1).map((n) => (
            <button
              key={n}
              onClick={() => setPage(n)}
              className={`size-9 rounded-full border transition-colors ${
                n === current
                  ? "border-chocolate bg-chocolate text-vanilla"
                  : "border-chocolate/30 text-chocolate hover:border-chocolate"
              }`}
            >
              {n}
            </button>
          ))}
          <button
            onClick={() => setPage(current + 1)}
            disabled={current === pages}
            className="rounded-full border border-chocolate/30 px-4 py-2 text-chocolate transition-colors hover:bg-chocolate hover:text-vanilla disabled:opacity-30 disabled:hover:bg-transparent disabled:hover:text-chocolate"
          >
            next &rarr;
          </button>
        </div>
      )}

      {open && <MahasiswaModal item={open} onClose={() => setOpen(null)} />}
    </div>
  );
}
