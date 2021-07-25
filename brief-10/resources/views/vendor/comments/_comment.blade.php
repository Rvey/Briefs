
<div id="comment-{{ $comment->getKey() }}" class="media">
    <div class=" m-3 flex flex-col p-3 rounded-lg bg-cool-gray-200 gap-2">
        <h3 class="mt-0 mb-1 font-semibold">{{ $comment->commenter->name }} <small class="text-gray-500">- {{ $comment->created_at->diffForHumans() }}</small></h3>
        <div>{{$comment->comment}}</div>
        <div>
            @can('delete-comment', $comment)
                <a href="{{ route('comments.destroy', $comment->getKey()) }}" onclick="event.preventDefault();document.getElementById('comment-delete-form-{{ $comment->getKey() }}').submit();" class=" text-red-500 text-uppercase">@lang('comments::comments.delete')</a>
                <form id="comment-delete-form-{{ $comment->getKey() }}" action="{{ route('comments.destroy', $comment->getKey()) }}" method="POST" style="display: none;">
                    @method('DELETE')
                    @csrf
                </form>
            @endcan
        </div>
    </div>
</div>
