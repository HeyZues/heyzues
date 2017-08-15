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
<ul class="breadcrumb">
  <li><a href="{!!URL::to('/')!!}">Inicio</a></li>
  <li><a href="{!!URL::to("/".$pmethod)!!}">{{$parent}}</a></li>
  <li><a href="{{$method}}">{{$title}}</a></li>
  <li>{{$subtitle . ' [' . $id . ']'}}</li>
</ul>
	<div ng-show="response.msj" class="<%response.clase%>">
		<a href="#" class="close" ng-click="dismis()" aria-label="close">&times;</a><strong></strong><%response.msj%>
	</div>   
      <div class="panel panel-default">
        <div class="panel-heading">
          <div class="btn-group pull-right">
            <a ui-turn-on="#" class="btn">
              <i class="fa fa-angle-double-down"></i>
            </a>
          </div>
          <h3 class="panel-title" ng-init='loadData({{ $id }})'>Datos Generales</h3>
        </div>
		<div class="panel-body">
		  <form role="form" ng-submit='saveEmpoyee({{ $id }})'>
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
		    <button type="button" class="btn btn-danger" ng-click="loadData({{ $id }})">
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