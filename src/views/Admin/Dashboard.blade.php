@extends('core::Admin/Base')

@section('content')

<aside class="right-side">
  <section class="content-header">
    <h1>Dashboard</h1>
  </section>

  <section class="content">
    <a href="{{ route(config('core.adminURL') .'.'. config('post.postURL') .'.index') }}" class="btn btn-app">
      <i class="fa fa-envelope"></i>
      <span>{{ trans('blog::post.plural') }}</span>
    </a>

    <a href="{{ route(config('core.adminURL') .'.'. config('category.categoryURL') .'.index') }}" class="btn btn-app">
      <i class="fa fa-envelope"></i>
      <span>{{ trans('blog::category.plural') }}</span>
    </a>

    <a href="{{ route(config('core.adminURL') .'.'. config('page.pageURL') .'.index') }}" class="btn btn-app">
      <i class="fa fa-file-text"></i>
      <span>{{ trans('page::page.plural') }}</span>
    </a>
  </section>
</aside>

@stop