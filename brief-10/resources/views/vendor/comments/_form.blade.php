<div class="card">
    <div class="card-body">
        <form method="POST" action="{{ route('comments.store') }}">
            @csrf
            @honeypot
            <input type="hidden" name="commentable_type" value="\{{ get_class($model) }}" />
            <input type="hidden" name="commentable_id" value="{{ $model->getKey() }}" />

            <div class="flex flex-col gap-3 m-5 p-3 bg-cool-gray-400">
                <label for="message">@lang('comments::comments.enter_your_message_here')</label>
                <textarea class="form-textarea @if($errors->has('message')) is-invalid @endif" name="message" rows="3"></textarea>
                <div class="invalid-feedback">
                    @lang('comments::comments.your_message_is_required')
                </div>
                <small class="form-text text-muted">@lang('comments::comments.markdown_cheatsheet', ['url' => 'https://help.github.com/articles/basic-writing-and-formatting-syntax'])</small>
                <button type="submit" class="bg-indigo-400 p-3 rounded-md btn-outline-success text-uppercase">@lang('comments::comments.submit')</button>
            </div>

        </form>
    </div>
</div>
<br />
