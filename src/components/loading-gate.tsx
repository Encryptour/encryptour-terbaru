"use client";

import { useEffect, useState } from "react";
import Spinner from "./spinner";

/** Brief hold so a page paints in one piece instead of flashing half-loaded. */
export default function LoadingGate({
  label,
  children,
}: {
  label: string;
  children: React.ReactNode;
}) {
  const [ready, setReady] = useState(false);
  useEffect(() => {
    const t = setTimeout(() => setReady(true), 400);
    return () => clearTimeout(t);
  }, []);

  return ready ? <>{children}</> : <Spinner label={label} />;
}
