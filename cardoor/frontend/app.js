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

            .when("/home/active_user/:token", {
                resolve: {
                    recpass: function (services, $route) {
                        console.log($route.current.params.token);
                        return services.put('home','active_user',{'token':JSON.stringify({'token':$route.current.params.token})})
                        .then(function(response){
                            console.log(response);
                            location.href = '#/';
                        });
                    }
                }
            })
            
            // Shop
            .when("/shop", {
                templateUrl: "cardoor/frontend/module/shop/view/shop.view.html", 
                controller: "shopCtrl",
                resolve: {
                    shop: function (services) {
                        return services.get('shop', 'view_cars_shop');
                    }
                }
            })

            // Login
            .when("/login", {
                templateUrl: "cardoor/frontend/module/login/view/login.view.html",
                controller: "loginCtrl"
            })

            .when("/login/passwdChange/:token", {
                templateUrl: "frontend/modules/login/view/recpass.view.html",
                controller: "passwdChangeCtrl"
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
