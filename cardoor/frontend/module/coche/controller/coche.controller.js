cardoor.controller('cocheCtrl', function($scope, services, toastr, load_Pais_Prov_Poblac) {
    $scope.upcars = true;
    $scope.listacar = false;
    $scope.reCar = true;
    $scope.detCar = false;

	$scope.tab = 1;

    $scope.setTab = function(newTab){
      $scope.tab = newTab;
	};
	
	$scope.isSet = function(tabNum){
		return $scope.tab === tabNum;
	};

    $scope.createCar = function(){
        var data = {'radiotipo':$scope.create.radiotipo, 'matricula':$scope.create.matricula,
        'marca':$scope.create.marca,'modelo':$scope.create.modelo,'fabricante':$scope.create.fabricante,
        'color':$scope.create.color,'caballos':$scope.create.caballos,'paisC':$scope.coche.pais.sName,
        'porvinC':$scope.coche.provincia.nombre,'poblaC':$scope.coche.poblacion.poblacion};
        
        services.post('coche','create_coche',{'total_data':JSON.stringify(data)})
		.then(function (response) {
			console.log(response);
			if (response.success) {
				toastr.success('Coche registrado correctamente', 'Perfecto',{
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
					toastr.error('Error', 'Error',{
	                	closeButton: true
	            	});
				// }
			}
		});
	};
	
	$scope.dropzoneConfig = {
        'options': {
            'url': 'cardoor/backend/index.php?module=coche&function=upload_avatar',
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
    
    $scope.editcar = function (id) {
        services.put('coche','select_car_up',{'id':id})
		.then(function (response) {
            console.log(response[0]);
            $scope.upCoche = response[0];
        });
		$scope.upcars = false;
		$scope.listacar = true;
    };

    $scope.readcar = function (id) {
        services.put('coche','list_details',{'id':id})
		.then(function (response) {
            console.log(response[0]);
            $scope.upCoche = response[0];
        });
		$scope.reCar = false;
		$scope.detCar = true;
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
        if ($scope.coche.pais.sISOCode == 'ES') {
            load_Pais_Prov_Poblac.loadProvincia()
            .then(function (response) {
                if(response.success){
                    $scope.provincias = response.datas;
                }else{
                    $scope.AlertMessage = true;
                    $scope.coche.prov_error = "Error al recuperar la informacion de provincias";
                    $timeout(function () {
                        $scope.coche.prov_error = "";
                        $scope.AlertMessage = false;
                    }, 2000);
                }
            });
            $scope.poblaciones = null;
        }
	};


    $scope.resetValues = function () {
        var datos = {idPoblac: $scope.coche.provincia.id};
        load_Pais_Prov_Poblac.loadPoblacion(datos)
        .then(function (response) {
            if(response.success){
                $scope.poblaciones = response.datas;
            }else{
                $scope.AlertMessage = true;
                $scope.coche.pob_error = "Error al recuperar la informacion de poblaciones";
                $timeout(function () {
                    $scope.coche.pob_error = "";
                    $scope.AlertMessage = false;
                }, 2000);
            }
        });
    };
    
    services.put('coche', 'load_car_up').then(function (response) {
        $scope.fideus = response;
    });


    $scope.carDet = function (id) {
        services.put('coche', 'list_details',{'id':id})
        .then(function (response) {
            $scope.carRead = response;
        });
    };

    $scope.removeCar = function (id) {
        services.put('coche', 'delete_car',{'id':id})
        .then(function (response) {
            location.reload();
        });
    };


    $scope.sendCar = function () {
		var data = {'radiotipo':$scope.upCoche.radiotipo, 'matricula':$scope.upCoche.matricula,
        'marca':$scope.upCoche.marca,'modelo':$scope.upCoche.modelo,'fabricante':$scope.upCoche.fabricante,
        'color':$scope.upCoche.color,'caballos':$scope.upCoche.caballos,'paisC':$scope.coche.pais.sName,
        'porvinC':$scope.coche.provincia.nombre,'poblaC':$scope.coche.poblacion.poblacion};

        services.post('coche','change_coche',{'total_data':JSON.stringify(data)})
		.then(function (response) {
			console.log(response);
            if (response.success) {
				toastr.success('Coche modificado correctamente', 'Perfecto',{
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
					toastr.error('Error', 'Error',{
	                	closeButton: true
	            	});
				// }
			}
		});
    };
    
    $scope.volver = function(){
        location.reload();
        $scope.details = false;
        $scope.shopCars = true;
    }
});