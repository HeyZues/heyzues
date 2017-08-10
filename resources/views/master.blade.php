<!DOCTYPE html>
<html lang="en-US">
    <head>
        <title>HeyZues - @yield('title')</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimal-ui" />
        <meta name="apple-mobile-web-app-status-bar-style" content="yes" />
        <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon" />        
        <!-- Load Bootstrap CSS -->
        {!! Html::style('css/mobile-angular-ui-hover.min.css') !!}
        {!! Html::style('css/mobile-angular-ui-base.min.css') !!}
        {!! Html::style('css/mobile-angular-ui-desktop.less') !!}
        {!! Html::style('css/ui-grid.min.css') !!}
        {!! Html::style('css/demo.css') !!}
        {!! Html::style('css/floating.css') !!}
    </head>
    <body ng-app="ZuesApp" ng-controller="ZuesCtrl" ui-prevent-touchmove-defaults>
        @component('sidebar')
            SideBar Here
        @endcomponent

        @component('employes/options')
            Options Bar Here
        @endcomponent      

      <div class="app" ui-swipe-right="Ui.turnOn('uiSidebarLeft')" ui-swipe-left="Ui.turnOff('uiSidebarLeft')">
        <!-- Navbars -->
        <div class="navbar navbar-app navbar-absolute-top">
          <div class="navbar-brand navbar-brand-center" ui-yield-to="title"><h3>HeyZues CRM</h3>
            {{--<i><img src="img/logo.svg" style="margin-top: -5px;" width="145" height="32"></i> --}}
          </div>
          <div class="btn-group pull-left">
            <div ui-toggle="uiSidebarLeft" class="btn sidebar-toggle">
              <i class="fa fa-bars"></i> Menu
            </div>
          </div>
          <div class="btn-group pull-right" ui-yield-to="navbarAction">
            <div ui-toggle="uiSidebarRight" class="btn sidebar-right-toggle">
              <i class="fa fa-ellipsis-v"></i>
            </div>

          </div>
        </div>


        <div class="navbar navbar-app navbar-absolute-bottom">
            <pre><%userAgent%></pre>
        </div>

          <!-- App Body -->
          <div class="app-body" ng-class="{loading: loading}">
            <div ng-show="loading" class="app-content-loading">
              <i class="fa fa-spinner fa-spin loading-spinner"></i>
            </div>                   
             @yield('content')
          </div>
        </div>

      </div><!-- ~ .app -->

<div ui-yield-to="modals"></div>
<div ui-content-for="modals">
  <div id="modal1">
<div class="modal" ui-if="modal1" ui-shared-state="modal1">
  <div class="modal-backdrop in"></div>
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button class="close" 
                ui-turn-off="modal1">&times;</button>
        <h4 class="modal-title">Modal title</h4>
      </div>
      <div class="modal-body">
        <p><%lorem%></p>
      </div>
      <div class="modal-footer">
        <button ui-turn-off="modal1" class="btn btn-default">Close</button>
        <button ui-turn-off="modal1" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
    
  </div>
  <div id="modal2">
<div class="modal modal-overlay" ui-if="modal2" ui-shared-state="modal2">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button class="close"
                ui-turn-off="modal2">&times;</button>
        <h4 class="modal-title">Overlay title</h4>
      </div>
      <div class="modal-body">
        <p><%lorem%></p>
      </div>
      <div class="modal-footer">
        <button ui-turn-off="modal2" class="btn btn-default">Close</button>
        <button ui-turn-off="modal2" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>    
  </div>
</div>


        <!-- Load Javascript Libraries (AngularJS, JQuery, Bootstrap) -->
        <script src="<?= asset('app/lib/angular/angular.min.js') ?>"></script>
        <script src="<?= asset('js/angular-route.min.js') ?>"></script>
        <script src="<?= asset('js/mobile-angular-ui.min.js') ?>"></script>
        <script src="<?= asset('js/mobile-angular-ui.gestures.min.js') ?>"></script>  
        <script src="<?= asset('js/ui-grid.min.js') ?>"></script>  
        <script src="<?= asset('app/app.js') ?>"></script>
        <script src="<?= asset('app/mainCtrl.js') ?>"></script>

        <!-- Load Javascript Libraries (AngularJS, JQuery, Bootstrap) >        
        {!! Html::script('app/lib/angular/angular.min.js') !!}        
        {!! Html::script('js/angular-route.min.js') !!}        
        {!! Html::script('js/js/mobile-angular-ui.min.js') !!}        
        {!! Html::script('js/mobile-angular-ui.gestures.min.js') !!}        
        {!! Html::script('app/app.js') !!}        
        {!! Html::script('app/mainCtrl.js') !!} 
        
        --           
    </body>
</html>
