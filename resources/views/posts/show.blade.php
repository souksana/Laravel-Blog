@extends('template')
@section('title', $post->title)

@section('content')

    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

    <h1>{{ $post->title }}</h1>
    <P>{{ $post->body }}</P>
    <p>
        @foreach ($post->categories as $category)
            <a href='/category/{{ $category->slug }}'><span class="badge bg-light text-dark">{{ $category->name }}</span></a>
        @endforeach
    </p>
    <p><i>{{ $post->author->email }} | {{ $post->created_at->format('d M Y \à H:i') }}</i>
    <p>

        <hr>

    <h4>Laissez un commentaire</h4>
    <div class="panel-body">
        <form method="post" action="/comments">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="Id_post" value="{{ $post->id }}">
            <input type="hidden" name="slug" value="{{ $post->slug }}">
            <div class="form-group">
                <textarea required="required" placeholder="Entrez le commentaire ici" name="body" class="form-control"></textarea>
            </div>
            <input type="submit" name='post_comment' class="btn btn-success" value="Poster" />
        </form>
    </div>
    <br>
    <h4>Tous les commentaires</h4>
    @foreach ($post->comments as $comment)
        <h6>{{ $comment->author->email }} | {{ $comment->created_at->format('d M Y \à H:i') }}</h6>
        <p>{{ $comment->body }}</p>
    @endforeach

    <hr>

    <a href="/posts">Revoir tous les posts</a>
@endsection
