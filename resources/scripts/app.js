import {domReady} from '@roots/sage/client';

import Router from "./util/Router";
import common from "./routes/common";
import home from "./routes/home";

/**
 * app.main
 */
const main = async (err) => {
  if (err) {
    // handle hmr errors
    console.error(err);
  }

  // application code
  const routes = new Router({
    common,
    home
  });
  
  routes.loadEvents();
};

/**
 * Initialize
 *
 * @see https://webpack.js.org/api/hot-module-replacement
 */
domReady(main);
import.meta.webpackHot?.accept(main);
