import { defineConfig } from "vite";
import { resolve } from "node:path";
import { fileURLToPath } from "node:url";

const themeRoot = fileURLToPath(new URL(".", import.meta.url));

export default defineConfig({
  base: "./",
  plugins: [
    {
      name: "reload-wordpress-templates",
      configureServer(server) {
        server.watcher.add(themeRoot);
        server.watcher.on("change", (file) => {
          if (file.endsWith(".php")) {
            server.ws.send({ type: "full-reload" });
          }
        });
      },
    },
  ],
  server: {
    host: "127.0.0.1",
    origin: "http://127.0.0.1:5173",
    port: 5173,
    strictPort: true,
    watch: { usePolling: true, interval: 300 },
  },
  build: {
    outDir: "assets/dist",
    emptyOutDir: false,
    rollupOptions: {
      input: {
        global: resolve(themeRoot, "scss/entries/global.scss"),
        shop: resolve(themeRoot, "scss/entries/shop.scss"),
        blog: resolve(themeRoot, "scss/entries/blog.scss"),
      },
      output: { assetFileNames: "[name][extname]" },
    },
  },
});

/*
VITE SETUP MANUAL (traditional server-rendered projects such as WordPress)

1. Install Node.js and run `npm init -y` in the project root if there is no
   package.json. Install Vite with `npm install --save-dev vite`. Add `sass` as
   a dev dependency too if the project uses .scss files.

2. Add package.json scripts:
     "dev": "vite --host 127.0.0.1",
     "build": "vite build"
   Use vite.config.mjs for ESM syntax when package.json uses CommonJS.

3. Create vite.config.mjs. Set the server host and port, build.outDir, and
   rollupOptions.input to match the project's real asset entry files. Here,
   global.scss and shop.scss build to assets/dist/global.css and shop.css.
   Use server.origin for assets served inside a backend page, and a relative
   base for production files whose URL is nested under the backend site.
   `emptyOutDir: false` preserves other files already in assets/dist.
   On Windows, `watch.usePolling` helps detect saves missed by the native watcher.

4. In the server-rendered page, load two module scripts during development:
     http://127.0.0.1:5173/@vite/client
     http://127.0.0.1:5173/scss/entries/global.scss
   Change the second URL to the project's entry file. In this WordPress theme,
   inc/theme-setup.php prints both through wp_head when the local Vite server
   is reachable. The site still opens at its normal WordPress URL.

5. For production, enqueue the built CSS/JS from build.outDir instead of
   loading Vite's development URLs. This theme falls back to
   assets/dist/global.css when Vite is stopped. For hashed output filenames,
   enable Vite's build manifest and read it in the backend.

6. Run `npm run dev` once and leave it running. Open the normal site URL,
   save a stylesheet, and watch the browser update. The plugin above refreshes
   the whole page for PHP template changes. Run `npm run build`
   before publishing to generate production assets.

7. If a style does not update, confirm the Vite terminal reports the change,
   the browser loads /@vite/client, and the stylesheet entry URL returns 200.
   Check that the site's development URL and Vite host are reachable from the
   same browser. Update the port in both this file and inc/theme-setup.php if
   port 5173 is unavailable.

For a static HTML app, Vite can serve index.html directly; step 4's backend
script injection and step 5's backend enqueue logic are unnecessary.
*/
