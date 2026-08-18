import Shell from "@/components/shell";
import LoadingGate from "@/components/loading-gate";
import IdentitySlider from "./identity-slider";
import SectionHeading from "./section-heading";
import { logoSlides, mascotSlides } from "./logo-slides";

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
      {/* Legacy stylesheet kept as-is; it is scoped to this route only. */}
      <link rel="stylesheet" href="/slider/styles.css" />

      <LoadingGate label="Loading Data Identitas..">
        <div className="foto" />

        <SectionHeading title="visi - misi" wide />
        <br />

        <div className="container1">
          <div className="content rounded-r-[40px]">
            <h3>visi</h3>
            <p>
              Menjadi mahasiswa/i Teknik Komputer Universitas Diponegoro angkatan 2024 yang kompeten,
              berintegritas, serta menumbuhkan lingkungan kekeluargaan guna mendukung pengembangan
              keterampilan.
            </p>
          </div>
        </div>

        <div className="container2">
          <div className="content rounded-l-[40px]">
            <h3>misi</h3>
            <ol>
              <li>Memahami teknologi komputer dengan memanfaatkan sumber daya akademik.</li>
              <li>
                Menerapkan nilai integritas (jujur, tanggung jawab, peduli) dan beretika di dalam
                kehidupan sehari-hari
              </li>
              <li>
                Bekerja sama dalam mewujudkan hubungan yang harmonis pada internal (angkatan) dan
                eksternal (luar angkatan dan masyarakat)
              </li>
            </ol>
          </div>
        </div>

        <SectionHeading title="color pallete" wide />
        <div className="palette-container">
          <div className="palette">
            {PALETTE.map(([name, code]) => (
              <div key={name} className={`color ${name}`}>
                <div className="color-name">{name}</div>
                <div className="color-code">{code}</div>
              </div>
            ))}
          </div>
        </div>

        <SectionHeading title="logo" />
        <IdentitySlider slides={logoSlides} />

        <SectionHeading title="mascot" />
        <IdentitySlider variant="-v2" slides={mascotSlides} />

        <SectionHeading title="yel - yel" />
        <div className="lyrics-card">
          {[LYRICS.slice(0, 2), LYRICS.slice(2)].map((row, i) => (
            <div key={i} className="section">
              {row.map(([heading, body]) => (
                <div key={heading} className="column">
                  <h3>{heading}</h3>
                  <p style={{ whiteSpace: "pre-line" }}>{body}</p>
                </div>
              ))}
            </div>
          ))}
        </div>

        <SectionHeading title="jargon" />
        <div className="container-box">
          <div className="box">
            Encryptour !!!
            <br />
            Integrity !<br />
            Unbreakable !<br />
            We are competent !<br />
            Encryptour !!!
            <br />
            We are family !
          </div>
        </div>
      </LoadingGate>
    </Shell>
  );
}
