"use client";

import Image from "next/image";
import { useEffect, useState } from "react";

/**
 * The Blade pages all hid their content behind a 1s spinner. Kept for visual
 * parity — data is already server-rendered, so this is cosmetic only.
 */
export default function LoadingGate({
  label,
  children,
}: {
  label: string;
  children: React.ReactNode;
}) {
  const [ready, setReady] = useState(false);
  useEffect(() => {
    const t = setTimeout(() => setReady(true), 1000);
    return () => clearTimeout(t);
  }, []);

  if (ready) return <>{children}</>;

  return (
    <div className="flex h-screen items-center justify-center text-wrap text-chocolate">
      <div className="items-center text-center">
        <div className="relative my-10 mx-auto">
          <Image
            src="/assets/maintenance.png"
            alt=""
            width={160}
            height={160}
            className="w-40 mx-auto h-40 spin-reverse"
          />
          <Image
            src="/assets/maintenance.png"
            alt=""
            width={96}
            height={96}
            className="h-24 w-24 absolute top-1/3 left-1/2 animate-spin-slow"
          />
        </div>
        <h1 className="text-xl font-bold md:font-extrabold md:text-4xl">{label}</h1>
        <p className="text-lg md:text-2xl font-normal md:font-semibold">
          Jika memakan waktu lama, silahkan cek internet anda!
        </p>
      </div>
    </div>
  );
}
