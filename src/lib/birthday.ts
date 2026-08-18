/** Pure date helpers for the biodata birthday easter egg. */

/** `ttl` is free text like "Semarang, 01 January 2005". Null if unparseable. */
export function parseTtl(ttl?: string | null): Date | null {
  const part = ttl?.split(",")[1]?.trim();
  if (!part) return null;
  const d = new Date(part);
  return Number.isNaN(+d) ? null : d;
}

/** Days from `today` until the next occurrence of that month/day. */
export function daysUntilBirthday(birth: Date, today: Date): number {
  const start = new Date(today.getFullYear(), today.getMonth(), today.getDate());
  const next = new Date(start.getFullYear(), birth.getMonth(), birth.getDate());
  if (next < start) next.setFullYear(next.getFullYear() + 1);
  return Math.round((+next - +start) / 86_400_000);
}
