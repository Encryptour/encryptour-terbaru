import Image from "next/image";
import Link from "next/link";

export default function Footer() {
  return (
    <footer className="min-w-full relative text-vanilla bg-gradient-to-t from-mocca from-50% via-vanilla via-65% to-transparent min-h-[10rem] shadow-lg md:pr-0">
      <div className="min-w-full relative mx-auto grid grid-cols-4 gap-4 md:gap-12 grid-rows-3 mb-12 md:mb-0 md:grid-rows-4">
        <div className="row bottom-[20%] md:static flex row-start-2 mt-32 row-span-2 md:row-start-1 col-span-2 md:col-span-1 md:row-span-4 ml-2 sm:ml-16 md:ml-0">
          <Image
            src="/assets/maskot-encryptour.png"
            alt="Maskot Encryptour"
            width={400}
            height={600}
            className="h-[250px] md:h-full w-auto float-left"
          />
        </div>

        <div className="col-span-2 row-span-1 row min-h-10" />

        <div className="row flex justify-center col-span-4 md:col-span-1 md:row-span-4 md:row-start-2 row-span-1 md:place-items-start md:grid md:mt-36 md:text-left text-center">
          <h3 className="text-xl md:text-5xl font-bold mb-4">THANKYOU FOR VISITING OUR WEBSITE</h3>
        </div>

        <div className="row row-span-3 row-start-2 mt-48 md:mt-36">
          <h3 className="text-xs md:text-2xl font-bold mb-4">TEKNIK KOMPUTER UNDIP</h3>
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
            FOLLOW US <span className="text-sm md:text-lg font-semibold fa fa-instagram" />
          </a>
        </div>

        <div className="row row-span-3 row-start-2 mt-48 md:mt-36 flex flex-col">
          <h3 className="font-bold text-sm md:text-4xl mb-1 md:mb-4">Our Pages</h3>
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
            <span className="text-sm font-normal px-1 fa fa-instagram" />
            FOLLOW US
          </a>
        </div>
      </div>

      <a href="#" className="font-semibold absolute text-sm md:text-lg mt-12 bottom-8 right-2 grid mr-5 justify-end">
        <span>TOP &#8593;</span>
      </a>

      <div className="w-full h-6 bg-vanilla text-center md:text-sm md:h-8 text-chocolate text-xs font-light flex items-center justify-center">
        &copy;Encryptour 2025. All right reserved.
      </div>
    </footer>
  );
}
