class Block {
  constructor(block) {
    this.el = block;
  }
}

class Base {
  constructor() {
    this.blocks = document.querySelectorAll('[data-block="base"]');

    if (0 !== this.blocks.length) {
      this.blocks.forEach(block => {
        new Block(block);
      });
    }
  }
}

new Base();
