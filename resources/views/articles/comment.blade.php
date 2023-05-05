<div class="container mt-4">
    <div class="row">
      <div class="col-12">
        <h2 class="mb-4">コメント</h2>
        <form method="POST" action="{{ route('comments.store') }}"  style="margin-bottom: 30px;">
          @csrf
          <div class="form-group">
            <input type="hidden" name="article_id" value="{{ $article->id }}">
            <textarea class="form-control" name="content" rows="4" placeholder="コメントを入力してください"></textarea>
          </div>
          <div class="text-right">
            <button type="submit" class="btn btn-primary">コメントする</button>
          </div>
        </form>

        @forelse($article->comments as $comment)
        <div class="border-top p-4">
            <div class="d-flex justify-content-between">
                <div>
                    <a href="{{ route('users.show', ['name' => $article->user->name]) }}" class="text-dark">
                    @if ($article->user->profile && $article->user->profile->user_image)
                        {{-- <img  src="{{ Storage::disk('public')->url('profiles/' . $profile->user_image) }}"  alt="アイコン" class="rounded-circle" width="100"> --}}
                        <div class="d-flex align-items-center">
                            <img src="{{ $comment->user->user_image }}" alt="{{ $comment->user->name }}" class="rounded-circle me-2" width="40" height="40">
                            <h5 class="mb-0">{{ $comment->user->name }}</h5>
                        </div>
                    @else
                        <div class="d-flex align-items-center">
                            <i class="fas fa-user-circle fa-3x mr-1" style="margin-bottom: 10px;"></i>
                            <h5 class="mb-0">{{ $comment->user->name }}</h5>
                        </div>
                    @endif
                    </a>
                </div>
                <time class="text">
                    {{ $comment->created_at->format('Y/m/d H:i') }}
                </time>
            </div>
            <p class="mt-2">
                {!! nl2br(e($comment->content)) !!}
            </p>
        </div>
        @empty
            <p>コメントはまだありません。</p>
        @endforelse
        <hr>
      </div>
    </div>
</div>
