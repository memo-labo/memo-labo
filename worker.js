const LEGACY_REDIRECTS = new Map([
  ["/ocr_gimon2.php", "/ocr_gimon.php"],
  ["/ocr3.php", "/ocr_gimon.php"],
  ["/ocr_shiken2.php", "/ocr_gimon.php"],
  ["/ocr_shiken.php", "/ocr.php"],
  ["/j2.php", "/ocr_gimon.php"],
  ["/uvr-ocr.php", "/ocr_v.php"],
  ["/dgr2.php", "/dgr.php"],
  ["/vt-tr.php", "/dgr.php"],
  ["/qa9.php", "/koutei.php"],
]);

export default {
  async fetch(request, env) {
    const url = new URL(request.url);

    // Keep one canonical public origin for SEO.
    if (url.hostname === "www.memo-labo.com" || url.protocol !== "https:") {
      url.protocol = "https:";
      url.hostname = "memo-labo.com";
      return Response.redirect(url.toString(), 301);
    }

    const path = url.pathname;

    // Preserve the redirects that already exist on the Lolipop site.
    const legacyTarget = LEGACY_REDIRECTS.get(path);
    if (legacyTarget) {
      url.pathname = legacyTarget;
      return Response.redirect(url.toString(), 301);
    }

    // Remove historical PATH_INFO after the first .php component.
    // /ctd.php/1000 -> /ctd.php
    // /j/bou.php/index.php -> /j/bou.php
    const pathInfo = path.match(/^(.*?\.php)\/.+$/i);
    if (pathInfo) {
      url.pathname = pathInfo[1];
      return Response.redirect(url.toString(), 301);
    }

    // Static replacement for the old PHP search endpoint.
    if (path === "/search" || path === "/search/") {
      url.pathname = "/search.html";
      return env.ASSETS.fetch(new Request(url.toString(), request));
    }

    // Keep the visible/public .php URL, but serve the generated .html asset.
    if (/\.php$/i.test(path)) {
      url.pathname = path.replace(/\.php$/i, ".html");
      return env.ASSETS.fetch(new Request(url.toString(), request));
    }

    return env.ASSETS.fetch(request);
  }
};
