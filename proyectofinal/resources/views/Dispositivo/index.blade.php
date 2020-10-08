@extends('layouts.layout')
@section('content')
<nav class="navbar navbar-inverse" style="margin-top: -100px">
  <div class="container-fluid">

    <ul class="nav navbar-nav">
      <li ><a href="/">Home</a></li>
      <li class="active"><a href="/Dispositivo">Dispositivos</a></li>
      <li><a href="/Mediciones">Mediciones</a></li>
      <li><a href="/Comandos">Comandos</a></li>
    </ul>
  </div>
</nav>


</div>
<div class="row">
  <section class="content">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="pull-left"><h3>Listado de Dispositivos</h3></div>
          <div class="pull-right">
            <div class="btn-group">
              <a href="{{ route('Dispositivo.create') }}" class="btn btn-xs btn-success" ><span class="glyphicon glyphicon-plus"><strong> Agregar Dispositivo</strong></span></a>
            
            </div>
          </div>
          <div class="table-container">
            <table id="mytable" class="table table-bordred table-striped">
             <thead>
               <th>Nombre</th>
               <th>Descripcion</th>
               <th>Tipo</th>
               <th>Ubicacion</th>
               <th>Editar</th>
               <th>Eliminar</th>
               <th>Ver Mediciones</th>
               <th>Enviar Comando</th>
             </thead>
             <tbody>
              @if($dispositivos->count())  
              @foreach($dispositivos as $dispositivo)  
              <tr>
                <td>{{$dispositivo->nombre}}</td>
                <td>{{$dispositivo->descripcion}}</td>
                <td>{{$dispositivo->tipo}}</td>
                <td>{{$dispositivo->ubicacion}}</td>
                <td><a class="btn btn-primary btn-xs" href="{{action('DispositivoController@edit', $dispositivo->id)}}" ><span class="glyphicon glyphicon-pencil"></span></a></td>
                <td>
                  <form name='{{"formdelete".$dispositivo->id }}' id='{{"formdelete".$dispositivo->id }}' action="{{action('DispositivoController@destroy', $dispositivo->id)}}" method="post">
                   {{csrf_field()}}
                   <input name="_method" type="hidden" value="DELETE">
 
                   <button class="btn btn-danger btn-xs" type="button" onclick="hacerdelete('{{$dispositivo->id }}')"><span class="glyphicon glyphicon-trash"></span></button>
                   </form> 
                 </td>
                <td>
                <a href='{{"Mediciones/".$dispositivo->nombre."/".$dispositivo->nombre."-".str_replace("/","-",$dispositivo->tipo)."/".date("d-m-Y")  }}' class="btn btn-xs btn-info" ><span class="glyphicon glyphicon-signal"></a> 
                </td>
                <td>
                <a href='{{"Comandos/".$dispositivo->id }}' class="btn btn-xs btn-warning" ><span class="glyphicon glyphicon-hand-up"></a> 
                </td>

               </tr>
               @endforeach 
               @else
               <tr>
                <td colspan="8">No hay dispositivos registrados</td>
              </tr>
              @endif
            </tbody>
 
          </table>
        </div>
      </div>

    </div>
  </div>
</section>
<script src="{{ asset('js/scriptborrar.js') }}">

</script>
@endsection