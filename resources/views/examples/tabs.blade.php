@extends('master')
@section('title', 'Home')
@section('content')
<div ui-content-for="title">
  <span>Tabs</span>
</div>
<hr>
<div class="scrollable">
 <div class="scrollable-content">
    <legend>Login</legend>
    <div class="section">
      <ui-shared-state id="activeTab" default="1"></ui-shared-state>

      <ul class="nav nav-tabs">
        <li ui-class="{'active': activeTab == 1}">
          <a ui-set="{'activeTab': 1}">Tab 1</a>
        </li>
        <li ui-class="{'active': activeTab == 2}">
          <a ui-set="{'activeTab': 2}">Tab 2</a>
        </li>
        <li ui-class="{'active': activeTab == 3}">
          <a ui-set="{'activeTab': 3}">Tab 3</a>
        </li>
      </ul>

      <div ui-if="activeTab == 1">
        <h3 class="page-header">Tab 1</h3>
        <p><%lorem%></p>
      </div>

      <div ui-if="activeTab == 2">
        <h3 class="page-header">Tab 2</h3>
        <p><%lorem%></p>
      </div>

      <div ui-if="activeTab == 3">
        <h3 class="page-header">Tab 3</h3>
        <p><%lorem%></p>
      </div>

      <div class="btn-group justified nav-tabs">
        <a ui-set="{'activeTab': 1}" 
            ui-class="{'active': activeTab == 1}" class="btn btn-default">Tab 1</a>

        <a ui-set="{'activeTab': 2}" 
            ui-class="{'active': activeTab == 2}" class="btn btn-default">Tab 2</a>

        <a ui-set="{'activeTab': 3}" 
            ui-class="{'active': activeTab == 3}" class="btn btn-default">Tab 3</a>
      </div>  
    </div>
  </div>
</div>
@endsection