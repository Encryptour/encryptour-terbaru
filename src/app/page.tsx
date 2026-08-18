import Link from "next/link";
import Shell from "@/components/shell";
import LoadingGate from "@/components/loading-gate";
import HeroCarousel from "@/components/hero-carousel";
import AboutCarousel from "@/components/about-carousel";
import GalleryCard from "@/components/gallery-card";
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
          <AboutCarousel />
        </section>

        <div className="flex my-20 md:my-32 items-center justify-center">
          <div className="w-1/4 md:w-1/3 h-1 bg-chocolate shadow-lg" />
          <div className="w-4 rounded-full bg-chocolate h-4 shadow-xl" />
          <div className="text-2xl md:text-4xl md:w-1/3 w-2/4 font-bold flex justify-center text-chocolate">
            <h2>Our Gallery</h2>
          </div>
          <div className="w-4 rounded-full bg-chocolate h-4 shadow-xl" />
          <div className="w-1/4 md:w-1/3 h-1 bg-chocolate shadow-lg" />
        </div>

        <section id="Gallery" className="container mx-auto mt-20 py-4 px-6">
          <h1 className="text-4xl md:text-5xl font-extrabold text-start mb-4 md:mb-8 text-chocolate">
            GALLERY
          </h1>
          <p className="max-w-4xl text-chocolate font-medium md:font-semibold md:text-base text-sm leading-relaxed mb-6">
            A collection of exciting moments, from projects, achievements, to other memories. Choose a
            category below to check it all out!
          </p>

          <div className="hidden lg:grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            {galleries.map((item) => (
              <Link
                key={item.id}
                href="/gallery"
                className="relative w-full h-80 rounded-lg shadow-lg overflow-hidden block"
              >
                <GalleryCard item={item} />
              </Link>
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
