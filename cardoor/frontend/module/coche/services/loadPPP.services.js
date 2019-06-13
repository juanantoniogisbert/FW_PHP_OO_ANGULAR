cardoor.factory("load_Pais_Prov_Poblac", ['services', '$q', function (services, $q) {
    var service = {};
    service.load_pais = load_pais;
    service.loadProvincia = loadProvincia;
    service.loadPoblacion = loadPoblacion;
    return service;
    
    
    function load_pais() {
        var deferred = $q.defer();
        services.get('coche', 'load_pais_p', true).then(function (data) {
            if (data === 'error') {
                deferred.resolve({ success: false, datas: "error_load_pais" });
            } else {
                deferred.resolve({ success: true, datas: data });
            }
        });
        return deferred.promise;
    };
    
    function loadProvincia() {
        var deferred = $q.defer();
        services.get('coche', 'load_provincias', true).then(function (data) {
            if (data === 'error') {
                deferred.resolve({ success: false, datas: "error_load_provincias" });
            } else {
                deferred.resolve({ success: true, datas: data.provincias });
            }
        });
        return deferred.promise;
    };
    
    function loadPoblacion(datos) {
        var deferred = $q.defer();
        services.post("coche", "load_poblaciones", datos).then(function (data) {
            if (data === 'error') {
                deferred.resolve({ success: false, datas: "error_load_poblaciones" });
            } else {
                deferred.resolve({ success: true, datas: data.poblaciones });
            }
        });
        return deferred.promise;
    };

    function datatable(DTOptionsBuilder, DTColumnBuilder) {
        var vm = this;
        vm.dtOptions = DTOptionsBuilder
            .fromSource('data.json')
            // Add Bootstrap compatibility
            .withBootstrap();
        vm.dtColumns = [
            DTColumnBuilder.newColumn('id').withTitle('ID').withClass('text-danger'),
            DTColumnBuilder.newColumn('firstName').withTitle('First name'),
            DTColumnBuilder.newColumn('lastName').withTitle('Last name')
        ];
    }
}]);