class Block {
  constructor(block) {
    this.el = block;
  }
}

class Testimonial {
  constructor() {
    this.blocks = document.querySelectorAll('[data-block="testimonial"]');

    if (0 !== this.blocks.length) {
      this.blocks.forEach(block => {
        new Block(block);
      });
    }
  }
}

new Testimonial();
