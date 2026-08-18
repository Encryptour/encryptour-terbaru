import Image from "next/image";

/** The shared loading visual, used by route-level loading.tsx and LoadingGate. */
export default function Spinner({ label }: { label: string }) {
  return (
    <div className="fixed inset-0 z-[60] flex h-screen items-center justify-center bg-vanilla px-6 text-center text-chocolate">
      <div>
        <div className="relative mx-auto my-10">
          <Image
            src="/assets/maintenance.png"
            alt=""
            width={160}
            height={160}
            priority
            className="mx-auto h-40 w-40 spin-reverse"
          />
          <Image
            src="/assets/maintenance.png"
            alt=""
            width={96}
            height={96}
            className="absolute left-1/2 top-1/3 h-24 w-24 animate-spin-slow"
          />
        </div>
        <h1 className="font-mono text-xl font-bold md:text-3xl">{label}</h1>
        <p className="mt-2 font-mono text-xs text-chocolate/70 md:text-sm">
          Jika memakan waktu lama, silahkan cek internet anda!
        </p>
      </div>
    </div>
  );
}
