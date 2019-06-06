cardoor.controller('mainCtrl', function($scope, marcas, modelos, services) {
    cont = 6;
    $scope.index = 0;
    $scope.marca = marcas;
    $scope.modelo = modelos.slice(0,cont);

    $scope.scroll_more = function(){
        cont=cont+2;
        $scope.modelo = modelos.slice(0,cont);
        if (cont == 10) {
          var prov = document.querySelector('#scroll');
          prov.remove();
        }
    }

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

    // $scope.open = function (id) {
    //     console.log(id);
    //     CommonService.openModal(id,'home','list_details');
    // };

});

// cardoor.controller('detailsBCtrl', function($scope,selid,CommonService) {
//     $scope.selid = selid;
    
//     $scope.open = function (id) {
//         CommonService.openModal(id,'home','list_details');
//     };
// });

cardoor.controller('menuCtrl', function(loginService) {
    loginService.login();
});