cardoor.controller('contactCtrl', function ($scope, services, toastr) {
    $scope.contact = {
        fullname: "",
        correo: "",
        message: ""
    };
    
    $scope.SubmitContact = function () {
        var data = {"fullname": $scope.contact.fullname, "correo": $scope.contact.correo, "message": $scope.contact.message,"token":'cont_form'};
        var cont_form = JSON.stringify(data);
        console.log(cont_form);
        services.post('contact', 'send_cont', cont_form).then(function (response) {
        if (response == 'true') {
                toastr.success('El mensaje ha sido enviado correctamente', 'Mensaje enviado',{
                closeButton: true
            });
        } else {
                toastr.error('El mensaje no se ha enviado', 'Mensaje no enviado',{
                closeButton: true
            });
        }
        });
    };
});
