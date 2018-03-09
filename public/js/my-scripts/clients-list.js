app.controller('clientsCtrl', function ($scope, $rootScope, $http, $base64, $timeout, $window) {

    const
        _EMPTY = 0,
        _BUSY = 1,
        _FIRST = 2,
        _NEXT = 3;

    $scope.filter = '';
    $scope.quene = _EMPTY;

    angular.element(document.querySelector('#fixTable')).bind('scroll', function () {

        var pos = document.getElementById("fixTable").scrollTop;
        var max = document.getElementById("fixTable").clientHeight;
        var sch = document.getElementById("fixTable").scrollHeight;
        if ((pos + max) > (sch - 31)) {
            console.log(pos + ' ' + max + ' ' + sch);

            if ($scope.quene == _EMPTY) {
                $scope.listNext()
            }
            ;
        }

    })


    $scope.selectClient = function (id) {

        $rootScope.modalLetters(id);

    }

    $scope.selectClient2 = function (id) {

        $rootScope.modalClient(id);

    }


    $scope.listFirst = function () {

        if ($scope.quene != _EMPTY) {

            $scope.quene = _FIRST;
            return;
        }

        document.getElementById("fixTable").scrollTop = 0;
        Name = $scope.dupa;
        $scope.filter = Name;
        $scope.quene = _BUSY;
        if (Name == null) Name = ' ';
        console.log('(((((' + Name + ')))))');

        var uri = encodeURI(root + 'api/customers/0/10?search=' + Name);
        $http({
            method: 'GET',
            url: uri,
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            }

        })
            .then(function (response) {

                if (response.data.length == 10) {
                    $scope.hide_loader = false;
                }
                else {
                    $scope.hide_loader = true;
                }

                $scope.customers = response.data;

                if ($scope.quene == _FIRST) {

                    $scope.quene = _EMPTY;
                    $scope.listFirst();
                }
                else if ($scope.quene == _NEXT) {

                    $scope.quene = _EMPTY;
                    $scope.listNext();
                }
                else {
                    $scope.quene = _EMPTY;
                }

            }, function (rejection) {
                $scope.quene = _EMPTY;
            });
    }


    $scope.listNext = function () {

        if ($scope.quene != _EMPTY) {

            $scope.quene = _NEXT;
            return;
        }

        Name = $scope.dupa;
        if ($scope.filter != Name) {

            $scope.listFirst();
            return;
        }

        $scope.quene = _BUSY;
        Limit = $scope.customers.length;
        $http({
            method: 'GET',
            url: root + 'api/customers/' + Limit + '/10?search=' + Name,
            data: $.param({
                name: Name,
                limit: Limit
            }),
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            }

        })
            .then(function (response) {
                if (response.data.length) {
                    $scope.hide_loader = false;
                    $scope.customers = $scope.customers.concat(response.data);
                }
                else {
                    $scope.hide_loader = true;
                }
                if ($scope.quene == _FIRST) {

                    $scope.quene = _EMPTY;
                    $scope.listFirst();
                }
                else if ($scope.quene == _NEXT) {

                    $scope.quene = _EMPTY;
                    $scope.listNext();
                }
                else {
                    $scope.quene = _EMPTY;
                }


            }, function (rejection) {

                $scope.quene = _EMPTY;
            });
    }


    $scope.listFirst();


});