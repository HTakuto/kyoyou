<div class="card">
    <div class="card-header">ユーザーランキング</div>
    <ul class="list-group list-group-flush">
        @foreach($follow_ranking as $key => $user)
            <li class="list-group-item">
                @if ($key == 0)
                    <span style="margin-right: 10px;"><i class="fas fa-medal text-warning"></i></span>
                @elseif ($key == 1)
                    <span style="margin-right: 10px;"><i class="fas fa-medal text-muted"></i></span>
                @elseif ($key == 2)
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
                {{-- <img src="{{ $user->icon }}" alt="ユーザーアイコン"> --}}
                 <i class="fas fa-user-circle fa-3x mr-1"></i>
                <a href="{{ route('users.show', ['name' => $user->name]) }}">{{ $user->name }}</a>
            </li>
        @endforeach
    </ul>
</div>
