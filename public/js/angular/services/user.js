app.factory('user', ['$http', function($http) {
    return $http.get('http://18.220.46.252/api/test/1')
        .success(function(data) {
            return data;
        })
        .error(function(err) {
            return err;
        });
}]);