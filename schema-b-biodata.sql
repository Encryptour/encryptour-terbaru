-- Neon B — student records for /biodata and /secret
-- Run this in the Neon SQL Editor of project B.

CREATE TABLE IF NOT EXISTS mahasiswas (
  nim                TEXT PRIMARY KEY,
  nama_lengkap       TEXT,
  nama_panggilan     TEXT,
  email_adress       TEXT,
  agama              TEXT,
  asal               TEXT,
  ttl                TEXT,               -- free text: "Semarang, 01 January 2005"
  alamat_rumah       TEXT,
  alamat_kos         TEXT,
  hobi               TEXT,
  quotes             TEXT,
  tempat_makan_fav   TEXT,
  no_wa              TEXT,
  user_ig            TEXT,
  formal_picture     TEXT,               -- absolute image URL
  non_formal_picture TEXT,               -- absolute image URL
  mdpl               INTEGER
);

CREATE INDEX IF NOT EXISTS mahasiswas_mdpl_idx ON mahasiswas (mdpl);
CREATE INDEX IF NOT EXISTS mahasiswas_nama_idx ON mahasiswas (lower(nama_lengkap));

-- INSERT INTO mahasiswas (nim, nama_lengkap, nama_panggilan, asal, ttl, mdpl)
--   VALUES ('21120124140161', 'Nama Lengkap', 'Panggilan', 'Semarang',
--           'Semarang, 01 January 2005', 250);
