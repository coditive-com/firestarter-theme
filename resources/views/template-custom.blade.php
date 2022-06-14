{{--
  Template Name: Custom Template
--}}

@extends('layouts.app')

@section('main-class', '-custom')

@section('content')
  @while(have_posts()) @php(the_post())
    @include('partials.page-header')
    @include('partials.content-page')
  @endwhile
@endsection
