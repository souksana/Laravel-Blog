<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Category;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$posts = Post::where('id_user',1)->orderBy('created_at','desc');
        $posts = Post::orderBy('created_at', 'desc')->paginate(10);
        //page heading
        $title = 'Les posts les plus récents';
        $user = Post::where('Id_User');
        //retourne la vue home.blade.php
        return view('home')->with('posts', $posts)->with('title', $title)->with('user', $user);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $post = Post::find($id);
        $type = Category::where('filtre', 'type')->get();
        $niveau = Category::where('filtre', 'niveau')->get();

        return view('posts.create')->with("type", $type)->with("niveau", $niveau);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /////////////////////////////////////////////
        // validation des données de la requête
        ////////////////////////////////////
        $this->validate(
            $request,
            [
                'title' => 'required|unique:posts|max:255',
                'body' => 'required',
            ]
        );
        // code exécuté uniquement si les données sont validées
        // sinon un message d'erreur est renvoyé vers l'utilisateur
        /////////////////////////////////////////////
        // préparation de l'enregistrement à stocker dans la base de données
        ////////////////////////////////////

        //Création d’un nouvel objet de classe Tache
        $post = new Post;
        $post->Id_user = $request->user()->id;
        $post->title = $request->title;
        $post->body = $request->body;
        $post->slug = Str::slug($post->title);
        $post->save();
        $post->categories()->attach($request->cats);

        //Affectation des propriétés de l’objet

        // persistance de l’objet
        // -> insertion de l'enregistrement dans la base de données

        /////////////////////////////////////////////
        // redirection vers la page qui affiche la liste des tâches
        ////////////////////////////////////
        return redirect('/posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // ...
    }

    function show_by_slug(Request $request, $slug)
    {
        $post = Post::where('slug',$slug)->first();
        $comments = Comment::all();
        $categories = Category::all();
        return view('posts.show', compact('post'))->with('post', $post)->with('comments', $comments)->with('categories', $categories);


        // return redirect('/post/'.$slug)->with('post', $post)->with('comments', $comments);

    }

    // public function show_categories_post()
    // {
    //     // $post = Post::find($id);
    //     $categories = Category::all();
    //     return view('posts.categories')->with("categories", $categories);
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
