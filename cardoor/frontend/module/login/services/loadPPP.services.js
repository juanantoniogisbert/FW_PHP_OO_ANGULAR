cardoor.factory("load_Pais_Prov_Poblac", ['services', '$q', function (services, $q) {
    var service = {};
    service.load_pais = load_pais;
    service.loadProvincia = loadProvincia;
    service.loadPoblacion = loadPoblacion;
    return service;
    
    
    function load_pais() {
        var deferred = $q.defer();
        services.get('login', 'load_pais_p', true).then(function (data) {
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
        services.get('login', 'load_provincias', true).then(function (data) {
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
        services.post("login", "load_poblaciones", datos).then(function (data) {
            if (data === 'error') {
                deferred.resolve({ success: false, datas: "error_load_poblaciones" });
            } else {
                deferred.resolve({ success: true, datas: data.poblaciones });
            }
        });
        return deferred.promise;
    };
}]);