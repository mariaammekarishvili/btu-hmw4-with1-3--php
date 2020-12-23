@extends("layout.master")

@section("content")

<div class="container">
    <div class="col-md-6 offset-3">
        <form action="/update" method="post">
            <div class="foarm-group">
                <h2>Edit News</h2>
            </div>
            <div class="form-group">
                @if(Session::get("message"))
                    <div class="alert alert-success">
                        {{ Session::get("message") }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label>Name of news</label>
                <input type="text" name="news_title" class="form-control" value="{{ $post->title }}">
            </div>
            <div class="form-group">
                <label>Text of news</label>
                <textarea name="news_text" class="form-control">{{ $post->text }}</textarea>
            </div>
            <div class="form-group">
                @csrf
                <input type="hidden" name="id" value="{{ $post->id }}">
                <button class="btn btn-info" name="submit">add</button>
            </div>
        </form>
    </div>
</div>

@endsection
