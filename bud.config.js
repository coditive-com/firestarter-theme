const fs = require('fs');

/**
 * @typedef {import('@roots/bud').Bud} bud
 *
 * @param {bud} app
 */
module.exports = async (app) => {
  /**
   * Blocks entrypoints
   */
  const blocks = fs.readdirSync(app.path('@src/blocks')).filter(el => "." !== el.charAt(0));
  blocks.forEach(name => {
    app.entry(`block-${name}`, [
      app.path(`@src/blocks/${name}/styles`),
      app.path(`@src/blocks/${name}/scripts`)
    ]);
  });

  app
    /**
     * Application entrypoints
     */
    .entry({
      app: ["@scripts/app", "@styles/app"],
      editor: ["@scripts/editor", "@styles/editor"],
    })

    /**
     * Directory contents to be included in the compilation
     */
    .assets(["images", "svg"])

    /**
     * Matched files trigger a page reload when modified
     */
    .watch(["resources/views/**/*", "app/**/*"])

    /**
     * Proxy origin (`WP_HOME`)
     */
    .proxy("http://firestarter.test")

    /**
     * Development origin
     */
    .serve("http://0.0.0.0:3000")

    /**
     * URI of the `public` directory
     */
    .setPublicPath("/app/themes/sage/public/");
};
