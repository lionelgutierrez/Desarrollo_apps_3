<?php

namespace App\Http\Controllers;

use App\Serie;
use DB;
use Illuminate\Http\Request;

class SerieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$series = Serie::all();
        $series = Serie::select('timestamp','temperatura','humedad')->get();
    
        return $series;
    }

    public function disponibles()
    {
        //
        
        $dispositivos =DB::table('dispositivos')
                ->leftJoin('series', 'series.topic', '=', DB::Raw("CONCAT(dispositivos.nombre,'/',dispositivos.tipo)"))
                ->select( 'dispositivos.nombre', 'dispositivos.tipo','dispositivos.ubicacion','series.topic')
                ->whereNotNull('series.topic')
                ->distinct()
                ->get();

        
        //return $series;        
        return  view('Mediciones.index',compact('dispositivos'));
    }    
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Serie  $serie
     * @return \Illuminate\Http\Response
     */
    public function show($topic)
    {
        $topic = str_replace("-","/",$topic);
        $series = Serie::select('timestamp','temperatura','humedad')->where('topic',$topic)->orderBy('timestamp','asc')->get();
        return $series;

    }

    
    public function showdate($topic,$dia)
    {
        $topic = str_replace("-","/",$topic);
        $dia = str_replace("-","/",$dia);
        
        $series = Serie::select('timestamp','temperatura','humedad')
                        ->where('topic',$topic)
                        ->where(\DB::raw('substr(timestamp, 1, 10)'), '=' , $dia)
                        ->orderByRaw('substr(timestamp, 1, 10)','asc')->get();
                        
        return $series;

    }    

    
}
