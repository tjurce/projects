//Skripta za kontroliranje albums.html stranice i prikazivanja podataka iz albumsList.js
(function() {
    angular
        .module("metallicaApp")
        .controller("albumsController", AlbumsController);
  
        AlbumsController.$inject = ["AlbumsList"];
  
        function AlbumsController(AlbumsList) {
          var vm = this;
  
          vm.data = AlbumsList.albumsData;
          vm.activeAlbum = {};
          vm.changeActiveAlbum = changeActiveAlbum;
  
  
          //funkcija koja kontrolira koji je album aktiviran
          function changeActiveAlbum(index) {
            vm.activeAlbum = index;
          }        
        }
  })();
  