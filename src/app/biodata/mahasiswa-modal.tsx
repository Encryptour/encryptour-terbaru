"use client";

import Image from "next/image";
import { useEffect } from "react";
import type { Mahasiswa } from "@/lib/types";

function Field({ label, value }: { label: string; value?: string | number | null }) {
  return (
    <div>
      <h1 className="text-orange-100 font-light">{label}</h1>
      <h1 className="text-orange-50 font-semibold">{value}</h1>
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
    return () => document.removeEventListener("keydown", onKey);
  }, [onClose]);

  return (
    <div
      onClick={(e) => e.target === e.currentTarget && onClose()}
      className="fixed inset-0 z-50 flex justify-center items-center bg-black bg-opacity-50"
    >
      <div className="w-[90vw] h-[90vh] shadow-xl bg-gradient-to-tl from-[#AD7D4F] to-[#EDB47E] mx-auto relative rounded-2xl overflow-hidden flex flex-col md:grid md:grid-cols-[auto_1fr]">
        <button
          onClick={onClose}
          aria-label="Close"
          className="absolute right-5 top-5 cursor-pointer text-chocolate text-3xl hover:rotate-90 transition"
        >
          ✖
        </button>

        <div className="flex flex-col justify-evenly p-4 md:p-6 h-auto md:h-full items-center">
          <div className="flex items-start justify-center mb-4 md:mb-0">
            {item.non_formal_picture && (
              <Image
                src={item.non_formal_picture}
                alt={item.nama_lengkap ?? ""}
                width={260}
                height={400}
                className="bg-vanilla w-[200px] sm:w-[240px] md:w-[260px] max-h-[40vh] md:max-h-[60vh] object-cover rounded-xl shadow-lg"
              />
            )}
          </div>
          <div className="w-full flex justify-center items-center gap-4 mt-2">
            <a href={`https://www.instagram.com/${item.user_ig}/`} target="_blank" rel="noopener noreferrer" aria-label="Instagram">
              <i className="fa fa-instagram text-chocolate hover:scale-110 transition" style={{ fontSize: "3rem" }} />
            </a>
            <a href={`mailto:${item.email_adress}`} aria-label="Email">
              <i className="fa fa-envelope text-chocolate hover:scale-110 transition" style={{ fontSize: "3rem" }} />
            </a>
            <a href={`https://wa.me/${item.no_wa}`} target="_blank" rel="noopener noreferrer" aria-label="WhatsApp">
              <i className="fa fa-whatsapp text-chocolate hover:scale-110 transition" style={{ fontSize: "3rem" }} />
            </a>
          </div>
        </div>

        <div className="flex items-start justify-start p-4 md:p-6 h-full min-h-0">
          <div className="bg-chocolate rounded-2xl shadow-inner p-4 md:p-6 w-full h-full overflow-y-auto max-w-[95%] space-y-4 md:space-y-6">
            <div className="text-center md:text-left">
              <h4 className="text-sm text-orange-200 font-light capitalize">{item.nama_lengkap}</h4>
              <h1 className="text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-bold uppercase text-orange-50">
                {item.nama_panggilan}
              </h1>
            </div>
            <p className="text-orange-100 italic text-base sm:text-lg">{item.quotes}</p>

            <div>
              <ul className="text-orange-100 text-xs sm:text-sm mb-1 flex flex-wrap">
                <li className="w-1/3">Asal</li>
                <li className="w-1/3">NIM</li>
                <li className="w-1/3">TTL</li>
              </ul>
              <ul className="text-orange-50 font-semibold flex flex-wrap text-sm sm:text-base">
                <li className="w-1/3">{item.asal}</li>
                <li className="w-1/3">{item.nim}</li>
                <li className="w-1/3">{item.ttl}</li>
              </ul>
            </div>

            <Field label="Alamat Kos" value={item.alamat_kos} />
            <div className="flex flex-col sm:flex-row gap-4">
              <div className="w-full sm:w-1/2">
                <h1 className="text-orange-100 font-light">Alamat Rumah</h1>
                <h1 className="text-orange-50 font-semibold max-h-16 overflow-y-auto">{item.alamat_rumah}</h1>
              </div>
              <div className="w-full sm:w-1/3">
                <Field label="Ketinggian Rumah" value={item.mdpl} />
              </div>
            </div>
            <Field label="Hobi" value={item.hobi} />
            <Field label="Tempat Makan Favorit" value={item.tempat_makan_fav} />
          </div>
        </div>
      </div>
    </div>
  );
}
