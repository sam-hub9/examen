<?php

namespace App\Http\Controllers;

use App\Models\Livre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LivreController extends Controller
{
    public function index()
    {
        $livres = Livre::all();
        return view("index", compact("livres"));
    }
    public function create()
    {
        return view("create");
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            "book_name" => ["required", "string", "max:255"],
            "writer_name" => ["required", "string", "max:255"],
            "notice" => ["required", "string", "max:255"],
            "note" => ["required", "integer", "between:0,20"],
        ],[
           "book_name.required" => "le nom est obligatoire", 
           "book_name.string" => "Veuillez entrer des cains de caracteres", 
           "writer_name.required" => "l'auteur est obligatoire", 
           "writer_name.string" => "Veuillez entrer des cains de caracteres.", 
           "notice.required" => "les avis sont obligatoire", 
           "notice.string" => "Veuillez entrer les chain de caracteres.", 
           "notice.max" => "Veuillez entrer max 255 caracteres", 
           "note.required" => "le note est obligatoire", 
           "note.integer" => "Veuillez entrer une note valide", 
           "note.digits_between" => " note valide est entre 0 et 20", 
        ]);
       if ($validator->fails()) {
           return redirect()->back()->withErrors($validator)->withInput();
       } 
       Livre::create([
           "book_name"=>$request->book_name,
           "writer_name"=>$request->writer_name,
           "notice"=>$request->notice,
           "note"=>$request->note,
       ]);
       return redirect()->route("index")->with([
           "success"=> "votre livre a été ajouter avec succès"
       ]);
    }
    public function edit($id)
    {
        $livre = Livre::find($id);
        return view("edit", compact('livre'));
    }
    public function update(Request $request, $id)
    {
        $livre= Livre::find($id);
        $validator = Validator::make($request->all(), [
            "book_name" => ["required", "string", "max:255"],
            "writer_name" => ["required", "string", "max:255"],
            "notice" => ["required", "string", "max:255"],
            "note" => ["required", "integer", "between:0,20"],
        ], [
            "book_name.required" => "le nom est obligatoire",
            "book_name.string" => "Veuillez entrer des cains de caracteres",
            "writer_name.required" => "l'auteur est obligatoire",
            "writer_name.string" => "Veuillez entrer des cains de caracteres.",
            "notice.required" => "les avis sont obligatoire",
            "notice.string" => "Veuillez entrer les chain de caracteres.",
            "notice.max" => "Veuillez entrer max 255 caracteres",
            "note.required" => "le note est obligatoire",
            "note.integer" => "Veuillez entrer une note valide",
            "note.digits_between" => " note valide est entre 0 et 20",
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $livre->update([
            "book_name" => $request->book_name,
            "writer_name" => $request->writer_name,
            "notice" => $request->notice,
            "note" => $request->note,
        ]);
        return redirect()->route("index")->with([
            "success" => "votre info a été modifié avec succès"
        ]);
    }
    public function destroy($id)
    {
        $livre = Livre::find($id);
        $livre->delete();
        return redirect()->back()->with([
            "success" => "Votre livre a été supprimé avec succés."
        ]);
    } 
}
