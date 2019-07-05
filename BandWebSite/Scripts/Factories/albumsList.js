//Skripta sadrži podatke o albumima u JSON formatu i te podatke koristi albums.js skripta
(function() {
    angular
        .module("metallicaApp")
        .factory("AlbumsList", DataFactory);
  
        function DataFactory() {
          var dataObj = {
            albumsData: albumsData
          };
  
          return dataObj;
        }
  
        var albumsData = [
          {
            name: "Kill 'Em All",
            image_url: "https://images-na.ssl-images-amazon.com/images/I/61LU9smy0oL._SL1052_.jpg",
            genres: "Trash metal",
            year: "1983",
            songs_num: "10",
            songs: "\nHit the Lights\nThe Four Horsemen\nMotorbreath\nJump in the Fire\n(Anesthesia)-Pulling Teeth\nWhiplash\nPhantom Lord\nNo Remorse\nSeek & Destroy\nMetal Militia"
          },

          {
            name: "Ride the Lightning",
            image_url: "https://images-na.ssl-images-amazon.com/images/I/71jyH5WtmFL._SL1425_.jpg",
            genres: "Trash metal",
            year: "1984",
            songs_num: "8",
            songs: "\nFight Fire with Fire\nRide the Lightning\nFor Whom the Bell Tolls\nFade to Black\nTrapped Under Ice\nEscape\nCreeping Death\nThe Call of Ktulu"
          },

          {
            name: "Master of Puppets",
            image_url: "https://images-na.ssl-images-amazon.com/images/I/810AxLh7%2BQL._SL1425_.jpg",
            genres: "Trash metal",
            year: "1986",
            songs_num: "8",
            songs: "\nBattery\nMaster of Puppets\nThe Thing That Should Not Be\nWelcome Home (Sanitarium)\nDisposable Heroes\nLeper Messiah\nOrion\nDamage, Inc."
          },

          {
            name: "...And Justice for All",
            image_url: "https://images-na.ssl-images-amazon.com/images/I/81Guo2jMPGL._SL1425_.jpg",
            genres: "Trash metal, progressive metal",
            year: "1988",
            songs_num: "9",
            songs: "\nBlackened\n...And Justice for All\nEye of the Beholder\nOne\nThe Shortest Straw\nHarvester of Sorrow\nThe Frayed Ends of Sanity\nTo Live Is To Die\nDyers Eve"
          },

          {
            name: "Metallica (The Black Album)",
            image_url: "http://www.musicbanter.com/attachments/album-reviews/5892d1429802468-metallicas-black-album-metallica_black-album.jpg",
            genres: "Heavy metal",
            year: "1991",
            songs_num: "12",
            songs: "\nEnter Sandman\nSad but True\nHolier Than Thou\nThe Unforgiven\nWherever I May Roam\nDon't Tread on Me\nThrough the Never\nNothing Else Matters\nOf Wolf and Man\nThe God That Failed\nMy Friend of Misery\nThe Stuggle Within"
          },

          {
            name: "Load",
            image_url: "https://i.ytimg.com/vi/F9AE3K3_MAo/maxresdefault.jpg",
            genres: "Hard Rock, heavy metal, alternative metal",
            year: "1996",
            songs_num: "14",
            songs: "\nAin't My Bitch\n2 X 4\nThe House That Jack Built\nUntil It Sleeps\nKing Nothing\nHero of the Day\nBleeding Me\nCure\nPoor Twisted Me\nWasting My Hate\nMama Said\nThorn Within\nRonnie\nThe Outlaw Torn"
          },

          {
            name: "Reload",
            image_url: "http://www.progarchives.com/progressive_rock_discography_covers/4022/cover_372861112016_r.jpg",
            genres: "Hard Rock, heavy metal, alternative metal",
            year: "1997",
            songs_num: "13",
            songs: "\nFuel\nThe Memory Remains\nDevil's Dance\nThe Unforgiven II\nBetter than You\nSlither\nCarpe Diem Baby\nBad Seed\nWhere the Wild Things Are\nPrince Charming\nLow Man's Lyric\nAttitude\nFixxxer"
          },

          {
            name: "St. Anger",
            image_url: "http://www.progarchives.com/progressive_rock_discography_covers/4022/cover_284361112016_r.jpg",
            genres: "Heavy metal",
            year: "2003",
            songs_num: "11",
            songs: "\nFrantic\nSt. Anger\nSome Kind of Monster\nDirty Window\nInvisible Kid\nMy World\nShoot Me Again\nSweet Amber\nThe Unnamed Feeling\nPurify\nAll Within My Hands"
          },

          {
            name: "Death Magnetic",
            image_url: "https://images-na.ssl-images-amazon.com/images/I/91aZBftKeUL._SL1425_.jpg",
            genres: "Heavy metal, trash metal",
            year: "2008",
            songs_num: "10",
            songs: "\nThat Was Just Your Life\nThe End of the Line\nBroken, Beat & Scarred\nThe Day That Never Comes\nAll Nightmare Long\nCyanide\nThe Unforgiven III\nThe Judas Kiss\nSuicide & Redemption\nMy Apocalypse"
          },

          {
            name: "Hardwired... to Self-Destruct",
            image_url: "http://fasterlouder.junkee.com/wp-content/uploads/2016/11/20160818_193928_7549_939483.jpeg",
            genres: "Heavy metal, thrash metal",
            year: "2016",
            songs_num: "12",
            songs: "\nHardwired\nAtlas, Rise\nNow That We're Dead\nMoth into Flame\nDream No More\nHalo on Fire\nConfusion\nManUNkind\nHere Comes Revenge\nAm I Savage?\nMurder One\nSpit Out the Bone"
          }
        ]
  })();
  