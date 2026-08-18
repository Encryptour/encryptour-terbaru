// Sample data so the pages render something during development.
// Usage: npm run db:seed        (re-runnable: clears the tables first)
import { neon } from "@neondatabase/serverless";

const a = neon(process.env.DATABASE_URL_GALLERY);
const b = neon(process.env.DATABASE_URL_BIODATA);

const photo = (id, w = 1600, h = 900) => `https://picsum.photos/seed/${id}/${w}/${h}`;

const CATEGORIES = ["Project", "Achievement", "Memories"];

const GALLERIES = [
  ["Rapat Perdana Angkatan", "Kumpul pertama seluruh angkatan 2024 di ruang sidang.", 3],
  ["Juara Lomba Robotik", "Tim Teknik Komputer 2024 membawa pulang juara dua.", 2],
  ["Praktikum Mikrokontroler", "Sesi praktikum pertama merakit sensor dan aktuator.", 1],
  ["Malam Keakraban", "Api unggun dan yel-yel sampai tengah malam.", 3],
  ["Workshop Jaringan", "Belajar konfigurasi router dan switch bareng senior.", 1],
  ["Bakti Sosial", "Kegiatan sosial angkatan di daerah Tembalang.", 3],
];

const MAHASISWAS = [
  ["21120124140161", "Ahmad Fauzi Rahman", "Fauzi", "Semarang", "Semarang, 12 March 2005", 250],
  ["21120124140163", "Bagus Dwi Saputra", "Bagus", "Surabaya", "Surabaya, 04 September 2005", 12],
  ["21120124140170", "Citra Ayu Lestari", "Citra", "Bandung", "Bandung, 27 December 2005", 768],
  ["21120124140172", "Dimas Prasetyo", "Dimas", "Yogyakarta", "Yogyakarta, 18 August 2005", 113],
  ["21120124140185", "Eka Nur Fadhilah", "Eka", "Malang", "Malang, 30 June 2005", 445],
];

// Gallery DB — order matters, galleries references categories.
await a.query("TRUNCATE galleries, categories RESTART IDENTITY CASCADE");
await a.query("TRUNCATE carousels RESTART IDENTITY");

for (const name of CATEGORIES) {
  await a.query("INSERT INTO categories (name) VALUES ($1)", [name]);
}
for (let i = 0; i < 3; i++) {
  await a.query("INSERT INTO carousels (img) VALUES ($1)", [photo(`hero-${i}`)]);
}
for (const [title, description, categoryId] of GALLERIES) {
  await a.query(
    "INSERT INTO galleries (title, description, img, category_id) VALUES ($1, $2, $3, $4)",
    [title, description, photo(title, 1200, 800), categoryId]
  );
}

// Biodata DB
await b.query("TRUNCATE mahasiswas");
for (const [nim, nama, panggilan, asal, ttl, mdpl] of MAHASISWAS) {
  await b.query(
    `INSERT INTO mahasiswas
       (nim, nama_lengkap, nama_panggilan, asal, ttl, mdpl, agama, alamat_rumah,
        alamat_kos, hobi, quotes, tempat_makan_fav, email_adress, no_wa, user_ig,
        formal_picture, non_formal_picture)
     VALUES ($1,$2,$3,$4,$5,$6,$7,$8,$9,$10,$11,$12,$13,$14,$15,$16,$17)`,
    [
      nim, nama, panggilan, asal, ttl, mdpl,
      "Islam",
      `Jl. Contoh No. ${mdpl}, ${asal}`,
      "Kos Tembalang, Semarang",
      "Ngoding, futsal, dengerin musik",
      "Sedikit bicara, banyak commit.",
      "Warteg depan kampus",
      `${panggilan.toLowerCase()}@students.undip.ac.id`,
      "628123456789",
      panggilan.toLowerCase(),
      photo(`${nim}-formal`, 800, 800),
      photo(`${nim}-casual`, 800, 1000),
    ]
  );
}

console.log(
  `✓ seeded: ${CATEGORIES.length} categories, 3 carousels, ${GALLERIES.length} galleries, ${MAHASISWAS.length} mahasiswas`
);
