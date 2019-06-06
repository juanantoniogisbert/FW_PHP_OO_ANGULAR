cardoor.factory("CommonService", ['$rootScope','$timeout', function ($rootScope, $timeout) {
    var service = {};
    service.banner = banner;
    service.amigable = amigable;
    service.openModal = openModal;
    return service;

    function banner(message, type) {
        $rootScope.bannerText = message;
        $rootScope.bannerClass = 'alertbanner aletbanner' + type;
        $rootScope.bannerV = true;

        $timeout(function () {
            $rootScope.bannerV = false;
            $rootScope.bannerText = "";
        }, 5000);
    }
    
    function amigable(url) {
        var link = "";
        url = url.replace("?", "");
        url = url.split("&");

        for (var i = 0; i < url.length; i++) {
            var aux = url[i].split("=");
            link += aux[1] + "/";
        }
        return link;
    }


    function openModal(id,modul,funct) {
        var modalInstance = $uibModal.open({
            animation: 'true',
            templateUrl: 'cardoor/frontend/module/home/view/details.view.html',
            controller: 'detailsBCtrl',
            windowClass : 'show',
            size: "lg",
            resolve: {
                dog: function (services, $route) {
                    return services.get(modul, funct, id);
                }
            }
        });
    }
}]);
