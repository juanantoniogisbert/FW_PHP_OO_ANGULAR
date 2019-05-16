cardoor.controller('loginCtrl', function($scope, services, toastr, $timeout) {

    $scope.submitRegister = function(){
		var data = {'rusername':$scope.register.rusername,'rmail':$scope.register.rmail,'rpasswd':$scope.register.rpasswd};
		services.post('login','validate_register',{'total_data':JSON.stringify(data)})
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
				toastr.error('Revisa tu correo electronico error', 'Error',{
					closeButton: true
            	});
			}
		});
	}

	// $scope.googleLog = function(){
	// 	googleService.login();
	// };
	
	// $scope.gitLog = function(){
	// 	GitHubService.login();
	// };
})