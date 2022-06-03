<a class="sr-only focus:not-sr-only" href="#main">
  {{ __('Skip to content') }}
</a>

@include('sections.site-header')

  <main id="main" class="main">
    @yield('content')
  </main>

@include('sections.site-footer')
