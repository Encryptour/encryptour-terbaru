// Applies the schema files to both Neon projects.
// Usage: npm run db:setup   (reads DATABASE_URL_* from .env.local)
import { readFileSync } from "node:fs";
import { neon } from "@neondatabase/serverless";

const targets = [
  ["DATABASE_URL_GALLERY", "schema-a-gallery.sql", "Neon A (gallery)"],
  ["DATABASE_URL_BIODATA", "schema-b-biodata.sql", "Neon B (biodata)"],
];

for (const [envName, file, label] of targets) {
  const url = process.env[envName];
  if (!url) {
    console.error(`✗ ${label}: ${envName} is not set in .env.local`);
    process.exitCode = 1;
    continue;
  }

  const sql = neon(url);
  // ponytail: naive split on ';' — fine for these DDL files, which contain no
  // functions, triggers or semicolons inside string literals.
  const statements = readFileSync(file, "utf8")
    .replace(/^\s*--.*$/gm, "")
    .split(";")
    .map((s) => s.trim())
    .filter(Boolean);

  try {
    for (const statement of statements) await sql.query(statement);
    console.log(`✓ ${label}: ${statements.length} statements applied`);
  } catch (err) {
    // Never echo the connection string.
    console.error(`✗ ${label}: ${err.message}`);
    process.exitCode = 1;
  }
}
