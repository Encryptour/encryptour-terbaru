import "server-only";
import { sqlBiodata, sqlGallery } from "./db";
import { daysUntilBirthday, parseTtl } from "./birthday";
import type { CarouselItem, Category, GalleryItem, Mahasiswa } from "./types";

// Values in tagged templates are sent to Postgres as bound parameters, never
// spliced into the SQL text. `ORDER BY` direction cannot be a parameter, so it
// is picked from a fixed pair of statements instead of being interpolated.

/** HomeController@index — Neon A */
export async function getHome() {
  const [galleries, carousels] = await Promise.all([
    sqlGallery`
      SELECT g.id, g.title, g.description, g.img, c.name AS category_name
      FROM galleries g
      LEFT JOIN categories c ON c.id = g.category_id
      ORDER BY g.created_at DESC
      LIMIT 6
    ` as unknown as Promise<GalleryItem[]>,
    sqlGallery`SELECT id, img FROM carousels ORDER BY id` as unknown as Promise<CarouselItem[]>,
  ]);
  return { galleries, carousels };
}

/** GalleryController@index — Neon A */
export async function getGallery() {
  const [galleries, categories] = await Promise.all([
    sqlGallery`
      SELECT g.id, g.title, g.description, g.img, c.name AS category_name
      FROM galleries g
      LEFT JOIN categories c ON c.id = g.category_id
      ORDER BY g.created_at DESC
    ` as unknown as Promise<GalleryItem[]>,
    sqlGallery`SELECT id, name FROM categories ORDER BY name` as unknown as Promise<Category[]>,
  ]);
  return { galleries, categories };
}

/** MahasiswaController@index — Neon B. Empty search matches everything. */
export async function getMahasiswa(search = "", order: "asc" | "desc" = "asc") {
  const term = `%${escapeLike(search)}%`;
  const rows =
    order === "desc"
      ? await sqlBiodata`
          SELECT * FROM mahasiswas
          WHERE ${search} = '' OR nama_lengkap ILIKE ${term}
          ORDER BY mdpl DESC NULLS LAST`
      : await sqlBiodata`
          SELECT * FROM mahasiswas
          WHERE ${search} = '' OR nama_lengkap ILIKE ${term}
          ORDER BY mdpl ASC NULLS LAST`;
  return rows as unknown as Mahasiswa[];
}

/** The `sokinpadim` easter egg: birthdays within the next 30 days — Neon B. */
export async function getUpcomingBirthdays() {
  const rows = (await sqlBiodata`
    SELECT nim, nama_lengkap, ttl FROM mahasiswas
  `) as unknown as Pick<Mahasiswa, "nim" | "nama_lengkap" | "ttl">[];
  const today = new Date();

  return rows
    .map((m) => {
      const birth = parseTtl(m.ttl);
      if (!birth) return null;
      return {
        nim: m.nim,
        nama: m.nama_lengkap ?? "",
        day: birth.getDate(),
        month: birth.getMonth(),
        days_left: daysUntilBirthday(birth, today),
      };
    })
    .filter((x): x is NonNullable<typeof x> => !!x && x.days_left <= 30)
    .sort((a, b) => a.days_left - b.days_left);
}

/** Keep a literal % or _ typed in the search box from acting as a wildcard. */
function escapeLike(s: string) {
  return s.replace(/[\\%_]/g, "\\$&");
}
