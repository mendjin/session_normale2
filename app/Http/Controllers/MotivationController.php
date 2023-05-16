<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MotivationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $nom = "Adamou";
        return View("formulaire_motivation");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $liste = motivation::all();
        return view ("liste_motivation", compact('liste'));
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
            DB::beginTransaction();
            motivation::create(["intitule"=>$request->intitule]);
            DB::commit();
            return back ();
       }catch(\throwable $th){
            return back ();
      }
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
        try{
            DB::beginTransaction();
            $motiv = motivation::find($id);
            DB::commit();
            return view ("update_motivation", compact ("reg"));
        }catch(\Throwable $th){
            return back ();
        }
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
        try{
            DB::beginTransaction();
            motivation::find($request->id)->update(['intitule'=>$request->intitule]);
            DB::commit();
            return redirect("/motivation_liste");
        }catch(\Throwable $th){
            return back ();
        }
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
        try{
           
            $motivation = motivation::find($id);
            $motivation-> delete();
            return response()->json(['message'=>'Motivation supprimee avec succes !'])  ;
        }catch(\Throwable $th){
            return response()->json('{"error": "impossible de supprimer la motivation" }' .$th, 404);
        }
    }
}
