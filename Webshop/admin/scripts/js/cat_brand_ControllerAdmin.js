angular.module('webShopApp')
       .controller('cat_brand_ControllerAdmin', function ($scope, $http) {

  getCategories();
  getBrands();

  function getCategories() {
    $http.get('scripts/php/getCategories.php')
      .then(function (response) {
        $scope.categories = response.data;
        console.log($scope.categories);
      });
  };

  function getBrands() {
    $http.get('scripts/php/getBrands.php')
      .then(function (response) {
        $scope.brands = response.data;
        console.log($scope.brands);
      });
  };
});