<div class="card mt-3">
    <div class="card-body d-flex flex-row" style="display:flex; align-items: center; ">
      <a href="{{ route('users.show', ['name' => $article->user->name]) }}" class="text-dark">
      @if ($article->user->profile && $article->user->profile->user_image)
        <div class="col-md-3 col-sm-6 text-center">
            <img src="{{ Storage::disk('public')->url('images/' . $article->user->profile->user_image) }}" alt="アイコン" class="rounded-circle" height="48" width="46.5">
        </div>
      @else
        <div class="col-md-3 col-sm-6 text-center">
          <i class="fas fa-user-circle fa-3x mr-1" style="margin-bottom: 10px;"></i>
        </div>
      @endif
      </a>
      <div>
        <div class="font-weight-bold">
          <a href="{{ route('users.show', ['name' => $article->user->name]) }}" class="text-dark">
            {{ $article->user->name }}
          </a>
        </div>
        <div class="font-weight-lighter">{{ $article->created_at->format('Y/m/d H:i') }}</div>
      </div>

    @if( Auth::id() === $article->user_id )
      <!-- dropdown -->
        <div class="ml-auto card-text">
          <div class="dropdown">
            <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-ellipsis-v"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
              <a class="dropdown-item" href="{{ route("articles.edit", ['article' => $article]) }}">
                <i class="fas fa-pen mr-1"></i>記事を更新する
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item text-danger" data-toggle="modal" data-target="#modal-delete-{{ $article->id }}">
                <i class="fas fa-trash-alt mr-1"></i>記事を削除する
              </a>
            </div>
          </div>
        </div>
        <!-- dropdown -->

        <!-- modal -->
        <div id="modal-delete-{{ $article->id }}" class="modal fade" tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="閉じる">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form method="POST" action="{{ route('articles.destroy', ['article' => $article]) }}">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                  {{ $article->title }}を削除します。よろしいですか？
                </div>
                <div class="modal-footer justify-content-between">
                  <a class="btn btn-outline-grey" data-dismiss="modal">キャンセル</a>
                  <button type="submit" class="btn btn-danger">削除する</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <!-- modal -->
      @endif

    </div>
    <hr>
    <div class="card-body pt-0 pb-2">
      <h3 class="h4 card-title">
        <a class="text-dark" href="{{ route('articles.show', ['article' => $article]) }}">
          {{ $article->title }}
        </a>
      </h3>
      <div class="card-text">
        {!! nl2br(e( $article->body )) !!}
      </div>
    </div>
    @if($article->pdf_file)
    <div class="mt-4 d-flex justify-content-center article-pdf-container" style="margin: 0px;">
        <div class="pdf" style="position: relative; width: 90%; height: 0; padding-top: 56.25%; margin: 0px;">
            <iframe class="article-pdf" src="{{ Storage::disk('public')->url('pdfs/' . $article->pdf_file) }}" frameborder="0" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; padding: 0 0 20px 0;"></iframe>
        </div>
    </div>
    @endif
    <hr>
    @foreach($article->tags as $tag)
    @if($loop->first)
      <div class="card-body pt-0 pb-4 pl-3">
        <div class="card-text line-height">
    @endif
        <a href="{{ route('tags.show', ['name' => $tag->name]) }}" class="border p-1 mr-1 mt-1 text-muted">
            {{ $tag->hashtag }}
        </a>
    @if($loop->last)
        </div>
      </div>
    @endif
    @endforeach
    <div class="card-body pt-0 pb-2 pl-3">
        <div class="card-text">
          <article-like
          :initial-is-liked-by='@json($article->isLikedBy(Auth::user()))'
          :initial-count-likes='@json($article->count_likes)'
          :authorized='@json(Auth::check())'
          endpoint="{{ route('articles.like', ['article' => $article]) }}"
          >
          </article-like>
        </div>
    </div>
</div>
