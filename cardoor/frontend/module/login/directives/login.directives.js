cardoor.directive('datepicker', function () {
    return {
        require: 'ngModel',
        link: function (scope, el, ngModel) {
            $(el).datepicker({
                dateFormat: 'dd/mm/yy',
                changeMonth:true,
                changeYear:true,
                yearRange:"1900:2020",
                maxDate:0,
                onSelect: function (text) {
                    scope.$apply(function () {
                        ngModel.$setViewValue(text);
                        // ngModel.$render();
                    });
                }
            });
        }
    };
});
