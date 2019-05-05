var cardoor = angular.module('cardoor',['ngRoute', 'toastr']);
cardoor.config(['$routeProvider',
    function ($routeProvider) {
        $routeProvider

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
