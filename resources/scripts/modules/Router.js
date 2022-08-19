import Common from '@scripts/routes/Common';
import { toCamelCase } from '@scripts/utils/string';

class Router {
  constructor() {
    this.routes = {
      common: new Common(),
    };

    this.loadRoutes();
  }

  loadRoutes() {
    this.fireRoute('common', 'init');

    this.getCurrentRoutes().forEach((route) => {
      this.fireRoute(route, 'init');
      this.fireRoute(route, 'finalize');
    });

    this.fireRoute('common', 'finalize');
  }

  fireRoute(route, event, arg) {
    if ('object' !== typeof this.routes[route]) {
      return;
    }

    if ('function' !== typeof this.routes[route][event]) {
      return;
    }

    this.routes[route][event](arg);
  }

  getCurrentRoutes() {
    return document.body.className
      .toLowerCase()
      .replace(/-/g, '_')
      .split(/\s+/)
      .map(toCamelCase);
  }
}

export default Router;
