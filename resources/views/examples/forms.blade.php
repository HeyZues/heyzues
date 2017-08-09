@extends('master')
@section('title', 'Home')
@section('content')
<div ui-content-for="title">
  <span>Forms</span>
</div>

<div class="scrollable">
 <div class="scrollable-content section">
   
  <form role="form" ng-submit='login()'>
    <fieldset>
      <legend>Login</legend>
        <div class="form-group has-success has-feedback">
          <label>Email</label>
          <input type="email"
                 ng-model="email"
                 class="form-control"
                 placeholder="Enter email">
        </div>

        <div class="form-group">
          <label>Password</label>
          <input type="password" 
                 class="form-control"
                 placeholder="Password">
        </div>

        <div class="form-group">
          <label>Remember Me</label>
          <ui-switch 
            ng-model="rememberMe"></ui-switch>
        </div>
    </fieldset>
    <hr>

    <button class="btn btn-primary btn-block">
      Login
    </button>

    <div ui-content-for="navbarAction">
      <a class="btn" ng-click="login()">Login</a>
    </div>

  </form>
 </div>
</div>
@endsection