cardoor.factory("loginService", ['$location', '$rootScope', 'services','localstorageService',
function ($location, $rootScope, services,localstorageService) {
	var service = {};
	service.login = login;
	service.logout = logout;
    return service;

    function login() {
        var token = localstorageService.getUsers();
        if (token) {
            services.get('login', 'user_log',token).then(function (response) {
                if (response.type === "user") {
                    $rootScope.login_V = false;
                    $rootScope.profile_V = true;
                    $rootScope.coche_V = true;
	            } else if (response.type === "admin") {
                    $rootScope.login_V = false;
                    $rootScope.profile_V = true;
                    $rootScope.coche_V = true;
	            }else{
                    $rootScope.login_V = true;
                }
            });
        } else {
            $rootScope.login_V = true;
        }
    }

    function logout() {
        localstorageService.clearUsers();
        var webAuth = new auth0.WebAuth({
            domain:       'juagisla.eu.auth0.com',
            clientID:     'sfxhvAtO4jsHzk80Ct5HGspSKlfvR6Kh'
          });
          
          webAuth.logout({
            returnTo: 'http://localhost/www/FW_PHP_OO_ANGULAR/',
            client_id: 'sfxhvAtO4jsHzk80Ct5HGspSKlfvR6Kh'
          });
    }
}]);