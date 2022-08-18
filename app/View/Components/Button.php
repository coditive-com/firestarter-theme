<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Button extends Component
{
  public $class;

  public $text;

  public $href;

  public $target;

  /**
   * @param string $class
   * @param string $text
   * @param string $href
   * @param string $target
   * @return void
   */
  public function __construct($class = '', $text = '', $href = '', $target = '_self')
  {
    $this->class = $class;
    $this->text = $text;
    $this->href = $href;
    $this->target = $target;
  }

  /**
   * @return \Illuminate\Contracts\View\View|\Closure|string
   */
  public function render()
  {
      return view('components.button');
  }
}
