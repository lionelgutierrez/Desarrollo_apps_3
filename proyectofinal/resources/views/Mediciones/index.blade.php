@extends('layouts.layout')
@section('content')
<nav class="navbar navbar-inverse" style="margin-top: -100px">
  <div class="container-fluid">

    <ul class="nav navbar-nav">
      <li ><a href="/">Home</a></li>
      <li><a href="/Dispositivo">Dispositivos</a></li>
      <li class="active"><a href="/Mediciones">Mediciones</a></li>
      <li><a href="/Comandos">Comandos</a></li>
    </ul>
  </div>
</nav>


</div>
<div class="row">
  <section class="content">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="pull-left"><h3>Listado de Dispositivos con Mediciones</h3></div>
          <div class="table-container">
            <table id="mytable" class="table table-bordred table-striped">
             <thead>
               <th>Nombre</th>
               <th>Tipo</th>
               <th>Ubicacion</th>
               <th>Topico</th>
               <th>Ver Mediciones</th>
             </thead>
             <tbody>
              @if($dispositivos->count())  
              @foreach($dispositivos as $dispositivo)  
              <tr>
                <td>{{$dispositivo->nombre}}</td>
                <td>{{$dispositivo->tipo}}</td>
                <td>{{$dispositivo->ubicacion}}</td>
                <td>{{$dispositivo->topic}}</td>
                <td>
                <a href='{{"Mediciones/".$dispositivo->nombre."/".$dispositivo->nombre."-".str_replace("/","-",$dispositivo->tipo)."/".date("d-m-Y",time()-3*60*60)  }}' class="btn btn-xs btn-info" ><span class="glyphicon glyphicon-signal"></a> 
                </td>
               </tr>
               @endforeach 
               @else
               <tr>
                <td colspan="8">No hay dispositivos con mediciones</td>
              </tr>
              @endif
            </tbody>
 
          </table>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection