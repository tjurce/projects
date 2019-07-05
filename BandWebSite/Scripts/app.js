var metallicaApp = angular.module('metallicaApp', ['ngRoute']);

// routing po stranicama
metallicaApp.config(function ($routeProvider) {
    $routeProvider

        .when('/', {
            templateUrl: 'home.html',
            controller: 'mainController'
        })

        .when('/news', {
            templateUrl: 'news.html'
        })

        .when('/band', {
            templateUrl: 'band.html',
            controller: 'bandController'
        })

        .when('/albums', {
            templateUrl: 'albums.html',
            controller: 'albumsController'
        })

        .when('/movie', {
            templateUrl: 'movie.html'
        })

        .when('/contact', {
            templateUrl: 'contact.html'
        });
});

// kontroleri za stranice
metallicaApp.controller('mainController', function ($scope) {
});

metallicaApp.controller('bandController', function ($scope) {
});

metallicaApp.controller('albumsController', function ($scope) {
});
