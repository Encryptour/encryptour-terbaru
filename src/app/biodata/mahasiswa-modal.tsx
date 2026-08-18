"use client";

import Image from "next/image";
import { useEffect } from "react";
import Icon from "@/components/icons";
import type { Mahasiswa } from "@/lib/types";

function Field({ label, value }: { label: string; value?: string | number | null }) {
  return (
    <div className="min-w-0">
      <p className="text-[10px] uppercase tracking-[0.2em] text-mocca">{label}</p>
      <p className="mt-1 break-words text-sm text-vanilla">{value || "—"}</p>
    </div>
  );
}

export default function MahasiswaModal({
  item,
  onClose,
}: {
  item: Mahasiswa;
  onClose: () => void;
}) {
  useEffect(() => {
    const onKey = (e: KeyboardEvent) => e.key === "Escape" && onClose();
    document.addEventListener("keydown", onKey);
    // Modal owns the scroll while it is open.
    document.body.style.overflow = "hidden";
    return () => {
      document.removeEventListener("keydown", onKey);
      document.body.style.overflow = "";
    };
  }, [onClose]);

  const links = [
    item.user_ig && { icon: "instagram", href: `https://www.instagram.com/${item.user_ig}/`, label: "Instagram" },
    item.email_adress && { icon: "mail", href: `mailto:${item.email_adress}`, label: "Email" },
    item.no_wa && { icon: "whatsapp", href: `https://wa.me/${item.no_wa}`, label: "WhatsApp" },
  ].filter(Boolean) as { icon: string; href: string; label: string }[];

  return (
    <div
      onClick={(e) => e.target === e.currentTarget && onClose()}
      className="fixed inset-0 z-[70] flex items-center justify-center bg-chocolate/60 p-4 backdrop-blur-sm"
    >
      <div className="relative flex max-h-[88vh] w-full max-w-4xl animate-[fadeIn_.25s_ease-out] flex-col overflow-hidden rounded-2xl border border-mocca/40 bg-chocolate font-mono shadow-2xl">
        {/* Window chrome, matching the panels elsewhere on the site */}
        <div className="flex shrink-0 items-center justify-between border-b border-vanilla/15 px-4 py-3">
          <span className="truncate text-[10px] tracking-[0.25em] text-vanilla/50">
            ~/angkatan/{item.nim}.json
          </span>
          <button
            onClick={onClose}
            aria-label="Close"
            className="rounded-full border border-vanilla/30 p-1.5 text-vanilla transition-colors hover:bg-vanilla hover:text-chocolate"
          >
            <Icon name="close" className="size-4" />
          </button>
        </div>

        <div className="grid min-h-0 flex-1 gap-6 overflow-y-auto p-6 md:grid-cols-[15rem_1fr] md:p-8">
          <div className="shrink-0">
            {item.non_formal_picture && (
              <Image
                src={item.non_formal_picture}
                alt={item.nama_lengkap ?? ""}
                width={280}
                height={380}
                quality={70}
                className="mx-auto aspect-[3/4] w-full max-w-[15rem] rounded-xl border border-vanilla/20 object-cover"
              />
            )}
            {links.length > 0 && (
              <div className="mt-4 flex justify-center gap-2">
                {links.map((l) => (
                  <a
                    key={l.label}
                    href={l.href}
                    target="_blank"
                    rel="noopener noreferrer"
                    aria-label={l.label}
                    className="rounded-full border border-vanilla/30 p-2.5 text-vanilla transition-colors hover:bg-vanilla hover:text-chocolate"
                  >
                    <Icon name={l.icon} className="size-5" />
                  </a>
                ))}
              </div>
            )}
          </div>

          <div className="min-w-0">
            <p className="text-xs capitalize tracking-[0.2em] text-mocca">{item.nama_lengkap}</p>
            <h2 className="mt-1 font-display text-3xl font-bold uppercase leading-none text-vanilla md:text-5xl">
              {item.nama_panggilan}
            </h2>
            {item.quotes && (
              <p className="mt-4 border-l-2 border-mocca pl-4 text-sm italic text-vanilla/70">
                “{item.quotes}”
              </p>
            )}

            <div className="mt-6 grid grid-cols-2 gap-x-6 gap-y-5 border-t border-vanilla/15 pt-6 sm:grid-cols-3">
              <Field label="NIM" value={item.nim} />
              <Field label="Asal" value={item.asal} />
              <Field label="TTL" value={item.ttl} />
              <Field label="Ketinggian" value={item.mdpl != null ? `${item.mdpl} MDPL` : null} />
              <Field label="Agama" value={item.agama} />
              <Field label="Hobi" value={item.hobi} />
              <Field label="Alamat Kos" value={item.alamat_kos} />
              <Field label="Alamat Rumah" value={item.alamat_rumah} />
              <Field label="Tempat Makan Favorit" value={item.tempat_makan_fav} />
            </div>
          </div>
        </div>
      </div>
    </div>
  );
}
