import { domReady } from '@roots/sage/client';

class Admin {
}

async function main(err) {
  if (err) {
    console.error(err);
  }

  await (new Admin());
}

domReady(main);
import.meta.webpackHot?.accept(main);
