/** Numbered section marker — the identity page's own take on the home divider. */
export default function SectionHeading({ title, index }: { title: string; index: string }) {
  return (
    <div className="mx-auto mb-10 mt-20 flex max-w-5xl items-center gap-3 pl-24 pr-6 font-mono md:gap-4 lg:px-6">
      <span className="shrink-0 text-2xl font-bold text-mocca md:text-5xl">{index}</span>
      <div className="h-[3px] w-6 shrink-0 bg-chocolate/40 md:w-10" />
      <h2 className="whitespace-nowrap text-base font-bold uppercase tracking-[0.15em] text-chocolate md:text-3xl md:tracking-[0.25em]">
        {title}
      </h2>
      <div className="h-px flex-1 bg-[repeating-linear-gradient(to_right,#66391C_0_6px,transparent_6px_12px)] opacity-60" />
    </div>
  );
}
