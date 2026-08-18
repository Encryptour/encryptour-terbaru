/* Regenerates public/assets/identity/parts/*.png — the source crops sit on
 * canvases of very different sizes, which made the logo/mascot jump around when
 * switching parts. Trim the transparent border, then pad onto one shared canvas.
 * Run with: node scripts/normalise-parts.js */
const sharp = require("sharp");
const fs = require("fs");

const groups = [
  { files: [2, 3, 4, 5, 6, 7, 8].map((n) => [`logo/logo${n}`, `logo${n}`]), w: 340, h: 350 },
  { files: [1, 2, 3, 4, 5, 6].map((n) => [`maskot/mascot${n}`, `mascot${n}`]), w: 350, h: 500 },
];

(async () => {
  fs.mkdirSync("public/assets/identity/parts", { recursive: true });
  for (const g of groups) {
    for (const [src, out] of g.files) {
      const buf = await sharp(`public/assets/identity/${src}.png`)
        .trim({ threshold: 1 })
        .resize(g.w, g.h, { fit: "contain", background: { r: 0, g: 0, b: 0, alpha: 0 } })
        .png({ compressionLevel: 9 })
        .toBuffer();
      fs.writeFileSync(`public/assets/identity/parts/${out}.png`, buf);
    }
  }
  console.log("normalised");
})();
