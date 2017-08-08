<!DOCTYPE html>
<html lang="en-US">
    <head>
        <title>Laravel 5 AngularJS CRUD Example</title>
        <!-- Load Bootstrap CSS -->
        {!! Html::style('css/mobile-angular-ui-hover.css') !!}
        {!! Html::style('css/mobile-angular-ui-base.css') !!}
        {!! Html::style('css/mobile-angular-ui-desktop.css') !!}
        {!! Html::style('css/navbar.css') !!}
    </head>
    <body ng-app="ZuesApp" ng-controller="ZuesCtrl" ui-prevent-touchmove-defaults>
        @section('sidebar')
           <div ng-include="'sidebar.html'" ui-track-as-search-param="true" class="sidebar sidebar-left"></div>
        @show

      <div class="app" ui-swipe-right="Ui.turnOn('uiSidebarLeft')" ui-swipe-left="Ui.turnOff('uiSidebarLeft')">
        <!-- Navbars -->
        <div class="navbar navbar-app navbar-absolute-top">
          <div class="navbar-brand navbar-brand-center" ui-yield-to="title">
            <i><img src="img/logo.svg" style="margin-top: -5px;" width="145" height="32"></i>
          </div>
          <div class="btn-group pull-left">
            <div ui-toggle="uiSidebarLeft" class="btn sidebar-toggle">
              <i class="fa fa-bars"></i> Menu
            </div>
          </div>
          <div class="btn-group pull-right" ui-yield-to="navbarAction">
            <div ui-toggle="uiSidebarRight" class="btn sidebar-right-toggle">
              <i class="fa fa-comment"></i> Chat
            </div>
          </div>
        </div>


        <div class="navbar navbar-app navbar-absolute-bottom">
          <div class="btn-group justified">
            © 2009 Joel Friedlander
          </div>
        </div>

        <!-- App Body -->
        <div class="app-body" ng-class="{loading: loading}">
          <div ng-show="loading" class="app-content-loading">
            <i class="fa fa-spinner fa-spin loading-spinner"></i>
          </div>
       
          <div class="app-content">
            @component('alerts')
                <strong>Whoops!</strong> Something went wrong!
            @endcomponent
              Hello, {{ $saludo }}. </br>                     
              Hello, <% saludo %>.                      
            <ng-view></ng-view>
          </div>
        </div>

      </div><!-- ~ .app -->

      <div ui-yield-to="modals"></div>

        <!-- Load Javascript Libraries (AngularJS, JQuery, Bootstrap) -->
        <script src="<?= asset('app/lib/angular/angular.min.js') ?>"></script>


        <script src="<?= asset('js/angular-route.min.js') ?>"></script>
        <script src="<?= asset('js/mobile-angular-ui.min.js') ?>"></script>
        <script src="<?= asset('js/mobile-angular-ui.gestures.min.js') ?>"></script>
 
        <!-- Required to use $touch, $swipe, $drag and $translate services -->       

        <!-- AngularJS Application Scripts -->
        <script src="<?= asset('app/app.js') ?>"></script>
        <script src="<?= asset('app/controllers/mainCtrl.js') ?>"></script>
    </body>
</html>
