@extends('master')
@section('title', 'Home')
@section('content')
<style>.ui-grid-filter-container { display: none!important; }</style>
<div ui-content-for="title">
  <span>{{ $title }}</span>
</div>
<div class="scrollable" ng-controller="EmpleadosCtrl">
  <div class="scrollable-content">
      <legend>{{ $title }}</legend>
    <div class="section">
      <div class="panel panel-default">
        <div class="panel-heading">
          <div class="btn-group pull-right">
            <a ui-turn-on="myDropdown<%idx%>" class="btn">
              <i class="fa fa-id-card-o"></i>
            </a>
          </div>
          <h3 class="panel-title">Datos Generales</h3>
        </div>
		<div class="panel-body">
		  <form role="form" ng-submit='login()'>
		    <fieldset>
		        <div class="form-group has-success has-feedback">
		          <label>Nombre</label>
					<input class="form-control" type="text" placeholder="Artisanal kale" ng-model="emp.name">
		        </div>		    
		        <div class="form-group has-success has-feedback">
		          <label>Email</label>
					<input class="form-control" type="email" placeholder="root@toor.com" ng-model="emp.email">
		        </div>

		        <div class="form-group">
		          <label>Telefono</label>
		          <input class="form-control" type="tel" placeholder="1-(555)-555-5555" ng-model="emp.contact_number">
		        </div>

		        <div class="form-group">
		          <label>Activo</label>
		          <ui-switch 
		            ng-model="rememberMe"></ui-switch>
		        </div>
		    </fieldset>
		    <hr>

		    <button class="btn btn-primary">
		      Guardar
		    </button>
		    <button class="btn btn-danger">
		      Cancelar
		    </button>
		    <div ui-content-for="navbarAction">
		      <!-- <i class="fa fa-reply-all" aria-hidden="true"></i> -->
		      <a class="btn" ng-click="login()">Salir</a>
		    </div>

		  </form>   			
		</div>
      </div>
    </div>
  </div>
</div>
@endsection