<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Button extends Component
{
  public string $class;

  public $text;

  public $href;

  /**
   * @param string $text
   * @param string $href
   *
   * @return void
   */
  public function __construct($class, $text = null, $href = null)
  {
    $this->class = $class;
    $this->text = $text;
    $this->href = $href;
  }

  /**
   * @return \Illuminate\Contracts\View\View|\Closure|string
   */
  public function render()
  {
      return view('components.button');
  }
}
