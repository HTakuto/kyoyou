<div class="card mt-3">
    <div class="card-body">
      <div class="d-flex flex-row align-items-center">
        <a href="{{ route('users.show', ['name' =>  $person->name]) }}" class="text-dark">
          @if ($person->profile && $person->profile->user_image)
            <img src="{{ Storage::disk('public')->url('images/' . $person->profile->user_image) }}" alt="アイコン" class="rounded-circle me-2" height="48" width="46.5" style="margin-right: 10px;">
          @else
            <i class="fas fa-user-circle fa-3x mr-1" style="margin-bottom: 15px;"></i>
          @endif
        </a>
        <h2 class="h5 card-title m-0">
            <a href="{{ route('users.show', ['name' => $person->name]) }}" class="text-dark">{{ $person->name }}</a>
        </h2>
        @if( Auth::id() !== $person->id )
          <follow-button
            class="ml-auto"
            :initial-is-followed-by='@json($person->isFollowedBy(Auth::user()))'
            :authorized='@json(Auth::check())'
            endpoint="{{ route('users.follow', ['name' => $person->name]) }}"
          >
          </follow-button>
        @endif
      </div>
    </div>
</div>
