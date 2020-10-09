@extends('layouts.layout')
@section('content')

<style>
  div.panel_div 
  {
    height: 200px;
    min-height: 200px;
  }
  
  img
  {
    height: 100px;  
    
  }
</style>


<nav class="navbar navbar-inverse" style="margin-top: -100px">
  <div class="container-fluid">

    <ul class="nav navbar-nav">
      <li class="active"><a href="/">Home</a></li>
      <li><a href="/Dispositivo">Dispositivos</a></li>
      <li><a href="/Mediciones">Mediciones</a></li>
      <li><a href="/Comandos">Comandos</a></li>
    </ul>
  </div>
</nav>

<div class="flex-center position-ref full-height">
    <div class="content">
        <div class="title m-b-md">
                <H1>Gestion de Dispositivos - Control Hogareño</H1>
                <BR><BR>
        </div>

        <div class='col-xs-12 col-sm-6 col-md-4 col-md-offset-1 panel panel-success panel_div'><div class='panel-heading'>
            <h3 class='panel-title'><a href="/Dispositivo">Gestion de Dispositivos (Altas / Bajas / Ajustes)</a></h3>
            </div><div class='panel-body'>
            <div style='text-align:center;'><img src="{{asset('images/dispositivos.jpg')}}" alt='Dispositivo'/></div>
            </div>
        </div>

        <div class='col-xs-12 col-sm-6 col-md-4 col-md-offset-2 panel panel-info panel_div'><div class='panel-heading'>
            <h3 class='panel-title'><a href="/Mediciones">Dashboard / Mediciones</a></h3>
            </div><div class='panel-body'>
            <div style='text-align:center;'><img src="{{asset('images/dashboard.png')}}" alt='Dashboard'/></div>
            </div>
        </div>

        <div class='col-xs-12 col-sm-6 col-md-4 col-md-offset-4 panel panel-danger panel_div'><div class='panel-heading'>
            <h3 class='panel-title'><a href="/Comandos">Comandos / Actuadores</a></h3>
            </div><div class='panel-body'>
            <div style='text-align:center;'><img src="{{asset('images/comandos.jpg')}}" alt='Comandos'/></div>
            </div>
        </div>

    </div>
</div>
@endsection