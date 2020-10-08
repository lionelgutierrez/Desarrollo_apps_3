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
        //
        $series = Serie::select('topic','timestamp','temperatura','humedad')->get();
        /*
        $series =DB::table('series')
            ->join('dispositivos', 'series.topic',  'CONCAT(dispositivos.nombre,'/',dispositivos.tipo)')
            ->select('dispositivos.id', 'dispositivos.nombre', 'dispositivos.tipo','dispositivos.ubicacion','series.timestamp','series.topic','series.temperatura','series.humedad')
            ->get();
            */
    
        return $series;        
    }

    
    /**
     * Display the specified resource.
     *
     * @param  \App\Serie  $serie
     * @return \Illuminate\Http\Response
     */
    public function show($topic)
    {
        //'STR_TO_DATE("timestamp", "%d/%m/%Y %h:%i:%s")'
        $topic = str_replace("-","/",$topic);
        
        $series = Serie::select('timestamp','temperatura','humedad')->where('topic',$topic)->orderBy('timestamp','asc')->get();
        return $series;
        //return $topic;

    }

    
}
