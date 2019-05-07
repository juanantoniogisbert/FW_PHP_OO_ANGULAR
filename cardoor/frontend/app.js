var cardoor = angular.module('cardoor',['ngRoute', 'toastr']);
cardoor.config(['$routeProvider',
    function ($routeProvider) {
        $routeProvider

            // Home
            .when("/", {templateUrl: "cardoor/frontend/module/home/view/home.view.html", controller: "mainCtrl",
                resolve: {
                    marcas: function (services) {
                        return services.get('home','select_name_car_auto');
                    }
                }
            })

            // Contact
            .when("/contact", {templateUrl: "cardoor/frontend/module/contact/view/contact.view.html", controller: "contactCtrl"})

            // else 404
            .otherwise("/");
    }]);

// cardoor.config([
//     'FacebookProvider',
//     function (FacebookProvider) {
//         var myAppId = '1651372404958355';
//         FacebookProvider.init(myAppId);
//     }
// ]);
