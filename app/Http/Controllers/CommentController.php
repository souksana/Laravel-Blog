<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Session;


class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

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
        /////////////////////////////////////////////
        // validation des données de la requête
        ////////////////////////////////////
        $this->validate(
            $request,
            [
                'Id_post' => 'required',
                'body' => 'required',
            ]
        );
        // code exécuté uniquement si les données sont validées
        // sinon un message d'erreur est renvoyé vers l'utilisateur
        /////////////////////////////////////////////
        // préparation de l'enregistrement à stocker dans la base de données
        ////////////////////////////////////

        //Création d’un nouvel objet de classe Tache
        $comment = new Comment;

        //Affectation des propriétés de l’objet
        $comment->Id_user = $request->user()->id;;
        $comment->Id_post = $request->Id_post;
        $comment->body = $request->body;
        $slug = $request->slug;
        // persistance de l’objet
        // -> insertion de l'enregistrement dans la base de données
        $comment->save();
        /////////////////////////////////////////////
        // redirection vers la page qui affiche la liste des tâches
        ////////////////////////////////////
        Session::flash('message', 'Commentaire posté');
        return redirect('/post/'.$slug);
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
