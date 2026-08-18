# ENCRYPTOUR

Website angkatan **Teknik Komputer Universitas Diponegoro 2024** — ENgineers of Computer, Young
Pioneers Twenty fOUR.

Next.js 15 (App Router) + TypeScript + Tailwind, data dari dua project Neon Postgres.
Sebelumnya aplikasi Laravel/Blade, sekarang sudah sepenuhnya dimigrasi.

## Jalankan di lokal

Butuh **Node 20+** (script pakai `node --env-file`).

```bash
npm install
cp .env.example .env.local   # lalu isi kedua connection string
npm run dev                  # http://localhost:3000
```

`.env.local` tidak ikut ter-commit. Minta connection string ke pengurus repo, atau bikin project
Neon sendiri lalu jalankan `npm run db:setup` + `npm run db:seed`.

## Script

| Perintah | Fungsi |
|---|---|
| `npm run dev` | Dev server |
| `npm run build` | Production build (sekaligus type-check) |
| `npm run start` | Jalankan hasil build |
| `npm run lint` | ESLint |
| `npm run db:setup` | Apply `schema-a-gallery.sql` + `schema-b-biodata.sql` ke Neon |
| `npm run db:seed` | Isi data awal |
| `node scripts/normalise-parts.js` | Regenerate aset potongan logo/maskot halaman Identity |
| `node --test src/lib/birthday.test.mjs` | Test helper ulang tahun |

## Database

Dua project Neon terpisah, masing-masing punya connection string sendiri:

| Env | Isi | Dipakai halaman |
|---|---|---|
| `DATABASE_URL_GALLERY` | `galleries`, `categories`, `carousels` | `/`, `/gallery` |
| `DATABASE_URL_BIODATA` | `mahasiswas` | `/biodata`, `/secret` |

Client-nya dibuat sekali di `src/lib/db.ts` (`sqlGallery`, `sqlBiodata`). **Semua query hidup di
`src/lib/queries.ts`** — jangan query langsung dari komponen. Query pakai tagged template dari
`@neondatabase/serverless`, jadi nilainya otomatis jadi bound parameter (aman dari SQL injection);
kalau butuh sesuatu yang tidak bisa di-parameter (misal arah `ORDER BY`), pilih dari beberapa
statement tetap seperti yang sudah dilakukan di `getMahasiswa`.

Halaman yang baca DB pakai `export const dynamic = "force-dynamic"` supaya tidak ikut ter-prerender
saat build.

## Struktur

```
src/app/
  page.tsx           # Home: hero carousel, about, gallery
  identity/          # Visi-misi, palette, logo & maskot explorer, yel-yel, jargon
  biodata/           # Grid anggota + modal profil (search, sort, pagination)
  gallery/           # Galeri lengkap
  secret/            # Easter egg: ketik "sokinpadim" di search biodata
  loading.tsx        # Layar loading saat pindah halaman
src/components/      # Dipakai lintas halaman (navbar, footer, carousel, dll)
src/lib/             # db, queries, types, helper
scripts/             # Setup DB, seed, normalisasi aset
public/              # Gambar statis
```

## Konvensi UI

Ikuti pola yang sudah ada supaya tampilannya konsisten:

- **Warna** (di `tailwind.config.ts`): `chocolate` `#66391C`, `vanilla` `#F9ECDC`, `mocca` `#AD7D4F`,
  `cards` `#F2E5BF`. Jangan pakai warna di luar ini tanpa alasan.
- **Font**: `font-display` (Space Grotesk) untuk judul besar, `font-mono` (JetBrains Mono) untuk
  hampir semua teks lain — temanya "ala kode". Label kecil pakai pola `&gt; NAMA_SECTION`.
- **Navbar**: pill mengambang di atas untuk `lg+`, rail vertikal kiri untuk mobile/tablet. Konten
  di bawah `lg` perlu `pl-24` supaya tidak ketutupan rail.
- **Ikon**: SVG inline di `src/components/icons.tsx`. Proyek ini sengaja **tidak** pakai icon font
  atau CSS dari CDN — itu render-blocking.
- **Animasi masuk**: bungkus dengan `<Reveal>`; scroll halus ditangani Lenis di `SmoothScroll`.

## Catatan performa

Halaman ini pernah berat, jadi tolong jaga hal-hal berikut:

- **Kompres gambar sebelum commit.** Logo awalnya 9 MB PNG dan itu penyebab utama. Aset lokal besar
  wajib diperkecil (`sharp`) dan diekspor ke WebP.
- **Hindari `backdrop-blur` pada elemen yang banyak atau yang menempel saat scroll** — filternya
  dihitung ulang tiap frame. Dulu ini yang bikin grid galeri patah-patah.
- **Jangan transisi properti layout** (`width`, `height`, `padding`, `font-size`). Pakai `transform`
  dan `opacity` — lihat animasi mengecilnya navbar.
- Komponen berat yang hanya tampil di mobile di-`dynamic(..., { ssr: false })`, contohnya
  `mobile-gallery.tsx`.
- Cek `npm run build` untuk melihat ukuran bundle sebelum dan sesudah perubahan.

## Deploy

Vercel. Set `DATABASE_URL_GALLERY` dan `DATABASE_URL_BIODATA` di Environment Variables project,
lalu push ke `main`.

## Kontribusi

1. Bikin branch dari `main`.
2. Pastikan `npm run build` lolos (build sekalian type-check) sebelum push.
3. Jangan pernah commit `.env*` atau connection string — semuanya sudah di-`.gitignore`.
4. Kalau kamu menyentuh data anggota, ingat isinya data pribadi teman-teman sendiri: jangan
   dibagikan ke luar repo.
