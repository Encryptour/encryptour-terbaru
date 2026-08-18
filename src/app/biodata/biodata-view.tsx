"use client";

import Link from "next/link";
import { useRouter, useSearchParams } from "next/navigation";
import { useEffect, useState } from "react";
import MahasiswaCard from "./mahasiswa-card";
import MahasiswaModal from "./mahasiswa-modal";
import type { Mahasiswa } from "@/lib/types";

/* Font Awesome is only used by this page's controls and the profile modal, so
   it loads here instead of blocking render on every route. */
const FA_CSS = "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css";

export default function BiodataView({
  items,
  search,
  order,
}: {
  items: Mahasiswa[];
  search: string;
  order: "asc" | "desc";
}) {
  // Injected on mount so only this route pays for the CDN stylesheet + webfont.
  useEffect(() => {
    if (document.querySelector(`link[href="${FA_CSS}"]`)) return;
    const link = document.createElement("link");
    link.rel = "stylesheet";
    link.href = FA_CSS;
    document.head.appendChild(link);
  }, []);

  const router = useRouter();
  const params = useSearchParams();
  const [term, setTerm] = useState(search);
  const [open, setOpen] = useState<Mahasiswa | null>(null);

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

  return (
    <div className="container mt-20 mx-auto">
      <div className="flex flex-wrap justify-between items-center mb-6">
        <Link href={`/biodata?order=${order === "asc" ? "desc" : "asc"}`}>
          <button className="flex items-center gap-2 font-semibold">
            <i className={`fa fa-sort-amount-${order === "asc" ? "desc" : "asc"}`} /> Sort
          </button>
        </Link>

        <div className="flex items-center gap-2">
          <input
            type="text"
            value={term}
            onChange={(e) => setTerm(e.target.value)}
            placeholder="Search"
            aria-label="Search mahasiswa"
            className="w-[250px] border-b-2 border-chocolate bg-transparent placeholder:text-chocolate placeholder:font-semibold focus:outline-none"
          />
          <i className="fa fa-search text-chocolate" />
        </div>
      </div>

      <div className="grid grid-cols-3 gap-6">
        {items.length ? (
          items.map((item) => <MahasiswaCard key={item.nim} item={item} onOpen={setOpen} />)
        ) : (
          <div>No data found.</div>
        )}
      </div>

      {open && <MahasiswaModal item={open} onClose={() => setOpen(null)} />}
    </div>
  );
}
