angular.module('webShopApp')
       .controller('users_ControllerAdmin', function ($scope, $http) {

  getAllUsers();
  getOrders();
  getPayments();

  function getAllUsers() {
    $http.get('scripts/php/getAllUsers.php')
      .then(function (response) {
        $scope.users = response.data;
        console.log($scope.users);
        
      });
  };

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