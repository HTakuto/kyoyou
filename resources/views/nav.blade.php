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
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
          @forelse(Auth::user()->unreadNotifications as $notification)
            <a class="dropdown-item" href="{{ route('articles.show', ['article' => $notification->data['article_id']]) }}">
              {{ $notification->data['user_name'] }}さんがあなたの記事に{{ $notification->data['action'] }}しました。
            </a>
          @empty
            <p class="dropdown-item">通知はありません。</p>
          @endforelse
        </div>
      </li>
      @endauth

      @auth
      <!-- Dropdown -->
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
           aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user-circle"></i>
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
