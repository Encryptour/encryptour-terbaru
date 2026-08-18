"use client";

/** Footer "TOP" control — animates via Lenis when it is running, otherwise
 *  falls back to the browser's own smooth scroll. */
export default function ScrollTop() {
  const toTop = () => {
    if (window.__lenis) window.__lenis.scrollTo(0, { duration: 1.4 });
    else window.scrollTo({ top: 0, behavior: "smooth" });
  };

  return (
    <button
      type="button"
      onClick={toTop}
      className="absolute bottom-8 right-2 mr-5 mt-12 grid justify-end text-sm font-semibold transition-transform hover:-translate-y-1 md:text-lg"
    >
      <span>TOP &#8593;</span>
    </button>
  );
}
