import { domReady } from '@roots/sage/client';
import Router from '@scripts/modules/Router';

class App {
  constructor() {
    this.router = new Router();
  }
}

async function main(err) {
  if (err) {
    console.error(err);
  }

  await (new App());
}

domReady(main);
import.meta.webpackHot?.accept(main);
