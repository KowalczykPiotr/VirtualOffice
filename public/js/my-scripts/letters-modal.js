app.controller('lettersCtrl', function ($scope, $rootScope, $http, $base64, $timeout) {

    $scope.resetForm = function () {

        $scope.provide.status = 0;
    }

    $scope.loaded = function() {


    }


    $rootScope.modalLetters = function (id) {

        $scope.customer_id = id;

        $scope.add = {};
        $scope.provide = {};
        $scope.sygnal ={};

        $scope.add.status = 'IDLE';
        $scope.provide.status = 'IDLE';
        $scope.sygnal.status = 'IDLE';

        $scope.letterType();
        $scope.tabDodaj();
        jQuery("#modalLetters").modal();
    }



    $scope.tabDodaj = function () {

        $scope.add.status = 'IDLE';
        $scope.ClientsTabUrl = './letters_modal/add'
    }


    $scope.tabWydaj = function () {

        $scope.getLetter();
        $scope.provide.status = 'IDLE';
        $scope.ClientsTabUrl = './letters_modal/provide'
    }

    $scope.tabSygnal = function () {

        $scope.getLetter();
        $scope.ClientsTabUrl = './letters_modal/sygnal'
    }

    $scope.letterType = function () {

        $http({
            method: 'GET',
            url: root+'api/letter_types/',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            }

        })
            .then(function(response) {
                console.log(response.data);
                $scope.letter_type = response.data;

            }, function(rejection) {
            });
    }


    $scope.addLetter = function () {

        $scope.add.status = 'WAIT';

        $http({
            method: 'POST',
            url: './api/letters',
            data: $.param({
                _token: _token,
                name: $scope.add.name,
                letter_type_id: $scope.add.letter_type,
                customer_id: $scope.customer_id
            }),
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            }

        })
        .then(function(response) {

            if (response.data == 'ok') {
                $scope.add.status = 'OK';
                //$timeout(function() { $scope.add.status = 0;}, 2000);
                $scope.add.name = '';
                $scope.add.letter_type = '';
            }
            else {
                $scope.add.status = 'ERROR';
            }
            console.log(response.data);
        }, function(rejection) {

            $scope.add.status = 'ERROR';
            console.log(rejection);
        });

    }


    $scope.getLetter = function () {

        var customer_id = $scope.customer_id;

        $http({
            method: 'GET',
            url: root+'api/letters/'+customer_id+'/1',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            }

        })
        .then(function(response) {
            $scope.letters = response.data;
            console.log(response.data);
        }, function(rejection) {
            $scope.letters = {};
            console.log(rejection);
        });

    }

    $scope.provideLetter = function () {

        var customer_id = $scope.customer_id;
        var data = $scope.provide;

        $scope.provide.status = 'WAIT';
        $http({
            method: 'POST',
            url: './api/letters/provide',
            data: $.param({
                _token: _token,
                customer_id: customer_id,
                list: data.id
            }),
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            }

        })
        .then(function(response) {

            if(response.data.status == 'OK') {

                $scope.provide.pdf = response.data.pdf;
                $scope.provide.status = 'OK';
            }
            else {

                $scope.provide.status = 'ERROR';
            }
            console.log(response.data);
            $scope.getLetter();

        }, function(rejection) {

            $scope.provide.status = 'ERROR';
            console.log(rejection);
            $scope.getLetter();
        });
    }

    $scope.printPdf = function (pdf) {

        $scope.provide.status = 'IDLE';
        printJS("./pdf/"+pdf+'.pdf');
    }

    $scope.sygnalLetter = function() {


        var customer_id = $scope.customer_id;
        var data = $scope.sygnal;

        $scope.sygnal.status = 'WAIT';
        $http({
            method: 'POST',
            url: './api/letters/mail',
            data: $.param({
                _token: _token,
                customer_id: customer_id,
                list: data.id
            }),
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            }

        })
        .then(function(response) {

            if(response.data == 'OK') {

                $scope.sygnal.status = 'OK';
            }
            else {

                $scope.sygnal.status = 'ERROR';
            }
            console.log(response.data);
            $scope.getLetter();

        }, function(rejection) {

            $scope.sygnal.status = 'ERROR';
            console.log(rejection);
            $scope.getLetter();
        });
    }
});