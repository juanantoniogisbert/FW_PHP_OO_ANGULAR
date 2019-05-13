cardoor.controller('shopCtrl', function($scope, shop) {
    $scope.shop = shop;
    $scope.currentPage = 1;
    $scope.carpage = $scope.shop.slice(0,6);
    $scope.bootpageV = true;

    $scope.pageChanged = function() {
        var startPos = ($scope.currentPage - 1) * 6;
        $scope.carpage = $scope.shop.slice(startPos, startPos + 6);
    };

    $scope.selectSearch = function(){
        // breed_dog = [];
        // if ($scope.breedSelected.breeds) {
        //     breed = $scope.breedSelected.breeds;
        // }else if($scope.breedSelected){
        //     breed = $scope.breedSelected;
        // }

        breed = breed.toLowerCase();
        adoptions.forEach(function(data){
            if(data.breed.toLowerCase().indexOf(breed) !== -1){
                breed_dog.push(data);
            }
        });
        
            if (breed_dog.length === 1) {
                $scope.data = breed_dog;
                $scope.carpage = breed_dog.slice(0,6);
                $scope.infoV = false;
                $scope.detailsV = true;
                $scope.bootpageV = false;
            }else if (breed_dog.length > 1){
                $scope.adoptions = breed_dog;
                $scope.carpage = breed_dog.slice(0,6);
                $scope.infoV = true;
                $scope.detailsV = false;
                $scope.bootpageV = true;
            }else{
                toastr.error('No hay coincidencias con la busqueda', 'Sin resultados',{
                    closeButton: true
                });
            }
    }
});