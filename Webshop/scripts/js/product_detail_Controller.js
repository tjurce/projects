angular.module('webShopApp')
       .controller('products_Controller', function ($scope, $http) {

  $scope.proInit = function(id, name, price, desc, image) {
    $scope.id = id.slice(1,-1);
    $scope.name = name.slice(1,-1);
    $scope.price = price.slice(1,-1);
    $scope.desc = desc.slice(1,-1);
    $scope.image = image.slice(1,-1);
   }
});