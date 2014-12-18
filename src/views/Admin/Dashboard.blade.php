@extends('core::Admin/Base')

@section('content')

<aside class="right-side">
  <section class="content-header">
    <h1>Dashboard</h1>
  </section>

  <section class="content">
    <a href="{{ route(Config::get('core::adminURL') .'.'. Config::get('blog::postURL') .'.index') }}" class="btn btn-app">
      <i class="fa fa-envelope"></i>
      <span>{{ Lang::get('blog::post.plural') }}</span>
    </a>

    <a href="{{ route(Config::get('core::adminURL') .'.'. Config::get('blog::categoryURL') .'.index') }}" class="btn btn-app">
      <i class="fa fa-envelope"></i>
      <span>{{ Lang::get('blog::category.plural') }}</span>
    </a>

    <a href="{{ route(Config::get('core::adminURL') .'.'. Config::get('page::pageURL') .'.index') }}" class="btn btn-app">
      <i class="fa fa-file-text"></i>
      <span>{{ Lang::get('page::page.plural') }}</span>
    </a>
  </section>
</aside>

@stop