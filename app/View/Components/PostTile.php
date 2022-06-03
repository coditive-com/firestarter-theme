<?php

namespace App\View\Components;

use Illuminate\View\Component;

class PostTile extends Component
{
  public $class;
  public $title;
  public $link;
  public $excerpt;
  protected $postId;

  /**
   * Create a new component instance.
   *
   * @return void
   */

  public function __construct($class, $postId = null)
  {
    $this->class = $class;
    $this->title = $this->getTitle();
    $this->link = $this->getLink();
    $this->excerpt = $this->getExcerpt();
  }

  protected function getTitle()
  {
    return get_the_title($this->postId);
  }

  protected function getLink()
  {
    return get_the_permalink($this->postId);
  }

  protected function getExcerpt()
  {
    return get_the_excerpt($this->postId);
  }

  /**
   * Get the view / contents that represent the component.
   *
   * @return \Illuminate\Contracts\View\View|\Closure|string
   */
  public function render()
  {
      return view('components.post-tile');
  }
}
