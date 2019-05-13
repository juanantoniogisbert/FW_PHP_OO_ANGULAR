var cardoor = angular.module('cardoor',['ngRoute', 'toastr', 'ui.bootstrap']);
cardoor.config(['$routeProvider',
    function ($routeProvider) {
        $routeProvider

            // Home
            .when("/", {templateUrl: "cardoor/frontend/module/home/view/home.view.html", controller: "mainCtrl",
                resolve: {
                    marcas: function (services) {
                        return services.get('home','select_name_car_auto');
                    },
                    modelos: function (services) {
                        return services.get('home','more_cars');
                    }
                }
            })

            // .when("/shop/:id", {
            //     templateUrl: "cardoor/frontend/module/shop/view/shop.view.html",
            //     controller: "detailsBCtrl",
            //     resolve: {
            //         selbreed: function (services, $route) {
            //             return services.get('shop', 'load_list', $route.current.params.id);
            //         }
            //     }
            // })

            .when("/shop", {
                templateUrl: "cardoor/frontend/module/shop/view/shop.view.html", 
                controller: "shopCtrl",
                resolve: {
                    shop: function (services) {
                        return services.get('shop', 'view_cars_shop');
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
