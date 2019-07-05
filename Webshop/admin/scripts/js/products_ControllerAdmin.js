angular.module('webShopApp')
       .controller('products_ControllerAdmin', function ($scope, $http) {

  getAllProducts();

  function getAllProducts() {
    $http.get('scripts/php/getAllProducts.php')
      .then(function (response) {
        $scope.products = response.data;
      });
  };
});