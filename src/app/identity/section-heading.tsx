/** The `.container3` / `.container4` divider heading from identity.blade.php. */
export default function SectionHeading({ title, wide }: { title: string; wide?: boolean }) {
  const c = wide ? "3" : "4";
  return (
    <div className={`container${c}`}>
      <div className={`line-container${c}`}>
        <div className="line" />
        <div className="circle" />
        <h2>{title}</h2>
      </div>
      <div className={`line-container${c}`}>
        <div className="circle" />
        <div className="line" />
      </div>
    </div>
  );
}
