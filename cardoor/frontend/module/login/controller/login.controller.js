cardoor.controller('loginCtrl', function($scope, services, toastr, $timeout, localstorageService) {

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
                // $timeout( function(){
                // 	loginService.login();
		        //     location.href = '.';
		        // }, 3000 );
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

	$scope.chanPasswd = function(){
		var user = $scope.recover.rusername
		services.post('login','send_mail_rec',{'rpuser':JSON.stringify(user)})
		.then(function (response) {
			console.log(response);
			// if (response.success) {
			// 	toastr.success('Revisa tu correo electronico', 'Perfecto',{
            //         closeButton: true
            //     });
            //     $timeout( function(){
		    //         location.href = '#/';
		    //     }, 3000 );
			// }else{
			// 	toastr.error(response.error.rpuser, 'Error',{
            //     	closeButton: true
            // 	});
			// }
		});
	}
})