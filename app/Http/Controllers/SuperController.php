<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Super;

class SuperController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
/*
        $super = Super::all()
                ->get();
                */
        
        $super = DB::table('supers')
                ->orderBy('comprado')
                ->orderBy('area_super')
                ->get();
        
        return $super;

    }

    public function listSuper($area_super, $comprado, $atiende){
        echo $comprado."<br>";
        echo $area_super."<br>";
        echo $atiende."<br>";


        $super = DB::table('supers')
                ->where(function($query) use ($area_super, $comprado, $atiende) {
                    if($area_super != 'Todo'){
                        $query->where('area_super', '=',$area_super);
                    }
                    if($comprado!='true'){
                        $query->where('comprado', '=',$comprado);
                    }
                    if($atiende!='Todos'){
                        $query->where('atiende', '=',$atiende);
                    }
                })
                ->orderBy('comprado')
                ->orderBy('area_super')
                ->get();
        return $super;
        /*
        if($area_super == 'Todo'){
            if($comprado=='true'){
                $super = DB::table('supers')
                ->orderBy('comprado')
                ->orderBy('area_super')
                ->get();
            }else{

                $super = DB::table('supers')
                        ->where('comprado', '=',$comprado)
                        ->orderBy('comprado')
                        ->orderBy('area_super')
                        ->get();

            }
        }else{
             if($comprado=='true'){

                $super = DB::table('supers')
                        ->where('area_super', '=',$area_super)
                        ->orderBy('comprado')
                        ->orderBy('area_super')
                        ->get();
            }else{

                $super = DB::table('supers')
                        ->where('area_super', '=',$area_super)
                        ->where('comprado', '=',$comprado)
                        ->orderBy('comprado')
                        ->orderBy('area_super')
                        ->get();

            }

        }
        
        return $super;*/
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
        //
       
        //Instanciamos la clase Pokemons
        $super = new Super;
        //Declaramos el nombre con el nombre enviado en el request
        $super->area_super = $request->area_super;
        $super->area_casa = $request->area_casa;
        $super->atiende = $request->atiende;
        $super->articulo = $request->articulo;
        $super->comprado = false;

        //Guardamos el cambio en nuestro modelo
        $super->save();
        return $super;
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
        return Super::where('id', $id)->get();
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
        // delete
        $super = Super::find($id);
        Super::destroy($id);
        /*$super=Super::find($id);
        $super->delete();
         $super2 = new Super;*/
        return $super;
    }

    /* *
     * fails
     *
     * //@ return \Illuminate\Http\Response
     */
    public function actualizaComprado(Request $request)
    {
        //use DB; 
        \DB::table('supers')
                    ->where('id', $request->id)
                    ->update(array('comprado' => $request->comprado));
/*        DB::table('supers')
                    ->where('id', $request->id)
                    ->update(array('comprado' => $request->comprado));
  */      return $request;
        
    }
}
