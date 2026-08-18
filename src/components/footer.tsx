import Image from "next/image";
import Link from "next/link";
import Icon from "./icons";
import ScrollTop from "./scroll-top";

export default function Footer() {
  return (
    <footer className="w-full max-w-full overflow-x-hidden relative font-mono text-vanilla bg-gradient-to-t from-mocca from-50% via-vanilla via-65% to-transparent min-h-[24rem] lg:min-h-[10rem] pb-24 lg:pb-0 shadow-lg">
      <div className="w-full relative mx-auto grid grid-cols-2 lg:grid-cols-4 gap-6 lg:gap-12 mb-12 lg:mb-0 lg:grid-rows-4">
        <div className="row bottom-[20%] lg:static flex row-start-2 mt-20 lg:mt-32 row-span-2 lg:row-start-1 col-span-2 lg:col-span-1 lg:row-span-4 ml-2 sm:ml-16 lg:ml-0">
          <Image
            src="/assets/maskot-encryptour.png"
            alt="Maskot Encryptour"
            width={400}
            height={600}
            quality={70}
            className="h-[250px] md:h-[320px] lg:h-full w-auto object-contain object-bottom float-left"
          />
        </div>

        <div className="col-span-2 row-span-1 row min-h-10 hidden lg:block" />

        <div className="row flex justify-center col-span-2 lg:col-span-1 lg:row-span-4 lg:row-start-2 row-span-1 lg:place-items-start lg:grid lg:mt-36 lg:text-left text-center">
          <h3 className="font-display text-xl md:text-5xl font-bold tracking-tight mb-4">THANKYOU FOR VISITING OUR WEBSITE</h3>
        </div>

        <div className="row row-span-3 lg:row-start-2 mt-10 lg:mt-36">
          <h3 className="text-xs md:text-2xl font-bold tracking-widest mb-4">TEKNIK KOMPUTER UNDIP</h3>
          <p className="text-[10px] md:text-base space-y-2 mb-8">
            Jl. Prof. Soedarto, Tembalang, Kec. Tembalang, Kota Semarang, Jawa Tengah 50275
          </p>
          <a
            href="https://maps.app.goo.gl/kbZWUPbtVNh6ijU26"
            target="_blank"
            rel="noopener noreferrer"
            className="mb-4 font-bold text-vanilla text-sm md:text-lg space-y-16"
          >
            SEE ON MAP <span className="text-sm md:text-lg font-semibold">&#8599;</span>
          </a>
          <a
            href="https://www.instagram.com/tekkom24"
            target="_blank"
            rel="noopener noreferrer"
            className="font-bold hidden text-sm md:text-lg text-vanilla md:block mt-10"
          >
            FOLLOW US <Icon name="instagram" className="size-4 md:size-5" />
          </a>
        </div>

        <div className="row row-span-3 lg:row-start-2 mt-10 lg:mt-36 flex flex-col">
          <h3 className="font-display text-sm md:text-4xl font-bold mb-1 md:mb-4">Our Pages</h3>
          <ul className="text-sm md:text-lg font-normal cursor-pointer">
            {["identity", "biodata", "gallery"].map((p) => (
              <li key={p}>
                <Link href={`/${p}`}>
                  <span className="text-sm md:text-lg font-semibold pr-1">&#8599;</span>
                  {p[0].toUpperCase() + p.slice(1)}
                </Link>
              </li>
            ))}
          </ul>
          <a
            href="https://www.instagram.com/tekkom24"
            target="_blank"
            rel="noopener noreferrer"
            className="font-semibold md:hidden text-xs text-vanilla block mt-4"
          >
            <Icon name="instagram" className="mr-1 size-4" />
            FOLLOW US
          </a>
        </div>
      </div>

      <ScrollTop />

      <div className="w-full h-6 bg-vanilla text-center md:text-sm md:h-8 font-mono text-chocolate text-xs font-light flex items-center justify-center">
        &copy;Encryptour 2025. All right reserved.
      </div>
    </footer>
  );
}
