<header class="site-header -wrapper">
  <div class="site-header__logo" itemscope itemtype="http://schema.org/Organization">
    <a href="{!! home_url( '/' ) !!}" class="site-header__logo-url" itemprop="url" aria-label="{!! get_bloginfo('name') !!}">
      {!! $siteName !!}
    </a>
  </div>

  <button class="site-header__toggler" type="button" data-main-navigation-toggler>
    <span class="side-header__togler-line"></span>
    <span class="side-header__togler-line"></span>
    <span class="side-header__togler-line"></span>
  </button>

  @if (has_nav_menu('primary_navigation'))
    <nav class="site-header__nav" data-main-navigation-menu>
      {!! 
        wp_nav_menu([
          'theme_location' => 'primary_navigation',
          'container' => false,
          'items_wrap' => '<ul itemscope itemtype="http://www.schema.org/SiteNavigationElement" class="site-header__menu %2$s">%3$s</ul>',
          'depth' => 2,
          'echo' => false
        ])
      !!}
    </nav>
  @endif
</header>
