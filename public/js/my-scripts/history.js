app.controller('historyCtrl', function ($scope, $rootScope, $http, $base64, $timeout, $window) {


        $scope.dupa = function (id) {

            alert(id);
        }

        $scope.inputChange = function () {


        var Name = $scope.inputClient;
        console.log('(((((' + Name + ')))))');

        var uri = encodeURI('/api/customers/0/10?search=' + Name);
        $http({
            method: 'GET',
            url: uri,
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            }
        }).then(function (response) {

            $scope.customers = response.data;
            console.log(response.data);
        }, function (rejection) {
            console.log(rejection);
        });
    }


});