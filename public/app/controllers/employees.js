var app = angular.module('employeeRecords', [])
      .constant('API_URL', document.URL + 'employe');
app.controller('employeesController', function($scope, $http, API_URL, $location) {
var global_base_url = $location.absUrl().split('?')[0];
 $scope.emp = {};

    //retrieve employees listing from API
    $http.get(API_URL)
            .success(function(response) {
                $scope.employees = response;
            });
    
    //show modal form
    $scope.toggle = function(modalstate, id) {
        $scope.modalstate = modalstate;

        switch (modalstate) {
            case 'add':
                $scope.form_title = "Add New Employee";
                break;
            case 'edit':
                $scope.form_title = "Employee Detail";
                $scope.id = id;
                $http.get(API_URL + 'employees/' + id)
                    .success(function(response) {
                        alert(response);
                        $scope.employee = response;
                    });
                break;
            default:
                break;
        }
        alert(id);
        $('#myModal').modal('show');
    }

    $scope.login = function(){
       alert('submit form');
    }

    $scope.action = function(){
        //retrieve employees listing from API
      $http.get(global_base_url + 'employe')
            .success(function(response) {
           $scope.employees = response;
           $scope.emp.email = response[0].email;
           $scope.emp.contact_number = response[0].contact_number;
           $scope.emp.name = response[0].name;


          /*  angular.forEach(response, function (value, key) {
               alert(response[key].email);        
            });*/
        });
    }

    //save new record / update existing record
    $scope.save = function(modalstate, id) {
        var url = API_URL;
        
        //append employee id to the URL if the form is in edit mode
        if (modalstate === 'edit'){
            url += "/" + id;
        }
        
        $http({
            method: 'POST',
            url: url,
            data: $.param($scope.employee),
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).success(function(response) {
            alert(response);
            location.reload();
        }).error(function(response) {
            alert(response);
            alert('This is embarassing. An error has occured. Please check the log for details');
        });
    }

    //delete record
    $scope.confirmDelete = function(id) {
        var isConfirmDelete = confirm('Are you sure you want this record?');
        if (isConfirmDelete) {
            $http({
                method: 'DELETE',
                url: API_URL + 'employees/' + id
            }).
                    success(function(data) {
                        alert(data);
                        location.reload();
                    }).
                    error(function(data) {
                        alert(data);
                        alert('Unable to delete');
                    });
        } else {
            return false;
        }
    }


});
