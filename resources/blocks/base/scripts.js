class Block {
  constructor(block) {
    this.el = block;
  }
}

document.querySelectorAll('[data-block="base"]').forEach((block) => {
  new Block(block);
});
