@extends('template')

@section('content')
    <h1> {{ $title }} </h1>
    <div class="d-flex">
        <form action="/posts/create">
            <input type="submit" class="btn btn-success" value="Créer un post">
        </form>
        <form action="/categories">
            <input type="submit" class="btn btn-light mx-2" value="Voir toutes les catégories">
        </form>
    </div>

    <hr>
    @foreach ($posts as $post)
        <h4>{{ $post->title }}</h4>
        <P>{{ str_limit($post->body, 255, ' (...)') }} <a href="/post/{{ $post->slug }}">Voir le post entier</a></P>
        <p>
            @foreach ($post->categories as $category)
                <a href='/category/{{ $category->slug }}'><span class="badge bg-light text-dark">{{ $category->name }}</span></a>
            @endforeach
        </p>
        <p><i><span style="color:#3F8838">{{ $post->author->email }}</span> |
                {{ $post->created_at->format('d M Y \à H:i') }}</i>
        <p>
            <hr>
    @endforeach
@endsection
