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
  <li><a href="{{$method}}">{{$title}}</a></li>
  <li>{{$subtitle}}</li>
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
          <h3 class="panel-title">Campos de filtro</h3>
        </div>
		<div class="panel-body">
			<div class="col-xs-1">
		        <div class="form-group float-label-control">
		          <input type="text" class="form-control" placeholder="Id"
		                 ng-model="gridApi.grid.columns[0].filters[0].term">
		        </div>
	        </div>		
			<div class="col-xs-3">
		        <div class="form-group float-label-control">
		          <input type="text" class="form-control" placeholder="Nombre"
		                 ng-model="gridApi.grid.columns[1].filters[0].term">
		        </div>
	        </div>
			<div class="col-xs-3">
		        <div class="form-group float-label-control">
		          <input type="text" class="form-control" placeholder="Correo"
		                 ng-model="gridApi.grid.columns[2].filters[0].term">
		        </div>
	        </div>
			<div class="col-xs-3">
		        <div class="form-group float-label-control">
		          <input type="text" class="form-control" placeholder="Contacto"
		                 ng-model="gridApi.grid.columns[3].filters[0].term">
		        </div>
	        </div>	   			
		</div>
      </div>
    <div class="row">
        <div class="col-xs-12">
          <div class="btn-group btn-group-justified">
	        <div class="btn-group">
	        	<button id="button-dash" title="Actualizar" ng-click="loadData('')" type="button" class="btn btn-default" data-toggle="tooltip">
	        	<span class="fa fa-refresh"></span>&nbsp; Actualizar
	        	</button>
	        </div>          
	        <div class="btn-group">
	        	<button id="button-dash" title="Nuevo" ng-click="nuevo()" type="button" class="btn btn-default" data-toggle="tooltip">
	        	<span class="fa fa-file"></span>&nbsp; Nuevo
	        	</button>
	        </div>
	        <div class="btn-group">
	        	<button id="button-dash" title="Editar" ng-click="editar()" type="button" class="btn btn-default" data-toggle="tooltip">
	        	<span class="fa fa-pencil"></span>&nbsp; Editar
	        	</button>
	        </div>	        
	        <div class="btn-group">
	        	<button id="button-dash" title="Eliminar" ng-click="confirmDelete()" type="button" class="btn btn-default" data-toggle="tooltip">
	        	<span class="fa fa-trash"></span>&nbsp; Eliminar
	        	</button>
	        </div>
	    </div>
        </div>
    </div>      
      <div ui-grid-selection ng-init="loadData('')" external-scopes="gridHandlers" ui-grid="employees" class="grid"></div>

    </div>
  </div>
	
</div>
@endsection