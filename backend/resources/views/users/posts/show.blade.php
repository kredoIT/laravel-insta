@extends('layouts.app')

@section('title', 'Edit Post')

@section('content')

<div class="row">
	<div class="col-6 bg-dark text-white pt-5 pb-5">
		<img src="{{ App\Models\Post::showImage($post->image) }}" class="mt-4 card-img rounded-0"/>
	</div>
	<div class="col-6 border border-1 pt-5">
		<p>
			<strong>{{ $post->user->name }}</strong> &nbsp; {{ $post->description }}
		</p>

		<div class="mb-5">
			@foreach($post->categoryPost as $categoryPost)
	        <div class="badge bg-secondary text-wrap" style="width: 6;">
	            {{ $categoryPost->category->name }}
	        </div>
	        @endforeach
		</div>

        <div class="mb-3">
	        @if ($comments->isNotEmpty())
		        @php $style = $comments->count() > 3 ? 'height: 20rem; overflow-x: hidden; overflow-y: scroll;' : '' @endphp

		        <div class="row mb-2" style="{{ $style }}">
		            <div class="panel panel-default widget">
		                <div class="panel-body">
		                    <ul class="list-group">
		                        @foreach($comments->sortByDesc('id') as $comment)
		                        <li class="list-group-item">
		                            <div class="row">
		                                <div class="col-xs-3 col-md-1 me-3">
		                                    @if ($comment->user->avatar)
		                                        <img 
		                                        	src="{{ App\Models\User::showAvatar($comment->user->avatar) }}" 
		                                        	class="border rounded-circle me-3" 
		                                        	style="height: 3rem; width: 3rem;" 
		                                        /> 
		                                    @else
		                                        <i class="far fa-user-circle fa-3x text-muted"></i>
		                                    @endif  
		                                </div>
		                                <div class="col-xs-9 col-md-10">
		                                    <div>
		                                        <div class="mb-2">
		                                            <strong>{{ $comment->user->name }}</strong> <span class="text-muted">{{ date("D, M d Y", strtotime($comment->created_at) ) }}</span>
		                                        </div>

		                                        <span class="text-dark">
		                                            {{ $comment->body }}
		                                        </span>
		                                        
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

        <div class="mb-3">
        	<form method="post" action="{{ route('comment.store', $post->id) }}">
        		@csrf
        		<textarea name="comment_body{{ $post->id }}" class="form-control mb-2" rows="1" placeholder="Write your comment here"></textarea>

        		@error('comment_body' . $post->id)
        			<p class="text-danger">{{ $message }}</p>
        		@enderror

				<button class="btn btn-primary btn-sm" type="submit">Submit</button>	
			</form>
        </div>
	</div>
</div>

@endsection
