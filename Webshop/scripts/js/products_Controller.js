angular.module('webShopApp')
       .controller('products_Controller', function ($scope, $http) {

  getProducts();
  getCatProducts();
  getBrandProducts();
  getAllProducts();
  searchProducts();

  function getProducts() {
    $http.get('scripts/php/getProducts.php')
      .then(function (response) {
        $scope.products = response.data;
      });
  };

  function getCatProducts() {
    $http.get('scripts/php/getCatPro.php')
      .then(function (response) {
        $scope.catProducts = response.data;
      });
  };

  function getBrandProducts() {
    $http.get('scripts/php/getBrandPro.php')
      .then(function (response) {
        $scope.brandProducts = response.data;
      });
  };

  function getAllProducts() {
    $http.get('scripts/php/getAllProducts.php')
      .then(function (response) {
        $scope.allProducts = response.data;
      });
  };

  function searchProducts() {
    $http.get('scripts/php/searchProducts.php')
      .then(function (response) {
        $scope.searchProducts = response.data;
      });
  };
});