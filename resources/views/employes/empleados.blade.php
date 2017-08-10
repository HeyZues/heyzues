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
			<div class="col-xs-3">
		        <div class="form-group float-label-control">
		          <input type="text" class="form-control" placeholder="Nombre"
		                 ng-model="gridApi.grid.columns[0].filters[0].term">
		        </div>
	        </div>
			<div class="col-xs-3">
		        <div class="form-group float-label-control">
		          <input type="email" class="form-control" placeholder="Correo"
		                 ng-model="gridApi.grid.columns[1].filters[0].term">
		        </div>
	        </div>
			<div class="col-xs-3">
		        <div class="form-group float-label-control">
		          <input type="text" class="form-control" placeholder="Contacto"
		                 ng-model="gridApi.grid.columns[2].filters[0].term">
		        </div>
	        </div>	   			
		</div>
      </div>
      <div ui-grid-selection ng-init="loadData()" external-scopes="gridHandlers" ui-grid="employees" class="grid"></div>
    </div>
  </div>
	
</div>
@endsection