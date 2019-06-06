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

cardoor.controller('profileCtrl', function($scope, services, toastr, loginService, $timeout, infoUser, userLike, load_Pais_Prov_Poblac) {


	$scope.tab = 1;

    $scope.setTab = function(newTab){
      $scope.tab = newTab;
    };

    $scope.isSet = function(tabNum){
      return $scope.tab === tabNum;
    };

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

	$scope.showLike = function(){
		$scope.sprofV = false;
		$scope.eprofV = false;
		$scope.cprofileV = true;
		$scope.infoCar = userLike;
	}
	
	$scope.logoutB = function(){
		loginService.logout();
		toastr.success('', 'Cerrando Sesion',{
            closeButton: true
        });
        $timeout( function(){
            location.href = '.';
        }, 2000 );
	}

	$scope.error = function() {
        $scope.pais_error = "";
        $scope.login.prov_error = "";
        $scope.login.pob_error = "";
    };

	load_Pais_Prov_Poblac.load_pais()
    .then(function (response) {
        if(response.success){
            $scope.paises = response.datas;
        }else{
            $scope.AlertMessage = true;
            $scope.pais_error = "Error al recuperar la informacion de paises";
            $timeout(function () {
                $scope.pais_error = "";
                $scope.AlertMessage = false;
            }, 2000);
        }
	});
	
	$scope.resetPais = function () {
        if ($scope.login.pais.sISOCode == 'ES') {
            load_Pais_Prov_Poblac.loadProvincia()
            .then(function (response) {
                if(response.success){
                    $scope.provincias = response.datas;
                }else{
                    $scope.AlertMessage = true;
                    $scope.login.prov_error = "Error al recuperar la informacion de provincias";
                    $timeout(function () {
                        $scope.login.prov_error = "";
                        $scope.AlertMessage = false;
                    }, 2000);
                }
            });
            $scope.poblaciones = null;
        }
	};


    $scope.resetValues = function () {
        var datos = {idPoblac: $scope.login.provincia.id};
        load_Pais_Prov_Poblac.loadPoblacion(datos)
        .then(function (response) {
            if(response.success){
                $scope.poblaciones = response.datas;
            }else{
                $scope.AlertMessage = true;
                $scope.login.pob_error = "Error al recuperar la informacion de poblaciones";
                $timeout(function () {
                    $scope.login.pob_error = "";
                    $scope.AlertMessage = false;
                }, 2000);
            }
        });
	};
	
	$scope.dropzoneConfig = {
        'options': {
            'url': 'cardoor/backend/index.php?module=login&function=upload_avatar',
            addRemoveLinks: true,
            maxFileSize: 1000,
            dictResponseError: "Ha ocurrido un error en el server",
            acceptedFiles: 'image/*,.jpeg,.jpg,.png,.gif,.JPEG,.JPG,.PNG,.GIF,.rar,application/pdf,.psd'
        },
        'eventHandlers': {
            'sending': function (file, formData, xhr) {},
            'success': function (file, response) {
				response = JSON.parse(response);
                if (response.result) {
					toastr.success('Subida correctamente', 'Perfecto',{
						closeButton: true
					});
                } else {
                    $(".msg").addClass('msg_error').removeClass('msg_ok').text(response['error']);
                    $('.msg').animate({'right': '300px'}, 300);
                }
            },
            'removedfile': function (file, serverFileName) {
                if (file.xhr.response) {
                    $('.msg').text('').removeClass('msg_ok');
                    $('.msg').text('').removeClass('msg_error');
                    var data = jQuery.parseJSON(file.xhr.response);
                    services.post("dogs", "delete_dog", JSON.stringify({'filename': data.data}));
                }
            }
		}
	};

	$scope.saveAvatar = function () {
		services.put('login','change_avatar',{'auser':infoUser.user}).then(function (response) {
			console.log(infoUser.user);
			if (response === '1') {
				toastr.success('Cambios guardados correctamente', 'Perfecto',{
                    closeButton: true
                });
                // $uibModalInstance.dismiss('cancel');
                $timeout( function(){
		            location.href = '#/';
		            location.href = '#/profile';
		        }, 1500 );
			}
		});
	};

	$scope.sendPro = function (user) {
		services.put('login','change_profile',
		{'prof_data':JSON.stringify({'nombreP':$scope.userInfo.nombre,'apellidoP':$scope.userInfo.apellido,'paisP':$scope.login.pais.sName,'porvinP':$scope.login.provincia.nombre,'poblaP':$scope.login.poblacion.poblacion,'user':user})})
		.then(function (response) {
			console.log(response);
			if (response.success) {
				toastr.success('Cambios guardados correctamente', 'Perfecto',{
                    closeButton: true
                });
                $scope.sprofV = true;
				$scope.eprofV = false;
				$scope.cprofileV = false;
			}else{
				// if (response.error.fnacP) {
				// 	toastr.error(response.error.fnacP, 'Error',{
	            //     	closeButton: true
	            // 	});
				// }else{
				// 	toastr.error('Error', 'Error',{
	            //     	closeButton: true
	            // 	});
				// }
			}
		});
	};
});

cardoor.controller('likeCtrl', function($scope) {
	$scope.viewlike = function(){
		console.log("hola");
		// services.put('login','u_passwd',{'rec_pass':JSON.stringify({'recpass':$scope.recpass.rpasswd,'token':$route.current.params.token})})
		// .then(function (response) {
		// 	if (response) {
		// 			toastr.success('Contraseña cambiada correctamente', 'Perfecto',{
		// 			closeButton: true
		// 		});
		// 		$timeout( function(){
		// 			location.href = '#/';
		// 		}, 3000 );
		// 	}else{
		// 		toastr.error('Error al cambiar la contraseña', 'Error',{
		// 			closeButton: true
		// 		});
		// 	}
		// });
	}
});