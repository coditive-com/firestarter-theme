class Base {
  constructor() {
    this.blocks = document.querySelectorAll('[data-block="ad"]');

    if (0 !== this.blocks.length) {
      this.blocks.forEach(block => {
        new Block(block);
      });
    }
  }
}
class Block {
  constructor(block) {
    console.log(block);
  }
}

new Base();
