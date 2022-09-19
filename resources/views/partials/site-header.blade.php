<header class="site-header -wrapper">
  <div class="site-header__logo" itemscope itemtype="http://schema.org/Organization">
    <a href="{!! home_url( '/' ) !!}" class="site-header__logo-url" itemprop="url" aria-label="{!! get_bloginfo('name') !!}">
      {!! $siteLogo !!}
    </a>
  </div>

  <button id="primary-navigation-toggler" class="site-header__toggler" type="button">
    <span class="side-header__toggler-line"></span>
    <span class="side-header__toggler-line"></span>
    <span class="side-header__toggler-line"></span>
  </button>

  @if (has_nav_menu('primary_navigation'))
    <nav id="primary-navigation" class="site-header__nav">
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