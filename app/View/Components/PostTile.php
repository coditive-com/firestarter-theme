<?php

namespace App\View\Components;

use Illuminate\View\Component;

class PostTile extends Component
{
  public string $class;

  public string $title;

  public string $link;

  public string $excerpt;

  protected $postId;

  /**
   * Create a new component instance.
   *
   * @return void
   */

  public function __construct($class, $postId = null)
  {
    $this->class = $class;
    $this->setTitle(get_the_title($this->postId));
    $this->link = $this->getLink();
    $this->excerpt = $this->getExcerpt();
  }

  private function setTitle(string $title): void
  {
    $this->title = $title;
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
