<a class="sr-only focus:not-sr-only" href="#main">
  {{ __('Skip to content') }}
</a>

@include('sections.site-header')

  <main id="main" class="-wrapper @yield('main-class')">
    @yield('content')
  </main>

@include('sections.site-footer')
