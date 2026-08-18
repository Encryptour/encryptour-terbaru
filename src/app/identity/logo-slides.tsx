import Image from "next/image";

const meaning = (n: number) => `/assets/identity/logo/logo${n}.png`;

/** Static content lifted verbatim from identity.blade.php. */
export const logoSlides = [
  <>
    <Image src={meaning(1)} alt="Logo ENCRYPTOUR" width={300} height={300} />
    <h1 className="text-md md:text-4xl font-bold">Logo ENCRYPTOUR</h1>
  </>,
  <>
    <Image src={meaning(2)} alt="Kepala Serigala" width={80} height={80} className="w-20 h-auto" />
    <p className="text h-full overflow-y-auto md:pt-16">
      <b className="text-md md:text-4xl">Kepala Serigala</b>
      <br />
      Kekeluargaan
      <br />
      <br />
      Dalam kawanan Serigala, serigala sangat memedulikan keluarganya. hal ini sesuai dengan misi kami
      yang ingin menumbuhkan lingkungan kekeluargaan
    </p>
  </>,
  <>
    <Image src={meaning(3)} alt="Mulut Serigala Yang Terbuka" width={300} height={300} />
    <p className="text h-full overflow-y-auto md:pt-16">
      <b className="text-md md:text-4xl">Mulut Serigala Yang Terbuka</b>
      <br />
      kesiapan melindungi
      <br />
      <br />
      Mulut yang terbuka memiliki arti kesiapan untuk melindungi kawanannya, hal ini sesuai dengan nama
      angkatan 24 untuk saling melindungi satu sama lain
    </p>
  </>,
  <>
    <Image src={meaning(4)} alt="Sirkuit Elektronik" width={300} height={300} />
    <p className="text h-full overflow-y-auto md:pt-16">
      <b className="text-md md:text-4xl">Sirkuit Elektronik</b>
      <br />
      Kemajuan Teknologi
      <br />
      <br />
      Menandakan kemajuan teknologi serta hubungan angkatan kami dengan Department Teknik Komputer.
    </p>
  </>,
  <>
    <Image src={meaning(5)} alt="24 Node" width={300} height={300} />
    <p className="text h-full overflow-y-auto md:pt-16">
      <b className="text-md md:text-4xl">24 Node</b>
      <br />
      Angkatan 24
      <br />
      <br />
      node yang berjumlahkan 24 menandakan kami sebagai angkatan Teknik Komputer 2024
    </p>
  </>,
  <>
    <Image src={meaning(6)} alt="Lingkaran" width={300} height={300} />
    <p className="text h-full overflow-y-auto md:pt-16">
      <b className="text-md md:text-4xl">Lingkaran</b>
      <br />
      Silaturahmi yang tak terputus
      <br />
      <br />
      lingkaran melambangkan silaturahmi tak terputus dan tanpa akhir
    </p>
  </>,
  <>
    <Image src={meaning(7)} alt="Lingkaran Biner" width={300} height={300} />
    <p className="text h-full overflow-y-auto md:pt-16">
      <b className="text-md md:text-4xl">Lingkaran Biner</b>
      <br />
      01100101 = E <br />
      01101110 = N <br />
      01100011 = C <br />
      01110010 = R <br />
      01111001 = Y <br />
      01110000 = P <br />
      01110100 = T <br />
      01101111 = O <br />
      01110101 = U <br />
      01110010 = R
    </p>
  </>,
  <>
    <Image src={meaning(8)} alt="Start and Stop" width={300} height={300} />
    <p className="text h-full overflow-y-auto md:pt-16">
      <b className="text-md md:text-4xl">Start and Stop</b>
      <br />
      Diberikan sebuah tanda panah kebawah yang menandakan permulaian untuk membaca Encryptour dengan
      searah jarum jam, lalu terdapat strip sebagai pembatas yang menandakan bahwa biner sudah berakhir
    </p>
  </>,
];

const mascot = (n: number) => `/assets/identity/maskot/mascot${n}.png`;

const mascotItems: [number, React.ReactNode][] = [
  [1, <h1 key="t">Mascot ENCRYPTOUR</h1>],
  [
    1,
    <p key="lockie">
      <b className="text-md md:text-4xl">
        <q>LOCKIE</q>
      </b>
      <br />
      Lockie memiliki arti keamanan atau aman sebagai maskot yang melambangkan angkatan kami, kami
      angkatan 24 yang ingin menumbuhkan kekeluargaan, kami memberikan rasa aman kepada angkatan kami hal
      ini sesuai dengan nama dan visi kami.
    </p>,
  ],
  [
    2,
    <p key="ceria">
      <b className="text-md md:text-4xl">Ekspresi Ceria</b>
      <br />
      Semangat dan Ramah
      <br />
      <br />
      Menunjukkan bahwa angkatan memiliki rasa semangat dalam saling menjaga dan ramah untuk memberikan
      sebuah hubungan yang harmonis ke internal maupun eksternal
    </p>,
  ],
  [
    3,
    <p key="mata">
      <b className="text-md md:text-4xl">Mata Terbuka Lebar</b>
      <br />
      Kompeten dan Integritas
      <br />
      <br />
      Memiliki rasa kompeten yang sangat tinggi untuk meraih tujuan sesuai dengan visi dan misi
    </p>,
  ],
  [
    4,
    <p key="salute">
      <b className="text-md md:text-4xl">Forever Salute</b>
      <br />
      Salam Angkatan
      <br />
      <br />
      Forever salute menunjukan bahwa angkatan 24 memiliki rasa saling menjaga dan memberikan rasa aman
    </p>,
  ],
  [
    6,
    <p key="jacket">
      <b className="text-md md:text-4xl">Work Jacket</b>
      <br />
      Representasi Kolaborasi
      <br />
      <br />
      Sebagai pakaian yang umum digunakan di lingkungan kerja, work jacket bisa mewakili semangat kerja
      sama dan gotong-royong dalam mencapai tujuan bersama sebagai angkatan.
    </p>,
  ],
  [
    5,
    <p key="ekor">
      <b className="text-md md:text-4xl">Bentuk Ekor</b>
      <br />
      Inisial Encryptour
      <br />
      <br />
      Bentuk ekor menjuntai dengan membentuk huruf seperti “e”, melambangkan inisial Encryptour.
    </p>,
  ],
  [
    1,
    <p key="berdiri">
      <b className="text-md md:text-4xl">Maskot yang Berdiri</b>
      <br />
      Tanggung jawab
      <br />
      <br />
      Menunjukkan bahwa angkatan akan terus bertanggung jawab dalam menjaga satu sama lain
    </p>,
  ],
];

export const mascotSlides = mascotItems.map(([n, body], i) => (
  <>
    <Image src={mascot(n)} alt={`Mascot ${i + 1}`} width={300} height={300} />
    <div
      className={`description-v2 h-full overflow-y-auto md:pt-16 ${
        i === 0 ? "flex items-center justify-center" : ""
      }`}
    >
      {body}
    </div>
  </>
));
