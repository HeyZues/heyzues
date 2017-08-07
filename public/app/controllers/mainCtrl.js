/* eslint no-alert: 0 */
'use strict';
var app = angular.module('ZuesApp', ['ngRoute','mobile-angular-ui','mobile-angular-ui.gestures']);
app.controller('ZuesCtrl', function($rootScope, $scope) {
 alert('Hello From MainController');

  // User agent displayed in home page
  $scope.userAgent = navigator.userAgent;

  // Needed for the loading screen
  $rootScope.$on('$routeChangeStart', function() {
    $rootScope.loading = true;
  });

  $rootScope.$on('$routeChangeSuccess', function() {
    $rootScope.loading = false;
  });

  

});// Fin Controller

app.run(function($transform) {  window.$transform = $transform; });

/*Configuracion del router*/
app.config(function($routeProvider) {
  $routeProvider.when('/', {templateUrl: 'home.html', reloadOnSearch: false});
  $routeProvider.when('/scroll', {templateUrl: 'scroll.html', reloadOnSearch: false});
  $routeProvider.when('/toggle', {templateUrl: 'toggle.html', reloadOnSearch: false});
  $routeProvider.when('/tabs', {templateUrl: 'tabs.html', reloadOnSearch: false});
  $routeProvider.when('/accordion', {templateUrl: 'accordion.html', reloadOnSearch: false});
  $routeProvider.when('/overlay', {templateUrl: 'overlay.html', reloadOnSearch: false});
  $routeProvider.when('/forms', {templateUrl: 'forms.html', reloadOnSearch: false});
  $routeProvider.when('/dropdown', {templateUrl: 'dropdown.html', reloadOnSearch: false});
  $routeProvider.when('/touch', {templateUrl: 'touch.html', reloadOnSearch: false});
  $routeProvider.when('/swipe', {templateUrl: 'swipe.html', reloadOnSearch: false});
  $routeProvider.when('/drag', {templateUrl: 'drag.html', reloadOnSearch: false});
  $routeProvider.when('/drag2', {templateUrl: 'drag2.html', reloadOnSearch: false});
  $routeProvider.when('/carousel', {templateUrl: 'carousel.html', reloadOnSearch: false});
});
