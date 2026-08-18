import Link from "next/link";
import Shell from "@/components/shell";
import LoadingGate from "@/components/loading-gate";
import HeroCarousel from "@/components/hero-carousel";
import AboutCarousel from "@/components/about-carousel";
import GalleryCard from "@/components/gallery-card";
import Reveal from "@/components/reveal";
import MobileGallery from "@/components/mobile-gallery";
import { getHome } from "@/lib/queries";

// Reads MongoDB per request; never prerender at build time.
export const dynamic = "force-dynamic";

/** HomeController@index */
export default async function HomePage() {
  const { galleries, carousels } = await getHome();

  return (
    <Shell>
      <LoadingGate label="Loading Data Home..">
        <section id="carousel-gambar">
          <HeroCarousel items={carousels} />
        </section>

        <section id="aboutUs">
          <Reveal>
            <AboutCarousel />
          </Reveal>
        </section>

        <Reveal>
          {/* Section divider, terminal-flavoured */}
          <div className="mx-auto my-16 md:my-24 flex max-w-5xl items-center gap-4 pl-24 pr-6 lg:px-6 font-mono text-chocolate">
            <span className="border border-chocolate/40 px-2 py-1 text-[10px] font-bold tracking-[0.3em] md:text-xs">
              &lt;/about&gt;
            </span>
            <div className="h-[3px] flex-1 bg-[repeating-linear-gradient(to_right,#66391C_0_10px,transparent_10px_18px)]" />
            <span className="border border-chocolate/40 px-2 py-1 text-[10px] font-bold tracking-[0.3em] md:text-xs">
              &lt;gallery&gt;
            </span>
          </div>
        </Reveal>

        <section id="Gallery" className="container mx-auto mt-20 py-4 pl-24 pr-6 lg:px-6">
          <Reveal>
          <p className="mb-2 font-mono text-xs tracking-[0.3em] text-mocca">&gt; ls ./gallery</p>
          <h1 className="mb-4 font-display text-4xl font-bold tracking-tight text-chocolate md:mb-6 md:text-6xl">
            GALLERY
          </h1>
          <p className="mb-8 max-w-3xl font-mono text-sm leading-relaxed text-chocolate/70">
            A collection of exciting moments, from projects, achievements, to other memories. Choose a
            category below to check it all out!
          </p>
          </Reveal>

          <div className="hidden lg:grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            {galleries.map((item, i) => (
              <Reveal key={item.id} delay={(i % 3) * 100}>
                <Link
                  href="/gallery"
                  className="relative block h-80 w-full overflow-hidden rounded-lg shadow-lg"
                >
                  <GalleryCard item={item} />
                </Link>
              </Reveal>
            ))}
          </div>

          <div className="lg:hidden">
            <MobileGallery items={galleries} />
          </div>
        </section>
      </LoadingGate>
    </Shell>
  );
}
