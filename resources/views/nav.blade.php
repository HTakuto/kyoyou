<nav class="navbar navbar-expand navbar-dark">

    <a href="/">
      <div class="navbar-brand">
        <img src="{{ asset('images/教アイコン.png') }}" alt="教YOUアイコン">
        <h1>教YOU</h1>
      </div>
    </a>

    <ul class="navbar-nav ml-auto">
      <div class="search-icon"><i class="fas fa-search"></i></div>
      <form class="search-form" action="{{ route('articles.index') }}" method="GET">
        @csrf
        <input type="text" name="keyword"  placeholder="記事を検索">
      </form>
      @guest
      <li class="nav-item login-btn">
        <a class="nav-link" href="{{ route('login') }}">ログイン</a>
      </li>
      @endguest

      @guest
      <li class="nav-item signup-btn">
        <a class="nav-link" href="{{ route('register') }}">新規登録</a>
      </li>
      @endguest

      @auth
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-bell"></i>
          @if ($unreadNotificationsCount > 0)
            <span class="notification-badge">{{ $unreadNotificationsCount }}</span>
          @endif
        </a>
        <div class="dropdown-menu dropdown-menu-right nav-notification" aria-labelledby="navbarDropdownMenuLink" style="min-width: 60vw;">
            <h6 class="dropdown-header">通知</h6>
            @if ($notifications->isEmpty())
                <a class="dropdown-item" href="#">通知はありません</a>
            @else
                @foreach ($notifications as $notification)
                    @unless($notification->read_at)
                        <hr>
                        <div class="py-2 px-4 hover:bg-gray-100">
                            <div class="mb-1">
                                @if ($notification->type === 'like')
                                    <a href="{{ route('articles.show', ['article' => $notification->notifiable_id]) }}">{{ \App\Article::find($notification->notifiable_id)->title }}</a><a>が</a><a href="{{ route('users.show', ['name' => $notification->causedByUser->name]) }}">{{ $notification->causedByUser->name }}</a><a>さんにいいねされました。</a>
                                @elseif ($notification->type === 'comment')
                                    <a href="{{ route('articles.show', ['article' => $notification->notifiable_id]) }}">{{ \App\Article::find($notification->notifiable_id)->title }}</a><a>が</a><a href="{{ route('users.show', ['name' => $notification->causedByUser->name]) }}">{{ $notification->causedByUser->name }}</a><a>さんにコメントされました。</a>
                                @elseif ($notification->type === 'follow')
                                    <a href="{{ route('users.show', ['name' => $notification->causedByUser->name]) }}">{{ $notification->causedByUser->name }}</a><a>さんにフォローされました。</a>
                                @endif
                            </div>
                            <div class="text-gray-400 text-xs text-right" style="margin-top: -0.5rem;">{{ $notification->created_at->diffForHumans() }}</div>
                        </div>
                    @endunless
                @endforeach
            @endif
        </div>
      </li>
      @endauth


      @auth
      <!-- Dropdown -->
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
           aria-haspopup="true" aria-expanded="false">
            @if ($user->profile && $user->profile->user_image)
                <img src="{{ Storage::disk('public')->url('images/' . $user->profile->user_image) }}" alt="アイコン" class="rounded-circle me-2" w height="30.1" width="32">
            @else
                <i class="fas fa-user-circle"></i>
            @endif
        </a>
        <div class="dropdown-menu dropdown-menu-right dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
          <button class="dropdown-item" type="button"
                  onclick="location.href='{{ route("users.show", ["name" => Auth::user()->name]) }}'">
            マイページ
          </button>
          <div class="dropdown-divider"></div>
          <button form="post-button" class="dropdown-item" type="button"
                  onclick="location.href='{{ route('articles.create') }}'">
            投稿する
          </button>
          <div class="dropdown-divider"></div>
          <button form="logout-button" class="dropdown-item" type="submit">
            ログアウト
          </button>
        </div>
      </li>
      <form id="logout-button" method="POST" action="{{ route('logout') }}">
        @csrf
      </form>
      <!-- Dropdown -->
      @endauth

      <div class="nav-last">
      @auth
        <li class="nav-item">
        <div class="post-btn">
            <a class="nav-link" href="{{ route('articles.create') }}"><i class="fas fa-pen mr-1"></i>投稿する</a>
        </div>
        </li>
      @endauth
    </div>
    </ul>

</nav>
