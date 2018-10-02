angular.module('MainController', [])

    .controller('MainController', function($scope, $http, User) {
        // object to hold all the data for the new comment form
        $scope.userData = {};

        // loading variable to show the spinning loading icon
        $scope.loading = true;

        // get all the comments first and bind it to the $scope.users object
        User.get()
            .success(function(data) {
                $scope.users = data;
                $scope.loading = false;
            });
        $scope.deleteUser = function(){
            //return deleteUser();
            alert('Hey');
        };



    });