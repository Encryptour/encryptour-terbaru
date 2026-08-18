import "server-only";
import { neon } from "@neondatabase/serverless";

// Two separate Neon projects:
//   A — photo content (galleries, categories, carousels)
//   B — student records (mahasiswas)
function client(name: string) {
  const url = process.env[name];
  if (!url) throw new Error(`${name} is not set — check .env.local`);
  return neon(url);
}

export const sqlGallery = client("DATABASE_URL_GALLERY");
export const sqlBiodata = client("DATABASE_URL_BIODATA");
