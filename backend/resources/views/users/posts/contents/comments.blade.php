<div class="container">
    <form method="post" action="{{ route('comment.store', $post->id) }}" class="row mb-2">
        @csrf
        <div class="input-group ">
            <textarea name="comment_body{{ $post->id }}" class="form-control form-control-sm" rows="1" placeholder="Write your comment here">{{ old('comment_body') }}</textarea>
            <button type="submit" class="btn btn-outline-primary btn-sm" type="button">Submit</button>

        </div>
        @error('comment_body' . $post->id)
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </form>

    @if ($post->comments->isNotEmpty())
        @php $style = $post->comments->count() > 5 ? 'height: 20rem; overflow-x: hidden; overflow-y: scroll;' : '' @endphp

        <div class="row mb-4" style="{{ $style }}">
            <div class="panel panel-default widget">
                <div class="panel-body">
                    <ul class="list-group">
                        @foreach($post->comments->sortByDesc('id') as $comment)
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-xs-3 col-md-1">
                                    @if ($comment->user->avatar)
                                        <img src="{{ App\Models\User::showAvatar($comment->user->avatar) }}" class="border rounded-circle me-3" style="height: 3rem; width: 3rem;" /> 
                                    @else
                                        <i class="far fa-user-circle fa-3x text-muted"></i>
                                    @endif  
                                </div>
                                <div class="col-xs-9 col-md-10">
                                    <div>
                                        <div class="mb-2">
                                            <strong>{{ $comment->user->name }}</strong> <span class="text-muted">{{ date("D, M d Y", strtotime($comment->created_at) ) }}</span>
                                        </div>
                                        {{ $comment->body }}
                                    </div>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    @endif
</div>
