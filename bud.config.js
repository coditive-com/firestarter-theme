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
     *
     * Paths are relative to your resources directory
     */
    .entry({
      app: ['@scripts/app', '@styles/app'],
      editor: ['@scripts/editor', '@styles/editor'],
    })

    /**
     * These files should be processed as part of the build
     * even if they are not explicitly imported in application assets.
     */
    .assets('images')

    /**
     * These files will trigger a full page reload
     * when modified.
     */
    .watch('resources/views/**/*', 'app/**/*')

    /**
     * Target URL to be proxied by the dev server.
     *
     * This should be the URL you use to visit your local development server.
     */
    .proxy('http://firestarter.test')

    /**
     * Development URL to be used in the browser.
     */
    .serve('http://0.0.0.0:3000');
};
