<div class="text-center fw-bold text-muted mb-2">Suggestions</div>
@if ($suggestedUsers->isNotEmpty())
    @foreach($suggestedUsers as $user)
    <div class="row mb-2">
        <div class="col-4 text-end">
            @if ($user->avatar)
            <img src="{{ App\Models\User::showAvatar($user->avatar) }}" class="border rounded-circle mt-2" style="height: 2.1rem; width: 100%;" /> 
            @else
            <i class="far fa-user-circle fa-2x text-muted mt-2"></i>
            @endif 
        </div>
        <div class="col-7 mt-3 ps-0">
            <p class="fw-bold" style="font-size: 12px;">{{ $user->name }}</p>
        </div>
        <div class="col-1 ps-0 text-start" style="margin-top: 0.7rem!important;">
            @if (!\App\Models\Follow::isFollowed(Auth::user()->id, $user->id))
                <form method="post" action="{{ route('follow.store', $user->id) }}">
                    @csrf
                    <button type="submit" class="btn btn-outline-secondary btn-sm" style="font-size: .675rem">Follow</button>
                </form>
            @endif
        </div>
    </div>
    @endforeach
@endif
