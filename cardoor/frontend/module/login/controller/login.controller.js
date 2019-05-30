cardoor.controller('loginCtrl', function($scope, services, toastr, $timeout, localstorageService, loginService) {
	$scope.recpassV = false;
	$scope.butpassV = true;

	// if (!$rootScope.cont) {
	// 	$rootScope.cont=0;
	// }
	// if ($rootScope.cont === 0) {
	// 	socialService.initialize();
	// 	$rootScope.cont=1;
	// }

    $scope.submitRegister = function(){
		var data = {'rusername':$scope.register.rusername,'rmail':$scope.register.rmail,'rpasswd':$scope.register.rpasswd};
		services.post('login','validate_register',{'total_data':JSON.stringify(data)})
		.then(function (response) {
			if (response.success) {
					toastr.success('Revisa tu correo electronico', 'Perfecto',{
                    closeButton: true
                });
                $timeout( function(){
		            location.href = '#/';
		        }, 3000 );
			}else{
				console.log(response);
				toastr.error(response.error.rusername, 'Error',{
					closeButton: true
            	});
			}
		});
	};

	$scope.submitLogin = function(){
		services.put('login','validate_login',{'total_data':JSON.stringify({'lusername':$scope.login.lusername,'lpasswd':$scope.login.lpasswd})})
		.then(function (response) {
			console.log(response);
			if (response.success) {
				localstorageService.setUsers(response.tokenlog);
					toastr.success('Inicio de sesion correcto', 'Perfecto',{
                    closeButton: true
                });
                $timeout( function(){
                	loginService.login();
		            location.href = '#/';
		        }, 1500 );
			}else{
				if (response.error.lusername) {
					toastr.error(response.error.lusername, 'Error',{
	                	closeButton: true
	            	});
				}else if(response.error.lpasswd){
					toastr.error(response.error.lpasswd, 'Error',{
	                	closeButton: true
	            	});
				}else{
					toastr.error('Error', 'Error',{
	                	closeButton: true
	            	});
				}
			}
		});
	};

	$scope.recupass = function(){
		$scope.butpassV = false;
		$scope.recpassV = true;
	}

	$scope.chanPasswd = function(){
		var user = $scope.recover.lusername
		services.post('login','mail_rec_passwd',{'recuser':JSON.stringify(user)})
		.then(function (response) {
			console.log(response);
			if (response.success) {
				toastr.success('Revisa tu correo electronico', 'Perfecto',{
                    closeButton: true
                });
                $timeout( function(){
		            location.href = '#/';
		        }, 3000 );
			}else{
				toastr.error(response.error.recuser, 'Error',{
                	closeButton: true
            	});
			}
		});
	}

});

cardoor.controller('passwdChangeCtrl', function($scope, services, $route, toastr, $timeout) {
	$scope.submitRecPass = function(){
		services.put('login','u_passwd',{'rec_pass':JSON.stringify({'recpass':$scope.recpass.rpasswd,'token':$route.current.params.token})})
		.then(function (response) {
			if (response) {
					toastr.success('Contraseña cambiada correctamente', 'Perfecto',{
					closeButton: true
				});
				$timeout( function(){
					location.href = '#/';
				}, 3000 );
			}else{
				toastr.error('Error al cambiar la contraseña', 'Error',{
					closeButton: true
				});
			}
		});
	}
});

cardoor.controller('profileCtrl', function($scope, services, toastr, loginService, $timeout, infoUser) {
	$scope.sprofV = true;
	$scope.eprofV = false;
	$scope.cprofileV = false;
	$scope.avatar = infoUser[0].avatar;
	$scope.userInfo = infoUser[0];
	
	$scope.showSprof = function(){
		$scope.sprofV = true;
		$scope.eprofV = false;
		$scope.cprofileV = false;
	}
	$scope.showEprof = function(){
		$scope.sprofV = false;
		$scope.eprofV = true;
		$scope.cprofileV = false;
	}
	// $scope.showCdogs = function(){
	// 	$scope.sprofV = false;
	// 	$scope.eprofV = false;
	// 	$scope.cprofileV = true;
	// 	$scope.infoDogs = infoUser.dog;
	// }
	// $scope.showAdogs = function(){
	// 	$scope.sprofV = false;
	// 	$scope.eprofV = false;
	// 	$scope.cprofileV = true;
	// 	$scope.infoDogs = infoUser.adoptions;
	// }
	$scope.logoutB = function(){
		loginService.logout();
		toastr.success('', 'Cerrando Sesion',{
            closeButton: true
        });
        $timeout( function(){
            location.href = '.';
        }, 2000 );
	}

	$scope.sendPro = function (user) {
		services.put('login','change_profile',
		{'prof_data':JSON.stringify({'nombreP':$scope.userInfo.name,'apellidoP':$scope.userInfo.surname,'fnacP':$scope.userInfo.birthday,'user':user})})
		.then(function (response) {
			if (response.success) {
				toastr.success('Cambios guardados correctamente', 'Perfecto',{
                    closeButton: true
                });
                $scope.sprofV = true;
				$scope.eprofV = false;
				$scope.cprofileV = false;
			}else{
				if (response.error.fnacP) {
					toastr.error(response.error.fnacP, 'Error',{
	                	closeButton: true
	            	});
				}else{
					toastr.error('Error', 'Error',{
	                	closeButton: true
	            	});
				}
			}
		});
    };
});