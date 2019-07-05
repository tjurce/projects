//Skripta za kontroliranje band.html stranice i prikazivanja podataka iz bandMembers.js
(function() {
    angular
        .module("metallicaApp")
        .controller("bandController", BandController);
  
        BandController.$inject = ["BandMembers"];
  
        function BandController(BandMembers) {
          var vm = this;
  
          vm.data = BandMembers.bandsData;
          vm.activeMember = {};
          vm.changeActiveMember = changeActiveMember;
  
  
          //funkcija koja kontrolira koji je clan benda aktiviran
          function changeActiveMember(index) {
            vm.activeMember = index;
          }        
        }
  })();
  