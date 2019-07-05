angular.module('webShopApp')
       .controller('orders_Controller', function ($scope, $http) {

  getOrders();
  getPayments();

  function getOrders() {
    $http.get('scripts/php/getOrders.php')
      .then(function (response) {
        $scope.orders = response.data;
      });
  };

  function getPayments() {
    $http.get('scripts/php/getPayments.php')
      .then(function (response) {
        $scope.payments = response.data;
      });
  };
});