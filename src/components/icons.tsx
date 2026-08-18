/** Inline SVGs for the few icons the home page needs — avoids pulling the
 *  render-blocking Font Awesome CDN stylesheet + webfont on every page. */
const paths: Record<string, string> = {
  home: "M3 10.5 12 3l9 7.5M5 9.5V21h5v-6h4v6h5V9.5",
  info: "M12 21a9 9 0 1 0 0-18 9 9 0 0 0 0 18ZM12 8h.01M11 12h1v5h1",
  users: "M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2M9 11a4 4 0 1 0 0-8 4 4 0 0 0 0 8M22 21v-2a4 4 0 0 0-3-3.87",
  image: "M3 5h18v14H3zM3 16l5-5 4 4 3-3 6 6",
  mail: "M3 6h18v12H3zM3 7l9 6 9-6",
  whatsapp:
    "M21 11.5a8.5 8.5 0 0 1-12.7 7.4L3 21l2.2-5.1A8.5 8.5 0 1 1 21 11.5ZM8.6 8.2c.3-.6 1.2-.5 1.4 0l.6 1.4c.1.3 0 .6-.2.8l-.5.5c.6 1.1 1.5 2 2.6 2.6l.5-.5c.2-.2.5-.3.8-.2l1.4.6c.5.2.6 1.1 0 1.4-2.3 1.3-6.9-2.6-6.6-6.6Z",
  close: "M6 6l12 12M18 6 6 18",
  instagram:
    "M7 2h10a5 5 0 0 1 5 5v10a5 5 0 0 1-5 5H7a5 5 0 0 1-5-5V7a5 5 0 0 1 5-5ZM12 8.5a3.5 3.5 0 1 0 0 7 3.5 3.5 0 0 0 0-7ZM17.5 6.5h.01",
};

export default function Icon({ name, className = "size-4" }: { name: string; className?: string }) {
  return (
    <svg
      viewBox="0 0 24 24"
      fill="none"
      stroke="currentColor"
      strokeWidth={1.8}
      strokeLinecap="round"
      strokeLinejoin="round"
      className={`inline-block ${className}`}
      aria-hidden="true"
    >
      <path d={paths[name]} />
    </svg>
  );
}
