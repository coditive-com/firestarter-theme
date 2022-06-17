@extends('layouts.app')

@section('main-class', '-archive')

@section('content')
  @parent
  @include('partials.page-header')

  {!! firestarter()->blocks()->block('base')->render(); !!}
  {!! firestarter()->blocks()->block('testimonial')->render(); !!}

  @if (have_posts())
    <div class="listing">
      @while(have_posts()) @php(the_post())
        <x-post-tile class="listing__tile" :post-id="get_the_ID()"/>
      @endwhile
    </div>

    <div class="pagination">
      {!! get_the_posts_navigation() !!}
    </div>
  @else
    <div class="error-message">
      {{ __('Sorry, no results were found.', 'sage') }}
    </div>
  @endif
@endsection
