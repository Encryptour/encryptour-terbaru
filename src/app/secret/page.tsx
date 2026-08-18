import type { Metadata } from "next";
import { getUpcomingBirthdays } from "@/lib/queries";

export const metadata: Metadata = { title: "Secret" };

// Reads the DB per request; never prerender it at build time.
export const dynamic = "force-dynamic";

const MONTHS = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];

export default async function SecretPage() {
  const upcoming = await getUpcomingBirthdays();

  return (
    <div className="min-h-screen bg-gradient-to-b from-vanilla to-white py-12 px-6">
      <div className="max-w-4xl mx-auto">
        <h1 className="text-4xl font-bold text-chocolate text-center mb-8">🎉 Upcoming Birthdays</h1>

        <div className="bg-mocca/20 backdrop-blur-md rounded-3xl shadow-2xl p-6 max-h-[500px] overflow-y-auto">
          {upcoming.length === 0 ? (
            <p className="text-center text-gray-500 font-medium">
              Tidak ada mahasiswa yang akan ulang tahun dalam 30 hari ke depan.
            </p>
          ) : (
            <ul className="space-y-4">
              {upcoming.map((item) => {
                const date = `${String(item.day).padStart(2, "0")} ${MONTHS[item.month]}`;
                return item.days_left === 0 ? (
                  <li
                    key={item.nim}
                    className="bg-chocolate text-vanilla rounded-2xl p-4 shadow-lg flex justify-between items-center animate-pulse"
                  >
                    <div>
                      <p className="text-xl font-bold">🎂 {item.nama}</p>
                      <p className="text-sm opacity-90">{item.nim}</p>
                      <p className="text-sm mt-1">Hari ini, {date}</p>
                    </div>
                    <span className="bg-vanilla text-chocolate font-bold px-4 py-2 rounded-xl">
                      🎉 Selamat Ulang Tahun!
                    </span>
                  </li>
                ) : (
                  <li
                    key={item.nim}
                    className="bg-white/70 rounded-2xl p-4 shadow hover:shadow-xl transition-all flex justify-between items-center"
                  >
                    <div>
                      <p className="text-lg font-semibold text-chocolate">{item.nama}</p>
                      <p className="text-sm text-gray-600">{item.nim}</p>
                      <p className="text-sm mt-1">{date}</p>
                    </div>
                    <span className="bg-green-500 text-white px-4 py-2 rounded-xl font-medium">
                      {item.days_left} hari lagi
                    </span>
                  </li>
                );
              })}
            </ul>
          )}
        </div>
      </div>
    </div>
  );
}
