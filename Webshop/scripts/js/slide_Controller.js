angular.module('webShopApp')
  .controller('slide_Controller', function ($scope, $http) {

    $scope.slidespeed = 4000;
    $scope.index = 0;

    $scope.changeContentRight = function() {
      if($scope.index === $scope.slides.length) {
        $scope.index = 0;
      }
      else {
        $scope.index++;
      }
    };

    $scope.changeContentLeft = function() {
      if($scope.index === 0) {
        $scope.index = $scope.slides.length;
      }
      else {
        $scope.index--;
      }
    };

    $scope.slides = [{
        image: 'images/index_guitars.png',
        link: 'categories.php?cat_id=1'
      },
      {
        image: 'images/index_amps.png',
        link: 'categories.php?cat_id=4'
      }
    ];

  });