@extends('frontend.base.main')

@section('body')
    @include('frontend.pages.home.section.hero-area')

    @include('frontend.pages.home.section.featured-categories')

    @include('frontend.pages.home.section.trending-product')

    @include('frontend.pages.home.section.banner')

    @include('frontend.pages.home.section.special-offer')

    @include('frontend.pages.home.section.home-product-list')

    @include('frontend.pages.home.section.brands')

    @include('frontend.pages.home.section.blog-section')
@stop
