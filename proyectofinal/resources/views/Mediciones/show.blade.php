@extends('layouts.layout2')


@section('content')
<nav class="navbar navbar-inverse" style="margin-top: -100px">
  <div class="container-fluid">

    <ul class="nav navbar-nav">
      <li><a href="/">Home</a></li>
      <li><a href="/Dispositivo">Dispositivos</a></li>
      <li class="active"><a href="/Mediciones">Mediciones</a></li>
      <li><a href="/Comandos">Comandos</a></li>
    </ul>
  </div>
</nav>

<div class="panel panel-default">
    <div class="panel-heading">
        <H3>Mediciones del dispositivo: {{$dispositivo}}</H3>
    </div>
    <BR>
    <!-- Seleccion de fecha. Al cambiar recarga la pagina -->
    <div class='container'>
        <div class='row'>
            <div class='col-sm-2'><label>Seleccione Fecha: </label></div>
                <div class='col-sm-4'><div class='form-group'>
                    <div class='input-group date' id='datetimepicker1'>
                        <input type='text' class='form-control' />
                        <span class='input-group-addon'><span class='glyphicon glyphicon-calendar'></span></span>
                    </div>
                </div>
            </div>
            <script type='text/javascript'>
               $(function () {
                  $('#datetimepicker1').datetimepicker({
                       locale: 'es-es',format: 'DD-MM-YYYY',
                       defaultDate: '{{substr($dia,3, 2)."/".substr($dia,0, 2)."/".substr($dia,6, 4)}}',
                       }
                    )
                    .on('dp.change',function(event){recargar("{{$dispositivo}}","{{$topic}}",event.date.format('DD-MM-YYYY'));});
                });

                function recargar(disp,topic,fecha_new)
                {
                   document.location ="/Mediciones/"+disp+"/"+topic+"/"+fecha_new;
                };         

            </script>
        </div>
    </div>



    <div class="panel-body">
        <div id="app">
            <line-chart topic='{{$topic}}' dia='{{$dia}}'></line-chart>
        </div>
    
    </div>
</div>
<div class="row">
    <div class="col-xs-8 col-sm-6 col-md-4">
        <a href="{{ url('/Mediciones') }}" class="btn btn-info btn-block" >Volver a Listado de Dispositivos y Mediciones</a>
    </div>	
</div>
<BR><BR>


@endsection
