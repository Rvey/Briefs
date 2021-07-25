@extends('layouts.app')

@section('content')
<div class="w-4/5 m-auto text-left">
    <div class="py-15">
        <h1 class="text-6xl">
            {{ $post->title }}
        </h1>
    </div>
</div>

<div class="w-4/5 m-auto pt-20">
    <span class="text-gray-500">
        By <span class="font-bold italic text-gray-800">{{ $post->user->name }}</span>, Created on {{ date('jS M Y', strtotime($post->updated_at)) }}
    </span>

    <p class="text-xl text-gray-700 pt-8 pb-10 leading-8 font-light">
        {{ $post->description }}
    </p>
</div>
<div class="ml-6 p-5 text-xl">Commentes</div>


<div class="card-body">
    <h5>Display Comments</h5>



    <hr />
   </div>

   <div class="card-body">
    <h5>Leave a comment</h5>
    <form method="post"
    action="/post/{post}/comment">
        @csrf
        <div class="form-group">
            <input type="text" name="comment" class="form-control" />
            <input type="hidden" name="post_id" value="{{ $post->id }}" />
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-sm btn-outline-danger py-0" style="font-size: 0.8em;" value="Add Comment" />
        </div>
    </form>

    {{-- @foreach($post->blogcomments as $blogcomment)
    {{$blogcomment->comment}}
@endforeach --}}
   </div>

</div>


@endsection
