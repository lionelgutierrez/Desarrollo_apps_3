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

<div class="row">
	<section class="content">
		<div class="col-md-8 col-md-offset-2">
			@if (count($errors) > 0)
			<div class="alert alert-danger">
                <strong>Se produjo un error: </strong> Revise los campos obligatorios.<br><br>
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
			@endif
			@if(Session::has('success'))
			<div class="alert alert-info">
				{{Session::get('success')}}
			</div>
			@endif

			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Modificacion de Dispositivo</h3>
				</div>
				<div class="panel-body">					
					<div class="table-container">
						<form method="POST" action="{{ route('Dispositivo.update',$dispositivo->id) }}"  role="form">
							{{ csrf_field() }}
							<input name="_method" type="hidden" value="PATCH">
                                <div class="row">
                                <div class="form-group">
                                    <div class="col-xs-4 col-sm-3 col-md-2">
                                     <label for="nombre">Nombre: (*)</label>&nbsp;
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6">
										<input type="text" name="nombre" id="nombre" class="form-control input-sm" value="{{$dispositivo->nombre}}" placeholder="Nombre del Dispositivo">
								    </div>
                                </div>
                            </div>    
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-xs-4 col-sm-3 col-md-2">
                                     <label for="descripcion">Descripcion: (*)</label>&nbsp;
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6">
    
										<input type="text" name="descripcion" id="descripcion" class="form-control input-sm" value="{{$dispositivo->descripcion}}" placeholder="Descripcion del Dispositivo">
									
								    </div>
                                </div>
                            </div>    
                            <div class="row">                                
                                <div class="form-group">
                                    <div class="col-xs-4 col-sm-3 col-md-2">
                                     <label for="tipo">Tipo:</label>&nbsp;
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6">
    
										<input type="text" name="tipo" id="tipo" class="form-control input-sm" value="{{$dispositivo->tipo}}" placeholder="Tipo/Clasificador del Dispositivo">
									
								    </div>
                                </div>
                            </div>    
                            <div class="row">                                
                                <div class="form-group">
                                    <div class="col-xs-4 col-sm-3 col-md-2">
                                     <label for="ubicacion">Ubicacion: (*)</label>&nbsp;
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6">
    
										<input type="text" name="ubicacion" id="ubicacion" class="form-control input-sm" value="{{$dispositivo->ubicacion}}" placeholder="Ubicacion del Dispositivo">
									
								    </div>
                                </div>                                
                            </div>    
							<div class="row">

								<div class="col-xs-12 col-sm-12 col-md-12">
									<input type="submit"  value="Actualizar" class="btn btn-success btn-block">
									<a href="{{ route('Dispositivo.index') }}" class="btn btn-info btn-block" >Volver al Listado</a>
								</div>	

							</div>
                            <h5 class="panel-footer">Loa campos con (*) son obligatorios</h5>
						</form>
					</div>
				</div>

			</div>
		</div>
	</section>
	@endsection