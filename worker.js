export default {
  async fetch(request, env) {
    const url = new URL(request.url);
    const path = url.pathname;

    // Remove legacy PATH_INFO after .php while preserving the public .php URL.
    // Example: /ctd.php/1000 -> /ctd.php
    const pathInfo = path.match(/^(.*\.php)\/.+$/i);
    if (pathInfo) {
      url.pathname = pathInfo[1];
      return Response.redirect(url.toString(), 301);
    }

    // Keep the visible/public .php URL, but serve the generated static .html asset.
    // Example: /dt.php -> /dt.html internally.
    if (/\.php$/i.test(path)) {
      url.pathname = path.replace(/\.php$/i, ".html");
      return env.ASSETS.fetch(new Request(url.toString(), request));
    }

    return env.ASSETS.fetch(request);
  }
};
