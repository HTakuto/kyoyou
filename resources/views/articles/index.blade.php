@extends('app')

@section('title', '記事一覧')

@section('content')
  @include('nav')
  <div class="container">
    <div class=row>
      <div class="col-md-8">
        @foreach($articles as $article)
            @include('articles.card')
        @endforeach
      </div>
      <div class="col-md-4">
        @include('articles.ranking')
      </div>
    </div>
  </div>
  @include('footer')
@endsection
