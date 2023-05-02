@extends('app')

@section('title', '記事一覧')

@section('content')
  @include('nav')
  <div class="container-fluid px-0">
    <div class=row>
        <div class="col-md-3 col-sm-6">
            @include('articles.follower_ranking')
        </div>
        <div class="col-md-6 col-sm-12">
        @foreach($articles as $article)
            @include('articles.card')
        @endforeach
      </div>
      <div class="col-md-3 col-sm-6">
        @include('articles.lesson_ranking')
      </div>
    </div>
  </div>
  @include('footer')
@endsection
