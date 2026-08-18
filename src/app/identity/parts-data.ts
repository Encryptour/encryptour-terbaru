/** Content lifted from identity.blade.php, as data rather than markup so the
 *  explorer can lay it out however it likes. */
export type Part = { img: string; title: string; tag: string; body: string };

// Sources are cropped at wildly different scales, so scripts/normalise-parts.js
// trims each one and pads it onto a shared canvas — same on-screen size for every part.
const logo = (n: number) => `/assets/identity/parts/logo${n}.png`;
const mascot = (n: number) => `/assets/identity/parts/mascot${n}.png`;

export const logoParts: Part[] = [
  {
    img: logo(2),
    title: "Kepala Serigala",
    tag: "Kekeluargaan",
    body: "Dalam kawanan Serigala, serigala sangat memedulikan keluarganya. hal ini sesuai dengan misi kami yang ingin menumbuhkan lingkungan kekeluargaan",
  },
  {
    img: logo(3),
    title: "Mulut Serigala Yang Terbuka",
    tag: "Kesiapan melindungi",
    body: "Mulut yang terbuka memiliki arti kesiapan untuk melindungi kawanannya, hal ini sesuai dengan nama angkatan 24 untuk saling melindungi satu sama lain",
  },
  {
    img: logo(4),
    title: "Sirkuit Elektronik",
    tag: "Kemajuan Teknologi",
    body: "Menandakan kemajuan teknologi serta hubungan angkatan kami dengan Department Teknik Komputer.",
  },
  {
    img: logo(5),
    title: "24 Node",
    tag: "Angkatan 24",
    body: "node yang berjumlahkan 24 menandakan kami sebagai angkatan Teknik Komputer 2024",
  },
  {
    img: logo(6),
    title: "Lingkaran",
    tag: "Silaturahmi yang tak terputus",
    body: "lingkaran melambangkan silaturahmi tak terputus dan tanpa akhir",
  },
  {
    img: logo(7),
    title: "Lingkaran Biner",
    tag: "ENCRYPTOUR dalam biner",
    body: `01100101 = E
01101110 = N
01100011 = C
01110010 = R
01111001 = Y
01110000 = P
01110100 = T
01101111 = O
01110101 = U
01110010 = R`,
  },
  {
    img: logo(8),
    title: "Start and Stop",
    tag: "Arah baca",
    body: "Diberikan sebuah tanda panah kebawah yang menandakan permulaian untuk membaca Encryptour dengan searah jarum jam, lalu terdapat strip sebagai pembatas yang menandakan bahwa biner sudah berakhir",
  },
];

export const mascotParts: Part[] = [
  {
    img: mascot(1),
    title: "“LOCKIE”",
    tag: "Keamanan",
    body: "Lockie memiliki arti keamanan atau aman sebagai maskot yang melambangkan angkatan kami, kami angkatan 24 yang ingin menumbuhkan kekeluargaan, kami memberikan rasa aman kepada angkatan kami hal ini sesuai dengan nama dan visi kami.",
  },
  {
    img: mascot(2),
    title: "Ekspresi Ceria",
    tag: "Semangat dan Ramah",
    body: "Menunjukkan bahwa angkatan memiliki rasa semangat dalam saling menjaga dan ramah untuk memberikan sebuah hubungan yang harmonis ke internal maupun eksternal",
  },
  {
    img: mascot(3),
    title: "Mata Terbuka Lebar",
    tag: "Kompeten dan Integritas",
    body: "Memiliki rasa kompeten yang sangat tinggi untuk meraih tujuan sesuai dengan visi dan misi",
  },
  {
    img: mascot(4),
    title: "Forever Salute",
    tag: "Salam Angkatan",
    body: "Forever salute menunjukan bahwa angkatan 24 memiliki rasa saling menjaga dan memberikan rasa aman",
  },
  {
    img: mascot(6),
    title: "Work Jacket",
    tag: "Representasi Kolaborasi",
    body: "Sebagai pakaian yang umum digunakan di lingkungan kerja, work jacket bisa mewakili semangat kerja sama dan gotong-royong dalam mencapai tujuan bersama sebagai angkatan.",
  },
  {
    img: mascot(5),
    title: "Bentuk Ekor",
    tag: "Inisial Encryptour",
    body: "Bentuk ekor menjuntai dengan membentuk huruf seperti “e”, melambangkan inisial Encryptour.",
  },
  {
    img: mascot(1),
    title: "Maskot yang Berdiri",
    tag: "Tanggung jawab",
    body: "Menunjukkan bahwa angkatan akan terus bertanggung jawab dalam menjaga satu sama lain",
  },
];
