<?php

namespace App\Http\Controllers\REST;

use App\Http\Controllers\Controller;
use App\Models\abonne;
use Illuminate\Http\Request;

class AbonneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $abonne= Abonne::all();
        return response ()->json( $abonne,200);
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

        try{
            DB:: beginTransaction();
            $abonne= Abonne:: create([
                'nom'=>$request->nom,
                'prenom'=>$request->prenom, 
                'age'=>$request->age, 
                'sexe'=>$request->sexe,
                'profession'=>$request->profession,
                'rue'=>$request->rue
            ]);
            DB:: commit();
            return response()->json($abonne, 201);
        
        }catch(\throwable $th){
            return response()->json('{"error":"impossible de sauvegarder"}' .$th,404);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\abonne  $abonne
     * @return \Illuminate\Http\Response
     */
    public function show(abonne $abonne)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\abonne  $abonne
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        //

        try{
            $abonne = Abonne::find($id);
            $abonne->update($request->all());

            response()->json("{'Modification reussie de l abonne'}", 200);
            return $abonne;
        }catch (Throwable $error){
            dd($error);
            return response()->json("{'error: Impossible de mettre a jour l abonne'} .$th,404");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\abonne  $abonne
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        //

        try{
            $abonne = Abonne::find($id);
            $abonne->delete();
            return response()->json(['message'=> 'abonne supprime avec succes !']);
        }catch(\Throwable $error){
            return response()->json('{"error": "impossible de supprimer cet abonne"}'.$th, 404);
        }
    }
}
