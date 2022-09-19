<footer class="site-footer -wrapper">
  <div class="site-footer__widgets">
    @php(dynamic_sidebar('sidebar-footer'))
  </div>

  @if (! empty($siteCopyrights)) 
    <p class="site-footer__copyrights">
      {!! $siteCopyrights !!}
    </p>
  @endif
</footer>