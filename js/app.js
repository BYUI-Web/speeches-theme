var app = angular.module('radioApp',['ngRoute']);

app.config(function($routeProvider) {
	$routeProvider.when('/play91fm', {templateUrl: 'wp-content/themes/Radio%20Template/views/91fm.html'}).
	when('/play94fm',{templateUrl: 'wp-content/themes/Radio%20Template/views/94fm.html'}).
	when('/playOnline',{templateUrl: 'wp-content/themes/Radio%20Template/views/online.html'});
});

app.controller('mainControl',function($scope) {
	$scope.angularActive = true;
	if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
 		// some code..
 		$scope.angularActive = false;
 	}
 });

app.controller('media',function($scope, $http) {
	$http({
		url: "",
		method: "",
	}).success(function(data, status, headers, config) {
		$scope.data = data;
	}).error(function(data, status, headers, config) {
		$scope.status = status;
	});
});