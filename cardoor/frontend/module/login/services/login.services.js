cardoor.factory("loginService", ['$location', '$rootScope', 'services','localstorageService','socialService',
function ($location, $rootScope, services,localstorageService, socialService) {
	var service = {};
	service.login = login;
	service.logout = logout;
    return service;

    function login() {
    	var token = localstorageService.getUsers();
        if (token) {
            services.get('login', 'typeuser',token).then(function (response) {
                if (response.type === "user") {
                    $rootScope.loginV = false;
                    $rootScope.profileV = true;
                    $rootScope.ubicaV = true;
                    $rootScope.dogsV = true;
	            } else if (response.type === "admin") {
                    $rootScope.loginV = false;
                    $rootScope.profileV = true;
                    $rootScope.ubicaV = true;
                    $rootScope.dogsV = true;
	            }else{
                    $rootScope.loginV = true;
                }
            });
        } else {
            $rootScope.loginV = true;
        }
    }

    function logout() {
    	localstorageService.clearUsers();
    }
}]);