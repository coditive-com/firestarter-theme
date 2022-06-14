<article class="{{ $class }} post-tile">
  <header class="post-tile__header">
    <h4 class="post-tile__heading">
      <a href="{{ $link }}" class="post-tile__link">
        {{ $title }}
      </a>
    </h4>
  </header>

  @if (! empty($excerpt))
    <p class="post-tile__excerpt">
      {!! $excerpt !!}
    </p>
  @endif
</article>