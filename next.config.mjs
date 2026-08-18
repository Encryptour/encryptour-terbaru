/** @type {import('next').NextConfig} */
export default {
  images: {
    // Gallery/carousel img fields are absolute URLs from the DB.
    remotePatterns: [{ protocol: "https", hostname: "**" }],
  },
  async redirects() {
    // The login gate was removed; keep old bookmarks from hitting a 404.
    return [{ source: "/login", destination: "/", permanent: false }];
  },
};
