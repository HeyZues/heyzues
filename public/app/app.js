var app = angular.module('employeeRecords', [])
        .constant('API_URL', 'http://localhost/laravel/public/api/v1/');


function print_r(printthis, returnoutput) {
    var output = '';

    if($.isArray(printthis) || typeof(printthis) == 'object') {
        for(var i in printthis) {
            output += i + ' : ' + print_r(printthis[i], true) + '\n';
        }
    }else {
        output += printthis;
    }
    if(returnoutput && returnoutput == true) {
        return output;
    }else {
        alert(output);
    }
}         