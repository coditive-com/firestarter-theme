<article class="post-tile">
  <header class="post-tile__header">
    <h4 class="post-tile__heading">
      <a href="{!! get_the_permalink() !!}" class="post-tile__link">
        {!! get_the_title() !!}
      </a>
    </h4>
  </header>

  <footer class="post-tile__footer">
    <p class="post-tile__excerpt">
      {!! get_the_excerpt() !!}
    </p>
  </footer>
</article>
