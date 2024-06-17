@extends('template')
@section('title', 'Créer un post')

@section('content')
    <h1>Création d'un post</h1>
    <form action="{{ url('posts') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nom">Titre du post</label>
            <input type="text" class="form-control" name="title" id="nom" placeholder="Titre">
        </div>

        <div class="form-group">
            <label for="body">Contenu du post</label>
            <textarea class="form-control" name="body" id="body" rows="3" placeholder="Contenu"></textarea>
        </div>

        <div class="form-group">
            <label class="label">Type</label>
            <div class="select is-multiple">
                <select name="cats[]" class="form-select">
                    @foreach ($type as $t)
                        <option value="{{ $t->id }}"
                            {{ in_array($t->id, old('cats') ?: []) ? 'selected' : '' }}>
                            {{ $t->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="label">Niveau</label>
            <div class="select is-multiple">
                <select name="cats[]" class="form-select">
                    @foreach ($niveau as $n)
                        <option value="{{ $n->id }}"
                            {{ in_array($n->id, old('cats') ?: []) ? 'selected' : '' }}>
                            {{ $n->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <input type="submit" class="btn btn-success" value="Créer !">
    </form>
    <hr>
    <a href="/posts">Revoir tous les posts</a>

@endsection
