import { redirect } from "next/navigation";
import Shell from "@/components/shell";
import LoadingGate from "@/components/loading-gate";
import BiodataView from "./biodata-view";
import { getMahasiswa } from "@/lib/queries";

// Reads MongoDB per request; never prerender at build time.
export const dynamic = "force-dynamic";

/** MahasiswaController@index (+ liveSearch, now folded into ?search=) */
export default async function BiodataPage({
  searchParams,
}: {
  searchParams: Promise<{ search?: string; order?: string }>;
}) {  const { search = "", order: rawOrder } = await searchParams;
  const order = rawOrder === "desc" ? "desc" : "asc";

  // Easter egg preserved from the Laravel controller.
  if (search === "sokinpadim") redirect("/secret");

  const items = await getMahasiswa(search, order);

  return (
    <Shell>
      <LoadingGate label="Loading Data Mahasiswa..">
        <BiodataView items={items} search={search} order={order} />
      </LoadingGate>
    </Shell>
  );
}
