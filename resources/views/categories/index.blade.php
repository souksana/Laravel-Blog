@extends('template')
@section('title', 'Toutes les catégories')

@section('content')
    <h1>Toutes les catégories</h1>
    <hr>

    {{-- <div class="btn-group" role="group" aria-label="Basic outlined example">
        @foreach ($categories as $category)
            <button type="button" class="btn btn-outline-success"><a href="category/{{ $category->slug }}"
                    class="text-success">{{ $category->name }}</a></button>
        @endforeach
    </div> --}}
    <div class="list-group">
        @foreach ($categories as $category)
            <a href="category/{{ $category->slug }}" class="list-group-item list-group-item-action">{{ $category->name }}</a>
        @endforeach

    </div>
    <hr>
    <a href="/posts">Revoir tous les posts</a>

@endsection
