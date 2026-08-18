import "server-only";
import { neon, type NeonQueryFunction } from "@neondatabase/serverless";

// Two separate Neon projects:
//   A — photo content (galleries, categories, carousels)
//   B — student records (mahasiswas)
//
// Connections are created on first query, not at import time. Next collects page
// data during `next build`, which imports this module; connecting eagerly made
// the whole build fail when an env var was missing — and it failed for pages
// that never touch that database.
function lazy(name: string): NeonQueryFunction<false, false> {
  let sql: NeonQueryFunction<false, false> | undefined;
  return ((...args: unknown[]) => {
    if (!sql) {
      const url = process.env[name];
      if (!url) throw new Error(`${name} is not set — check .env.local`);
      sql = neon(url);
    }
    return (sql as unknown as (...a: unknown[]) => unknown)(...args);
  }) as unknown as NeonQueryFunction<false, false>;
}

export const sqlGallery = lazy("DATABASE_URL_GALLERY");
export const sqlBiodata = lazy("DATABASE_URL_BIODATA");
