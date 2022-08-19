import { domReady } from '@roots/sage/client';

class Editor {
}

async function main(err) {
  if (err) {
    console.error(err);
  }

  await (new Editor());
}

domReady(main);
import.meta.webpackHot?.accept(main);
