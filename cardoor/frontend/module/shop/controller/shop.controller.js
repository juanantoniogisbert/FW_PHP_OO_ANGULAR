cardoor.controller('shopCtrl', function($scope, shop, localstorageService, services, toastr) {
    $scope.details = false;
    $scope.shopCars = true;
    $scope.shop = shop;
    $scope.currentPage = 1;
    $scope.carpage = $scope.shop.slice(0,3);
    $scope.bootpageV = true;

    $scope.open = function (id) {
        services.put('shop','list_details',{'id':id})
		.then(function (response) {
            console.log(response[0]);
            $scope.shop = response[0];
        });
        $scope.details = true;
        $scope.shopCars = false;
    };

    $scope.volver = function(){
        location.reload();
        $scope.details = false;
        $scope.shopCars = true;
    }

    $scope.pageChanged = function() {
        var startPos = ($scope.currentPage - 1) * 3;
        $scope.carpage = $scope.shop.slice(startPos, startPos + 3);
    };

    $scope.selectSearch = function(){
        if ($scope.marcaSelected.marca) {
            marca = $scope.marcaSelected.marca;
        }else if($scope.marcaSelected){
            marca = $scope.marcaSelected;
        }else{
            console.log("adios");
        }
        if (marca) {
            console.log(marca);
            location.href = '#/shop/'+marca;
            // console.log(marca);
            // services.get('home', 'load_car_name', marca).then(function (response) {
            //     $scope.marca = response;
            // });
        }
    }

    $scope.likeCar = function (matricula) {
        token = localstorageService.getUsers();
        services.put('shop','like_car',{"all_info":JSON.stringify({'matricula':matricula,'token':token})}).then(function (response) {
            console.log(response);
            toastr.success('Este coche te ha gustado', 'Gracias',{
                closeButton: true
            });
                // $timeout( function(){
                //     location.href = '#';
                // }, 3000 );
        });
    };
});

cardoor.controller('shopSearch', function($scope, search_list){
    $scope.list = search_list;
    console.log(search_list);
    // $scope.filter_list = true;
    // $scope.all_list = false;
});