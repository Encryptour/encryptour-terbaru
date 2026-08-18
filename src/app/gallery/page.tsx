import Shell from "@/components/shell";
import LoadingGate from "@/components/loading-gate";
import GalleryView from "./gallery-view";
import { getGallery } from "@/lib/queries";

// Reads MongoDB per request; never prerender at build time.
export const dynamic = "force-dynamic";

/** GalleryController@index */
export default async function GalleryPage() {
  const { galleries, categories } = await getGallery();

  return (
    <Shell>
      <LoadingGate label="Loading Data Gallery..">
        <GalleryView items={galleries} categories={categories} />
      </LoadingGate>
    </Shell>
  );
}
