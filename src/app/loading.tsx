import Spinner from "@/components/spinner";

/** Shown by Next while a route's server components resolve — covers the gap
 *  between clicking a nav link and the next page painting. */
export default function Loading() {
  return <Spinner label="Loading.." />;
}
