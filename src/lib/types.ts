export type Category = { id: number; name: string };

export type GalleryItem = {
  id: number;
  title: string;
  description: string | null;
  img: string;
  category_name: string | null;
};

export type CarouselItem = { id: number; img: string };

export type Mahasiswa = {
  nim: string;
  email_adress: string | null;
  nama_lengkap: string | null;
  nama_panggilan: string | null;
  agama: string | null;
  asal: string | null;
  ttl: string | null;
  alamat_rumah: string | null;
  alamat_kos: string | null;
  hobi: string | null;
  quotes: string | null;
  tempat_makan_fav: string | null;
  no_wa: string | null;
  user_ig: string | null;
  formal_picture: string | null;
  non_formal_picture: string | null;
  mdpl: number | null;
};
