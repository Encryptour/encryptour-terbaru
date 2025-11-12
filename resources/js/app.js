import Alpine from "alpinejs";
import { track } from "@vercel/analytics";
import { inject } from "@vercel/analytics";

Alpine.start();

track("pageview", {
  url: window.location.href,
});
inject();
