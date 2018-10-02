angular.module('UserService', [])

    .factory('User', function($http) {

        return {
            get : function() {
                return $http.get('api/users');
            },
            show : function(id) {
                return $http.get('api/test/' + id);
            },
            deleteUser : function(id) {
                alert("Empty function")
            }
        }

    });