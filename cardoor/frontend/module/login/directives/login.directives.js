cardoor.directive('datepickerp', function () {
    return {
        require: 'ngModel',
        link: function (scope, el, attr, ngModel) {
            $(el).datepicker({
                dateFormat: 'mm/dd/yy',
                changeMonth:true,
                changeYear:true,
                yearRange:"1900:2020",
                maxDate:0,
                onSelect: function (dateText) {
                    scope.$apply(function () {
                        ngModel.$setViewValue(dateText);
                    });
                }
            });
        }
    };
});
