<div class="card">
    <div class="card-header">授業ランキング</div>
    <ul class="list-group list-group-flush">
        @foreach($like_articles as $key => $like_article)
            <li class="list-group-item">
                @if($key == 0)
                    <span style="margin-right: 10px;"><i class="fas fa-medal text-warning"></i></span>
                @elseif($key == 1)
                    <span style="margin-right: 10px;"><i class="fas fa-medal text-muted"></i></span>
                @elseif($key == 2)
                    <span style="margin-right: 10px;"><i class="fas fa-medal" style="color: #B87333;"></i></span>
                @elseif($key == 3)
                    <span style="margin-right: 10px;">４</span>
                @elseif($key == 4)
                    <span style="margin-right: 10px;">５</span>
                @elseif($key == 5)
                    <span style="margin-right: 10px;">６</span>
                @elseif($key == 6)
                    <span style="margin-right: 10px;">７</span>
                @elseif($key == 7)
                    <span style="margin-right: 10px;">８</span>
                @elseif($key == 8)
                    <span style="margin-right: 10px;">９</span>
                @elseif($key == 9)
                    <span style="margin-right: 10px;">10</span>
                @endif
                <a href="{{ route('articles.show', ['article' => $like_article]) }}">{{ $like_article->title }}</a>
                <span class="float-right" style="font-size: 12px;"><i class="fas fa-heart mr-1 red-text"></i>{{ $like_article->count_likes }}</span>
            </li>
        @endforeach
    </ul>
</div>
