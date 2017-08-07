<!DOCTYPE html>
<html lang="en-US" ng-app="employeeRecords">
    <head>
        <title>Laravel 5 AngularJS CRUD Example</title>
        <!-- Load Bootstrap CSS -->

        <link href="<?= asset('css/mobile-angular-ui-hover.css') ?>" rel="stylesheet">
        <link href="<?= asset('css/mobile-angular-ui-base.css') ?>" rel="stylesheet">
        <link href="<?= asset('css/mobile-angular-ui-desktop.less') ?>" rel="stylesheet">
        <link href="<?= asset('css/demo.css') ?>" rel="stylesheet">
		<link href="<?= asset('css/navbar.css') ?>" rel="stylesheet">
    </head>
    <body ui-prevent-touchmove-defaults>
        <h2>Employees Database</h2>
        <div  ng-controller="employeesController">
<div class="scrollable">
 <div class="scrollable-content section">
   
  <form role="form" ng-submit='login()'>
    <fieldset>
      <legend>Obtener la primera fila</legend>
        <div class="form-group has-success has-feedback">
          <label>Email</label>
          <input type="email"
                 ng-model="emp.email"
                 class="form-control"
                 placeholder="Enter email">
        </div>
        <div class="form-group">
          <label>Name</label>
          <input type="text" 
                 class="form-control"
                 placeholder="Name" ng-model="emp.name">
        </div>
        <div class="form-group">
          <label>Contact</label>
          <input type="text" 
                 class="form-control"
                 placeholder="Contct" ng-model="emp.contact_number">
        </div>        
        <div class="form-group">
          <label>Password</label>
          <input type="password" 
                 class="form-control"
                 placeholder="Password" ng-model="emp.password">
        </div>

        <div class="form-group">
          <label>Remember Me</label>
          <ui-switch 
            ng-model="rememberMe"></ui-switch>
        </div>
    </fieldset>
    <hr>

    <button type="submit" class="btn btn-default btn-block">
      Login
    </button>

  </form>
      <div ui-content-for="navbarAction">
     <button class="btn btn-default btn-block" ng-click="action()" style="float: right;">Reset</button>
    </div>
 </div>
</div>
        </div>
        <!-- Load Javascript Libraries (AngularJS, JQuery, Bootstrap) -->
        <script src="<?= asset('app/lib/angular/angular.min.js') ?>"></script>


        <script src="<?= asset('js/angular-route.min.js') ?>"></script>
        <script src="<?= asset('js/mobile-angular-ui.min.js') ?>"></script>
        <script src="<?= asset('js/mobile-angular-ui.gestures.min.js') ?>"></script>
 
  		<!-- Required to use $touch, $swipe, $drag and $translate services -->       

        <!-- AngularJS Application Scripts -->
        <script src="<?= asset('app/app.js') ?>"></script>
        <script src="<?= asset('app/controllers/employees.js') ?>"></script>
    </body>
</html>