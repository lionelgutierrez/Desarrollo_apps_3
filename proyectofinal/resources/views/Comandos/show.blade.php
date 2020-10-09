@extends('layouts.layout2')

@section('content')
<nav class="navbar navbar-inverse" style="margin-top: -100px">
  <div class="container-fluid">

    <ul class="nav navbar-nav">
      <li><a href="/">Home</a></li>
      <li><a href="/Dispositivo">Dispositivos</a></li>
      <li><a href="/Mediciones">Mediciones</a></li>
      <li class="active"><a href="/Comandos">Comandos</a></li>
    </ul>
  </div>
</nav>

<div class="panel panel-default">
    <div class="panel-heading">
        <H3>Envio de comandos al dispositivo: {{$dispositivo->nombre}}</H3>
    </div>
    <BR>

    <div class="panel-body">					
		<div class="table-container">
            <div class="row">
                <div class="form-group">
                    <div class="col-xs-4 col-sm-3 col-md-2">
                        <label for="nombre">Nombre: </label>&nbsp;
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <input type="text" disabled name="nombre" id="nombre" class="form-control input-sm" value="{{$dispositivo->nombre}}" >
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <div class="col-xs-4 col-sm-3 col-md-2">
                        <label for="descripcion">Descripcion: </label>&nbsp;
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <input type="text" disabled name="descripcion" id="descripcion" class="form-control input-sm" value="{{$dispositivo->descripcion}}" >
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <div class="col-xs-4 col-sm-3 col-md-2">
                        <label for="tipo">Tipo: </label>&nbsp;
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <input type="text" disabled name="tipo" id="tipo" class="form-control input-sm" value="{{$dispositivo->tipo}}" >
                    </div>
                </div>        
            </div>            
            <div class="row">
                <div class="form-group">
                    <div class="col-xs-4 col-sm-3 col-md-2">
                        <label for="ubicacion">Ubicacion: </label>&nbsp;
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <input type="text" disabled name="ubicacion" id="ubicacion" class="form-control input-sm" value="{{$dispositivo->ubicacion}}" >
                    </div>
                </div>               
            </div>   
			<BR>
 
            <div class="row">
                <div class="form-group">
                    <div class="col-xs-4 col-sm-3 col-md-2">
                        <label>Enviar Comando: </label>&nbsp;
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div id="app">
                            <mqtt-component topic='{{$dispositivo->nombre}}/led'></mqtt-component>
                        </div>        
				    </div>
                </div>
            </div>

			
		</div>
    </div>

</div>
<div class="row">
<div class="col-xs-8 col-sm-6 col-md-4">
	<a href="{{ url('/Comandos') }}" class="btn btn-info btn-block" >Volver a Listado de Dispositivos - Comandos</a>
</div>	
<BR><BR>


@endsection
