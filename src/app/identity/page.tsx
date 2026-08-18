import Image from "next/image";
import Shell from "@/components/shell";
import LoadingGate from "@/components/loading-gate";
import PartExplorer from "./part-explorer";
import SectionHeading from "./section-heading";
import { logoParts, mascotParts } from "./parts-data";

const PALETTE = [
  ["chocolate", "#66391C"],
  ["vanilla", "#F9ECDC"],
  ["mocca", "#AD7D4F"],
] as const;

const LYRICS = [
  [
    "(HOOK) (Urutan 1)",
    `What do you think of twenty-four??
COMPETENT
What do you think of competent??
INTEGRITY
What do you think of integrity??
SOLID
What do you think of solid?
ENCRYPTTOUR
Thank you
That's alright
We're twenty four (twenty four) 3x
We're 24 (Encryptour!)`,
  ],
  [
    "(Reff)(Urutan 3)",
    `ENCRYPTTOUR
S'ap maju pantang mundur
ENCRYPTTOUR
Solid tak akan hancur
ENCRYPTTOUR
Kobarkan semangat kita
ENCRYPTTOUR
Kita bisa juara`,
  ],
  [
    "(Verse) (Urutan 2)",
    `Yo ENCRYPTTOUR
Dari edukasi kita ngerti teknologi
Yo ENCRYPTTOUR
Ethic Integrity kubawa sehari-hari
Yo ENCRYPTTOUR
Wujudkan solid kita bersama`,
  ],
  [
    "(Ending)(Urutan 4)",
    `We're twenty four (twenty four) 3x
We're twenty four (ENCRYPTTOUR)
Thank you
That's alright`,
  ],
] as const;

export default async function IdentityPage() {
  return (
    <Shell>
      <LoadingGate label="Loading Data Identitas..">
        {/* The banner is a wide chocolate artwork; the surrounding block shares
            its colour so the short mobile crop reads as one piece. */}
        <div className="flex min-h-[45vh] w-full items-center bg-chocolate md:min-h-[60vh]">
          <Image
            src="/slider/foto-identitas.png"
            alt="Foto angkatan ENCRYPTOUR"
            width={1600}
            height={900}
            priority
            sizes="100vw"
            className="h-auto w-full"
          />
        </div>

        <SectionHeading index="01" title="visi - misi" />
        <div className="mx-auto grid max-w-5xl gap-6 pl-24 pr-6 lg:px-6 font-mono md:grid-cols-2">
          <div className="rounded-2xl border border-chocolate/20 bg-cards/40 p-8">
            <p className="mb-3 text-xs tracking-[0.3em] text-mocca">&gt; VISI</p>
            <p className="text-sm leading-relaxed text-chocolate md:text-base">
              Menjadi mahasiswa/i Teknik Komputer Universitas Diponegoro angkatan 2024 yang kompeten,
              berintegritas, serta menumbuhkan lingkungan kekeluargaan guna mendukung pengembangan
              keterampilan.
            </p>
          </div>
          <div className="rounded-2xl border border-chocolate/20 bg-cards/40 p-8">
            <p className="mb-3 text-xs tracking-[0.3em] text-mocca">&gt; MISI</p>
            <ol className="space-y-3 text-sm leading-relaxed text-chocolate md:text-base">
              <li className="flex gap-3">
                <span className="text-mocca">01</span>
                Memahami teknologi komputer dengan memanfaatkan sumber daya akademik.
              </li>
              <li className="flex gap-3">
                <span className="text-mocca">02</span>
                Menerapkan nilai integritas (jujur, tanggung jawab, peduli) dan beretika di dalam
                kehidupan sehari-hari
              </li>
              <li className="flex gap-3">
                <span className="text-mocca">03</span>
                Bekerja sama dalam mewujudkan hubungan yang harmonis pada internal (angkatan) dan
                eksternal (luar angkatan dan masyarakat)
              </li>
            </ol>
          </div>
        </div>

        <SectionHeading index="02" title="color palette" />
        <div className="mx-auto grid max-w-5xl gap-4 pl-24 pr-6 lg:px-6 font-mono sm:grid-cols-3">
          {PALETTE.map(([name, code]) => (
            <div key={name} className="overflow-hidden rounded-2xl border border-chocolate/20">
              <div className="h-28 md:h-40" style={{ backgroundColor: code }} />
              <div className="flex items-center justify-between bg-cards/40 px-4 py-3 text-chocolate">
                <span className="text-xs uppercase tracking-widest">{name}</span>
                <span className="text-xs text-chocolate/60">{code}</span>
              </div>
            </div>
          ))}
        </div>

        <SectionHeading index="03" title="logo" />
        <PartExplorer parts={logoParts} label="logo" ratio="340 / 350" />

        <SectionHeading index="04" title="mascot" />
        <PartExplorer parts={mascotParts} label="mascot" ratio="350 / 500" />

        <SectionHeading index="05" title="yel - yel" />
        <div className="mx-auto grid max-w-5xl gap-4 pl-24 pr-6 lg:px-6 font-mono md:grid-cols-2">
          {LYRICS.map(([heading, body]) => (
            <div key={heading} className="rounded-2xl border border-chocolate/20 bg-cards/40 p-6">
              <p className="mb-3 text-xs tracking-[0.2em] text-mocca">{heading}</p>
              <p className="whitespace-pre-line text-sm leading-relaxed text-chocolate">{body}</p>
            </div>
          ))}
        </div>

        <SectionHeading index="06" title="jargon" />
        <div className="mx-auto mb-24 max-w-5xl pl-24 pr-6 lg:px-6 font-mono">
          <div className="rounded-2xl bg-chocolate p-10 text-center md:p-16">
            <p className="whitespace-pre-line text-lg font-bold leading-loose tracking-wide text-vanilla md:text-3xl">
              {`Encryptour !!!
Integrity !
Unbreakable !
We are competent !
Encryptour !!!
We are family !`}
            </p>
          </div>
        </div>
      </LoadingGate>
    </Shell>
  );
}
