'use strict';
var app = angular.module('ZuesApp', ['ngRoute','mobile-angular-ui','mobile-angular-ui.gestures', 
  'ui.grid.selection', 'ui.grid', 'ui.grid.exporter', 'ui.grid.pagination'], function($interpolateProvider) {
        $interpolateProvider.startSymbol('<%');
        $interpolateProvider.endSymbol('%>');
    });

app.controller('ZuesCtrl', function($rootScope, $scope, $location) {
 // $scope.global_base_url = $location.absUrl().split('?')[0];
  $scope.userAgent = navigator.userAgent;
  $scope.response = {};
  $rootScope.$on('$routeChangeStart', function() { $rootScope.loading = true;  });
  $rootScope.$on('$routeChangeSuccess', function() { $rootScope.loading = false; });


});// Fin Controller


app.controller('EmpleadosCtrl',function($rootScope, $scope, $location, $http){
   $scope.emp = {};
  $scope.response = {};
   $scope.loadData = function (id) {
    $rootScope.loading = true;
    if (typeof(id) != 'undefined') {
      $http.get(global_base_url + 'employe/' + id).success(function(data, status, headers, config) {
        $rootScope.loading = false;
        $scope.employees.data = data;
        $scope.emp = data;
        if(!data[0].id ) {
          $scope.set_flashdata(data, 'alert alert-danger');
        }
      }).error(function(data, status, headers, config) {
          $scope.set_flashdata(data, 'alert alert-danger');
      });
    }
  }

  $scope.employees = {
    enableRowSelection: true,
    enableSelectAll: false,
    selectionRowHeaderWidth: 35,
    rowHeight: 35,
    showGridFooter:true, 
 /*
    enableFiltering: true,
    enableRowSelection: true,
    enableRowHeaderSelection: false,
    modifierKeysToMultiSelect: true,
    multiSelect: true,  */
    columnDefs: [
      { field: 'id', displayName: 'id', visible: true }, //0
      { field: 'name', displayName: 'Nombre', visible: true }, //0
      { field: 'email', visible: true }, //1
      { field: 'contact_number',  displayName: 'Contacto', visible: true }, //1
    ],
    onRegisterApi: function(gridApi){
      $scope.gridApi = gridApi;
      $scope.gridApi = {};
      gridApi.selection.on.rowSelectionChanged($scope,function(rows){
        alert(gridApi.selection.getSelectedRows()[0].id);
          $scope.emp = gridApi.selection.getSelectedRows();         
      });
    },
    //   showGridFooter: true,
  };

  $scope.saveEmpoyee = function(id){
    var url = global_base_url + 'employe';
  //  alert($scope.emp.name);
			if (typeof(id) != 'undefined') {
        url += "/" + id;
			} 
        $http({
            method: 'POST',
            url: url,
            data : $scope.emp,
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).success(function(response){
            $scope.set_flashdata(response, 'alert alert-success');
            //location.reload();
        }).error(function(response) {
            $scope.set_flashdata(response, 'alert alert-danger');
        }).finally(function () {
          $('#btnAuto').addClass('tile-btn-active');
        });   
  }

    //delete record
    $scope.confirmDelete = function() {
        var isConfirmDelete = confirm('Are you sure you want this record?');
        if (isConfirmDelete) {
            $http({
                method: 'DELETE',
                url: global_base_url + 'employe/' + $scope.emp[0].id
            }).
                    success(function(response) {
                        $scope.set_flashdata(response, 'alert alert-success');
                        $scope.loadData('');
                    }).
                    error(function(response) {
                        $scope.set_flashdata(response, 'alert alert-danger');
                        //slocation.reload();
                    });
        } else {
            return false;
        }
    }  


  $scope.nuevo = function(){
    window.location.href = global_base_url + 'empleado/';
  }

  $scope.editar = function(){
     window.location.href = global_base_url + 'empleado/' + $scope.emp[0].id;
  }

  $scope.Cancelar = function(){
   // $scope.emp = {};
  }

  $scope.dismis = function(){
    $scope.response.clase = "";
    $scope.response.msj = "";
  }

  $scope.set_flashdata = function(data, clase){
    $scope.response.clase = clase;
    $scope.response.msj = data;
  }  

});








app.run(function($transform) {  window.$transform = $transform; });
/*Configuracion del router*/
app.config(function($routeProvider) {
  $routeProvider.when('/', {templateUrl: 'home.html', reloadOnSearch: false});
});

// `$touch example`
//

app.directive('toucharea', ['$touch', function($touch) {
  // Runs during compile
  return {
    restrict: 'C',
    link: function($scope, elem) {
      $scope.touch = null;
      $touch.bind(elem, {
        start: function(touch) {
          $scope.containerRect = elem[0].getBoundingClientRect();
          $scope.touch = touch;
          $scope.$apply();
        },

        cancel: function(touch) {
          $scope.touch = touch;
          $scope.$apply();
        },

        move: function(touch) {
          $scope.touch = touch;
          $scope.$apply();
        },

        end: function(touch) {
          $scope.touch = touch;
          $scope.$apply();
        }
      });
    }
  };
}]);

//
// `$drag` example: drag to dismiss
//
app.directive('dragToDismiss', function($drag, $parse, $timeout) {
  return {
    restrict: 'A',
    compile: function(elem, attrs) {
      var dismissFn = $parse(attrs.dragToDismiss);
      return function(scope, elem) {
        var dismiss = false;

        $drag.bind(elem, {
          transform: $drag.TRANSLATE_RIGHT,
          move: function(drag) {
            if (drag.distanceX >= drag.rect.width / 4) {
              dismiss = true;
              elem.addClass('dismiss');
            } else {
              dismiss = false;
              elem.removeClass('dismiss');
            }
          },
          cancel: function() {
            elem.removeClass('dismiss');
          },
          end: function(drag) {
            if (dismiss) {
              elem.addClass('dismitted');
              $timeout(function() {
                scope.$apply(function() {
                  dismissFn(scope);
                });
              }, 300);
            } else {
              drag.reset();
            }
          }
        });
      };
    }
  };
});

//
// Another `$drag` usage example: this is how you could create
// a touch enabled "deck of cards" carousel. See `carousel.html` for markup.
//
app.directive('carousel', function() {
  return {
    restrict: 'C',
    scope: {},
    controller: function() {
      this.itemCount = 0;
      this.activeItem = null;

      this.addItem = function() {
        var newId = this.itemCount++;
        this.activeItem = this.itemCount === 1 ? newId : this.activeItem;
        return newId;
      };

      this.next = function() {
        this.activeItem = this.activeItem || 0;
        this.activeItem = this.activeItem === this.itemCount - 1 ? 0 : this.activeItem + 1;
      };

      this.prev = function() {
        this.activeItem = this.activeItem || 0;
        this.activeItem = this.activeItem === 0 ? this.itemCount - 1 : this.activeItem - 1;
      };
    }
  };
});

app.directive('carouselItem', function($drag) {
  return {
    restrict: 'C',
    require: '^carousel',
    scope: {},
    transclude: true,
    template: '<div class="item"><div ng-transclude></div></div>',
    link: function(scope, elem, attrs, carousel) {
      scope.carousel = carousel;
      var id = carousel.addItem();

      var zIndex = function() {
        var res = 0;
        if (id === carousel.activeItem) {
          res = 2000;
        } else if (carousel.activeItem < id) {
          res = 2000 - (id - carousel.activeItem);
        } else {
          res = 2000 - (carousel.itemCount - 1 - carousel.activeItem + id);
        }
        return res;
      };

      scope.$watch(function() {
        return carousel.activeItem;
      }, function() {
        elem[0].style.zIndex = zIndex();
      });

      $drag.bind(elem, {
        //
        // This is an example of custom transform function
        //
        transform: function(element, transform, touch) {
          //
          // use translate both as basis for the new transform:
          //
          var t = $drag.TRANSLATE_BOTH(element, transform, touch);

          //
          // Add rotation:
          //
          var Dx = touch.distanceX;
          var t0 = touch.startTransform;
          var sign = Dx < 0 ? -1 : 1;
          var angle = sign * Math.min((Math.abs(Dx) / 700) * 30, 30);

          t.rotateZ = angle + (Math.round(t0.rotateZ));

          return t;
        },
        move: function(drag) {
          if (Math.abs(drag.distanceX) >= drag.rect.width / 4) {
            elem.addClass('dismiss');
          } else {
            elem.removeClass('dismiss');
          }
        },
        cancel: function() {
          elem.removeClass('dismiss');
        },
        end: function(drag) {
          elem.removeClass('dismiss');
          if (Math.abs(drag.distanceX) >= drag.rect.width / 4) {
            scope.$apply(function() {
              carousel.next();
            });
          }
          drag.reset();
        }
      });
    }
  };
});

app.directive('dragMe', ['$drag', function($drag) {
  return {
    controller: function($scope, $element) {
      $drag.bind($element,
        {
          //
          // Here you can see how to limit movement
          // to an element
          //
          transform: $drag.TRANSLATE_INSIDE($element.parent()),
          end: function(drag) {
            // go back to initial position
            drag.reset();
          }
        },
        { // release touch when movement is outside bounduaries
          sensitiveArea: $element.parent()
        }
      );
    }
  };
}]);

app.controller('ZuesCtrl', function($rootScope, $scope) {

  $scope.swiped = function(direction) {
    alert('Swiped ' + direction);
  };

  // User agent displayed in home page
  $scope.userAgent = navigator.userAgent;

  // Needed for the loading screen
  $rootScope.$on('$routeChangeStart', function() {
    $rootScope.loading = true;
  });

  $rootScope.$on('$routeChangeSuccess', function() {
    $rootScope.loading = false;
  });

  // Fake text i used here and there.
  $scope.lorem = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. ' +
    'Vel explicabo, aliquid eaque soluta nihil eligendi adipisci error, illum ' +
    'corrupti nam fuga omnis quod quaerat mollitia expedita impedit dolores ipsam. Obcaecati.';

  //
  // 'Scroll' screen
  //
  var scrollItems = [];

  for (var i = 1; i <= 100; i++) {
    scrollItems.push('Item ' + i);
  }

  $scope.scrollItems = scrollItems;

  $scope.bottomReached = function() {
    alert('Congrats you scrolled to the end of the list!');
  };

  //
  // Right Sidebar
  //
  $scope.chatUsers = [
    {name: 'Carlos  Flowers', online: true},
    {name: 'Byron Taylor', online: true},
    {name: 'Jana  Terry', online: true}
  ];

  //
  // 'Forms' screen
  //
  $scope.rememberMe = true;
  $scope.email = 'me@example.com';

  $scope.login = function() {
    alert('You submitted the login form');
  };

  //
  // 'Drag' screen
  //
  $scope.notices = [];

  for (var j = 0; j < 10; j++) {
    $scope.notices.push({icon: 'envelope', message: 'Notice ' + (j + 1)});
  }

  $scope.deleteNotice = function(notice) {
    var index = $scope.notices.indexOf(notice);
    if (index > -1) {
      $scope.notices.splice(index, 1);
    }
  };
});

