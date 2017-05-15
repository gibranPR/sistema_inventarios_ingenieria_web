var app = angular.module('DataService', []);

app.factory('DataFactory', ['$window', function($window) {
	var dataFactory = {};

	dataFactory.sidebarCollapse = function() {
        return $window.localStorage.getItem('sidebar_collapse');
    };

    dataFactory.setSidebarCollapse = function(value) {
        if (value) {
            $window.localStorage.setItem('sidebar_collapse', value);
        } else {
            $window.localStorage.removeItem('sidebar_collapse');
        }
    };

	return dataFactory;
}]);