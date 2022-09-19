@extends('layouts.app')

@section('content')
  @include('partials.page-header')

  @if (! have_posts())
    <x-alert type="warning">
      {!! __('Sorry, but the page you are trying to view does not exist.', 'firestarter') !!}
    </x-alert>

    {!! get_search_form(false) !!}
  @endif
@endsection
