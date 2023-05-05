<div class="card mt-3">
    <div class="card-body">
      <div class="d-flex flex-row">
        <a href="{{ route('users.show', ['name' => $user->name]) }}" class="text-dark">
          @if ($user->profile && $user->profile->user_image)
            <div class="col-md-3 col-sm-6 text-center">
              <img src="{{ asset('public/profiles/'.$user->profile->user_image) }}" alt="アイコン" class="rounded-circle" width="100">
            </div>
          @else
            <div class="col-md-3 col-sm-6 text-center">
              <i class="fas fa-user-circle fa-3x mr-1" style="margin-bottom: 10px;"></i>
            </div>
          @endif
        </a>
        @if( Auth::id() !== $user->id )
          <follow-button
            class="ml-auto"
            :initial-is-followed-by='@json($user->isFollowedBy(Auth::user()))'
            :authorized='@json(Auth::check())'
            endpoint="{{ route('users.follow', ['name' => $user->name]) }}"
          >
          </follow-button>
        @elseif( Auth::id() === $user->id )
          <div class="ml-auto">
            <a href="{{ route('profiles.edit') }}" class="btn btn-sm btn-light text-black">
              プロフィールを編集する
            </a>
          </div>
        @endif
      </div>
      <h2 class="h5 card-title m-0">
        <a href="{{ route('users.show', ['name' => $user->name]) }}" class="text-dark">
          {{ $user->name }}
        </a>
      </h2>
    </div>
    <hr>
    <div class="card-body">
        <h6><strong>プロフィール</strong></h6>
        <div class="row">
            <div class="col-md-4 col-sm-12">
              <p><strong>年齢</strong>：@if($user->profile && $user->profile->age){{ $user->profile->age }}@endif</p>
            </div>
            <div class="col-md-4 col-sm-12">
              <p><strong>性別</strong>：@if($user->profile && $user->profile->gender){{ $user->profile->gender }}@endif</p>
            </div>
            <div class="col-md-4 col-sm-12">
              <p><strong>学校種別</strong>：@if($user->profile && $user->profile->school_type){{ $user->profile->school_type }}@endif</p>
            </div>
            <div class="col-md-4 col-sm-12">
              <p><strong>学年</strong>：@if($user->profile && $user->profile->school_year){{ $user->profile->school_year }}@endif</p>
            </div>
            <div class="col-md-4 col-sm-12">
              <p><strong>教科</strong>：@if($user->profile && $user->profile->subject){{ $user->profile->subject }}@endif</p>
            </div>
            <div class="col-md-4 col-sm-12">
              <p><strong>部活動</strong>：@if($user->profile && $user->profile->club){{ $user->profile->club }}@endif</p>
            </div>
            <div class="col-12">
              <p><strong>自己紹介</strong></p>
              <p>@if($user->profile && $user->profile->comment){{ $user->profile->comment }}@endif</p>
            </div>
        </div>
    </div>
    <hr>
    <div class="card-body">
      <div class="card-text">
        <a href="{{ route('users.followings', ['name' => $user->name]) }}" class="text-muted" style="margin-right: 20px;">
          <strong>{{ $user->count_followings }}</strong> フォロー中
        </a>
        <a href="{{ route('users.followers', ['name' => $user->name]) }}" class="text-muted">
          <strong>{{ $user->count_followers }}</strong> フォロワー
        </a>
      </div>
    </div>
</div>
