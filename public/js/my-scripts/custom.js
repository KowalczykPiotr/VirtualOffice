var app = angular.module("mainModule", ['ngSanitize','base64'], function($interpolateProvider) {

    $interpolateProvider.startSymbol('[[');
    $interpolateProvider.endSymbol(']]');
});


app.filter("asDate", function () {
    return function (input) {
        return new Date(input);
    }
});

app.filter('to_trusted', ['$sce', function($sce){
    return function(text) {
        return $sce.trustAsHtml(text);
    }
}]);

