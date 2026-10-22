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

const LOGO_STYLE = `<style>
header .site-logo {
  position: relative;
  display: inline-block;
  margin: 0;
  padding: 5px 18px 14px 18px;
  background: transparent;
  border: none;
  box-shadow: none;
  color: #263238;
  font-size: 40px;
  font-weight: 800;
  line-height: 1.3;
  letter-spacing: 0.08em;
  text-align: center;
}
header .site-logo::after {
  content: "";
  display: block;
  width: 100%;
  height: 4px;
  margin: 10px auto 0 auto;
  background: linear-gradient(90deg,#1565c0 0%,#1976d2 45%,#26c6da 100%);
  border-radius: 4px;
}
header .site-logo a,
header .site-logo a:link,
header .site-logo a:visited,
header .site-logo a:hover,
header .site-logo a:active {
  color: #263238 !important;
  text-decoration: none !important;
}
@media (max-width: 767px) {
  header .site-logo {
    font-size: 30px;
    padding: 4px 12px 11px 12px;
    letter-spacing: 0.07em;
  }
  header .site-logo::after {
    height: 3px;
    margin-top: 8px;
  }
}
</style>`;

async function serveHtml(response) {
  if (!response.ok) return response;
  const type = response.headers.get("content-type") || "";
  if (!type.includes("text/html")) return response;
  return new HTMLRewriter()
    .on("head", { element(element) { element.append(LOGO_STYLE, { html: true }); } })
    .transform(response);
}

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
    const pathInfo = path.match(/^(.*?\.php)\/.+$/i);
    if (pathInfo) {
      url.pathname = pathInfo[1];
      return Response.redirect(url.toString(), 301);
    }

    // The static build creates index.html files, while html_handling is "none".
    if (path.endsWith("/")) {
      url.pathname = path + "index.html";
      return serveHtml(await env.ASSETS.fetch(new Request(url.toString(), request)));
    }

    // Static replacement for the old PHP search endpoint.
    if (path === "/search") {
      url.pathname = "/search.html";
      return serveHtml(await env.ASSETS.fetch(new Request(url.toString(), request)));
    }

    // Keep the visible/public .php URL, but serve the generated .html asset.
    if (/\.php$/i.test(path)) {
      url.pathname = path.replace(/\.php$/i, ".html");
      return serveHtml(await env.ASSETS.fetch(new Request(url.toString(), request)));
    }

    return serveHtml(await env.ASSETS.fetch(request));
  }
};
