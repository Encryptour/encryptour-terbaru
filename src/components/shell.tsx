import Navbar from "./navbar";
import SmoothScroll from "./smooth-scroll";
import Footer from "./footer";

/** Equivalent of resources/views/components/app-layout.blade.php */
export default function Shell({ children }: { children: React.ReactNode }) {
  return (
    <div className="flex flex-col">
      <SmoothScroll />
      <Navbar />
      <main className="min-h-screen">{children}</main>
      <Footer />
    </div>
  );
}
