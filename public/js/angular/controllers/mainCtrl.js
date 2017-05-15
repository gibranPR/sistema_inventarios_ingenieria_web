var app = angular.module('mainCtrl', ['DataService']);

app.controller('mainController', ['DataFactory', function(DataFactory) {

	var vm = this;

    vm.abrirModal = function(selector, identificador) {
        vm.identificador_modal = identificador;

        jQuery(selector).modal('show');
    };

	// Funciones para el botón del sidebar

	vm.sidebarCollapse = function() {
        if (DataFactory.sidebarCollapse() == 'true') {
            return true;
        } else {
            return false;
        }
    };

    vm.setSidebarCollapse = function() {
        if (DataFactory.sidebarCollapse() == 'true') {
            DataFactory.setSidebarCollapse(false);
        } else {
            DataFactory.setSidebarCollapse(true);
        }
    };

    // ////////////////////////////////////

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