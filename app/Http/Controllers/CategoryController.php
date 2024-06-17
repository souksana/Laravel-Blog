<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        $title = 'Toutes les catégories';
        // $user = Post::where('Id_User');
        return view('categories.index')->with('categories', $categories)->with('title', $title);
    }

    // public function index($slug = null)
    // {
    //     $query = $slug ? Category::whereSlug($slug)->firstOrFail()->films() : Film::query();
    //     $films = $query->withTrashed()->oldest('title')->paginate(5);
    //     return view('index', compact('films', 'slug'));
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    function show_by_slug(Request $request, $slug)
    {
        $st = strtoupper($slug);
        $title = "Tous les posts dans la catégorie ";
        ///
        $category = Category::where('slug',$slug)->first();
        $posts = Post::all();
        return view('categories.show')->with('title', $title)->with('category', $category)->with('posts', $posts);
    }

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
