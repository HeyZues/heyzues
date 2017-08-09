@extends('master')
@section('title', 'Home')
@section('content')
<div ui-content-for="title">
  <span>Drag</span>
</div>

<div class="scrollable"> 
  <div class="scrollable-content">
  <legend>Login</legend>
<div class="alert alert-danger">
  Drag right to dismiss notices!
</div> 
    <div class="container-fluid">

      <div class="notices-container">
        <div ng-repeat="notice in notices"
          drag-to-dismiss="deleteNotice(notice)"
          class="section section-break">
          <i class="fa fa-<%notice.icon%>"></i> <%notice.message%>
        </div>
      </div>
    </div>
    <br/>
  </div>
</div>
@endsection