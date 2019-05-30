cardoor.factory("socialService", ['$rootScope', 'services','localstorageService','toastr','$timeout',
function ($rootScope, services, localstorageService, toastr, $timeout) {
	var service = {};
	service.initialize = initialize;
	service.insertData = insertData;
    return service;

    function initialize() {
        var webAuth = new auth0.WebAuth({
            domain: 'juagisla.eu.auth0.com',
            clientID: 'sfxhvAtO4jsHzk80Ct5HGspSKlfvR6Kh',
            redirectUri: 'http://localhost/www/FW_PHP_OO_MVC_JQUERY_NEW/cardoor/module/login/view/js/',
            audience: 'https://' + 'juagisla.eu.auth0.com' + '/userinfo',
            responseType: 'token id_token',
            scope: 'openid profile',
            leeway: 60
        });
        firebase.initializeApp(webAuth);
    };

    function insertData(user,name,email,avatar){
        var sname = name.split(' ');
        var name = sname[0];
        var surname = sname[1];
        services.post('login','log_social',
        {'data_social_net':JSON.stringify({'id_user':user,'user':user,'name':name,'surname':surname,email:email,'avatar':avatar})})
        .then(function(response){
    		localstorageService.setUsers(JSON.parse(response));
    		toastr.success('Inicio de sesion correcto', 'Perfecto',{
                closeButton: true
            });
            $timeout( function(){
	            location.href = '.';
	        }, 3000 );
    	});
    }
}]);

// cardoor.factory("GitHubService", ['$rootScope', 'services','socialService', 'toastr', '$timeout',
// function ($rootScope, services, socialService, toastr, $timeout) {
// 	var service = {};
// 	service.login = login;
//     return service;

//     function login() {
//     	var provider = new firebase.auth.GithubAuthProvider();
//         var authService = firebase.auth();

//         authService.signInWithPopup(provider).then(function(result) {
//             socialService.insertData(result.user.uid,result.user.displayName,result.user.email,result.user.photoURL);
//         })
//         .catch(function(error) {
//             var errorCode = error.code;
//             console.log(errorCode);
//             var errorMessage = error.message;
//             console.log(errorMessage);
//             var email = error.email;
//             console.log(email);
//             var credential = error.credential;
//             console.log(credential);

//             toastr.error('Inicio de sesion incorrecto', 'Error',{
//                 closeButton: true
//             });
//             $timeout( function(){
// 	            location.href = '.';
// 	        }, 3000 )
//         });
//     };

// }]);

// cardoor.factory("googleService", ['$rootScope', 'services','socialService',
// function ($rootScope, services, socialService) {
// 	var service = {};
// 	service.login = login;
//     return service;

//     function login() {
//     	var provider = new firebase.auth.GoogleAuthProvider();
//         provider.addScope('email');
//         var authService = firebase.auth();

//         authService.signInWithPopup(provider).then(function(result) {
//             socialService.insertData(result.user.uid,result.user.displayName,result.user.email,result.user.photoURL);
//         })
//         .catch(function(error) {
//             console.log('Se ha encontrado un error:', error);
//         });
//     };

// }]);
