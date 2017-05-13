var app = angular.module('mainCtrl', []);

app.controller('mainController', [function() {

	var vm = this;

}]);

app.controller('locationController', ['$location', function($location) {
    var vm = this;

    // Es asignada desde el index con laravel
    vm.baseURL;

    vm.isActive = function(viewLocation) {
    	var paginaActual = $location.absUrl().replace(vm.baseURL, "");
        var bool = paginaActual.indexOf(viewLocation) !== -1;
        return bool;
    };
}]);