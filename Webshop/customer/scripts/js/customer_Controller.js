angular.module('webShopApp')
       .controller('customer_Controller', function ($scope, $http) {

  getCustomer();
  getOrders();
  getProducts();

  function getCustomer() {
    $http.get('../customer/scripts/php/getCustomer.php')
      .then(function (response) {
        $scope.customer = response.data;
      });
  };

  function getOrders() {
    $http.get('../customer/scripts/php/getOrders.php')
      .then(function (response) {
        $scope.orders = response.data;
      });
  };

  function getProducts() {
    $http.get('../customer/scripts/php/getProducts.php')
      .then(function (response) {
        $scope.products = response.data;
      });
  };
});