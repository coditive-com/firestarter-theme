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
      admin: ["@scripts/admin", "@styles/admin"],
      app: ["@scripts/app", "@styles/app"],
      editor: ["@scripts/editor", "@styles/editor"],
    })

    /**
     * Directory contents to be included in the compilation
     */
    .assets(["fonts", "images"])

    /**
     * Matched files trigger a page reload when modified
     */
    .watch(["resources/views/**/*", "app/**/*", "resources/blocks/**/*"])

    /**
     * Proxy origin (`WP_HOME`)
     */
    .proxy("http://firestarter.test")

    /**
     * Development origin
     */
    .serve("http://localhost:3000")
};
