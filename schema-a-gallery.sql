-- Neon A — photo content for / and /gallery
-- Run this in the Neon SQL Editor of project A.

CREATE TABLE IF NOT EXISTS categories (
  id   SERIAL PRIMARY KEY,
  name TEXT NOT NULL UNIQUE
);

CREATE TABLE IF NOT EXISTS galleries (
  id          SERIAL PRIMARY KEY,
  title       TEXT NOT NULL,
  description TEXT,
  img         TEXT NOT NULL,              -- absolute image URL
  category_id INTEGER REFERENCES categories(id) ON DELETE SET NULL,
  created_at  TIMESTAMPTZ NOT NULL DEFAULT now()
);

CREATE INDEX IF NOT EXISTS galleries_created_at_idx ON galleries (created_at DESC);

CREATE TABLE IF NOT EXISTS carousels (
  id  SERIAL PRIMARY KEY,
  img TEXT NOT NULL                       -- absolute image URL
);

-- Sample rows so the pages render something immediately.
-- INSERT INTO categories (name) VALUES ('Project'), ('Achievement'), ('Memories');
-- INSERT INTO carousels (img) VALUES ('https://example.com/hero.jpg');
-- INSERT INTO galleries (title, description, img, category_id)
--   VALUES ('Judul', 'Deskripsi', 'https://example.com/foto.jpg', 1);
