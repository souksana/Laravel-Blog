@extends('template')
@section('title', 'Catégorie "'.$category->name.'"')

@section('content')
    <h1> {{ $title }} <span class="text-success">{{ $category->name }}</span></h1>

    <hr>

    @foreach ($category->posts as $post)
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

    <a href="/categories">Revoir toutes les catégories</a>
@endsection
