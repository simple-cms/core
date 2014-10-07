@extends('core::Admin/Base')

@section('content')

<aside class="right-side">
  <section class="content-header">
    <h1>Dashboard</h1>
  </section>

  <section class="content">
    <a href="{{ route('control.post.index') }}" class="btn btn-app">
      <i class="fa fa-envelope"></i>
      <span>{{ Lang::get('blog::post.plural') }}</span>
    </a>

    <a href="{{ route('control.category.index') }}" class="btn btn-app">
      <i class="fa fa-envelope"></i>
      <span>{{ Lang::get('blog::category.plural') }}</span>
    </a>

    <a href="{{ route('control.page.index') }}" class="btn btn-app">
      <i class="fa fa-file-text"></i>
      <span>{{ Lang::get('page::page.plural') }}</span>
    </a>

    <a href="{{ route('control.asset.index') }}" class="btn btn-app">
      <i class="fa fa-paperclip"></i>
      <span>{{ Lang::get('asset::asset.plural') }}</span>
    </a>
  </section>
</aside>

@stop