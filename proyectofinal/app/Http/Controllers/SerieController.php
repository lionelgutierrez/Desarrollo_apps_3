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
                    //'STR_TO_DATE("timestamp", "%d/%m/%Y %h:%i:%s")'

            */
            $series =DB::table('series')
            ->join('dispositivos', 'series.topic',  'CONCAT(dispositivos.nombre,'/',dispositivos.tipo)')
            ->select('dispositivos.id', 'dispositivos.nombre', 'dispositivos.tipo','dispositivos.ubicacion','series.timestamp','series.topic','series.temperatura','series.humedad')
            ->get();

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
