@extends('layouts.app')

@section('main-class', '-archive')

@section('content')
  @parent
  @include('partials.page-header')

  @if (have_posts())
    <div class="listing -wrapper">
      @while(have_posts()) @php(the_post())
        <x-post-tile class="listing__tile" :post-id="get_the_ID()"/>
      @endwhile
    </div>

    <div class="pagination -wrapper">
      {!! get_the_posts_navigation() !!}
    </div>
  @else
    <div class="error-message">
      {{ __('Sorry, no results were found.', 'wps') }}
    </div>
  @endif
@endsection