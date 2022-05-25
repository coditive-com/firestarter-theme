import { domReady } from '@roots/sage/client';

const main = async(err) => {
  if (err) {
    console.error(err);
  }

  console.log('lorem ipsum');
};

/**
 * Initialize
 *
 * @see https://webpack.js.org/api/hot-module-replacement
 */
domReady(main);
import.meta.webpackHot?.accept(main);
