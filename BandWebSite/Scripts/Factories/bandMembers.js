//Skripta sadrži podatke o članovima benda u JSON formatu i te podatke koristi band.js skripta
(function() {
    angular
        .module("metallicaApp")
        .factory("BandMembers", DataFactory);
  
        function DataFactory() {
          var dataObj = {
            bandsData: bandsData
          };
  
          return dataObj;
        }
  
        var bandsData = [
          {
            name: "James Hetfield",
            image_url: "https://differentdegrees.files.wordpress.com/2009/10/james-hetfield-metallica.jpg",
            born: "August 3, 1963. Downey, California, U.S.",
            instruments: "Vocals, guitar",
            years_active: "1978-present",
            band_time: "1981-present",
            current: true,
            past: false,
            band_position: "Co-founder, lead vocalist, rhythm guitarist and main songwriter",
            bio: "\nJames Alan Hetfield (born August 3,\n1963) is an American musician,\nsinger, and songwriter known for\nbeing the co-founder, lead vocalist,\nrhythm guitarist, and main songwriter\nfor the American heavy metal band\nMetallica. Hetfield is mainly known\nfor his intricate rhythm playing,\nbut occasionally performs lead guitar\nduties and solos, both live\nand in the studio. Hetfield co-founded\nMetallica in October 1981 after\nanswering a classified advertisement\nby drummer Lars Ulrich in the Los\nAngeles newspaper The Recycler."
          },

          {
            name: "Lars Ulrich",
            image_url: "http://moneyforlunch.com/wp-content/uploads/2014/07/lars_ulrich_world_magnetic_800.jpg",
            born: "December 26, 1963. Gentofte Municipality, Denmark",
            instruments: "Drums, percussion",
            years_active: "1980-present",
            band_time: "1981-present",
            current: true,
            past: false,
            band_position: "Co-founder and drummer",
            bio: "\nLars Ulrich R (/ˈʊlrɪk/;\nDanish: [lɑːs ˈulˀʁæɡ]; born\nDecember 26, 1963) is a Danish\nmusician, songwriter, actor, and\nrecord producer. He is best\nknown as the drummer and co-founder\nof the American heavy metal band\nMetallica. The son of tennis player\nTorben Ulrich and grandson of tennis\nplayer Einer Ulrich, he also played\ntennis in his youth and moved to Los\nAngeles at age 16 to train\nprofessionally. However, rather than\nplaying tennis, Ulrich began playing\nthe drums. After publishing an\nadvertisement in The Recycler, Ulrich\nmet vocalist/guitarist James Hetfield\nand formed Metallica."
          },

          {
            name: "Kirk Hammett",
            image_url: "https://dk1xgl0d43mu1.cloudfront.net/user_files/esp/profile_photos/002/425/212/xlarge.jpg?1409499094",
            born: "November 18, 1962. San Francisco, California, U.S.",
            instruments: "Guitar",
            years_active: "1979-present",
            band_time: "1983-present",
            current: true,
            past: false,
            band_position: "Lead guitarist, backing vocalist and contributing songwriter",
            bio: "\nKirk Lee Hammett (born November 18,\n1962) is an American musician who has\nbeen lead guitarist and a contributing\nsongwriter for the heavy metal band\nMetallica since 1983. Before joining\nMetallica he formed and named the band\nExodus. In 2003, Hammett was ranked\n11th on Rolling Stone's list of\nThe 100 Greatest Guitarists of\nAll Time. In 2009, Hammett was ranked\nnumber 15 in Joel McIver's book\nThe 100 Greatest Metal Guitarists."
          },

          {
            name: "Robert Trujillo",
            image_url: "http://www.metallica-band.50webs.com/bahan%20baku/foto/Robert_Trujillo_Sick07_800.jpg",
            born: "October 23, 1964. Santa Monica, California, U.S.",
            instruments: "Bass guitar, vocals",
            years_active: "1978-present",
            band_time: "2003-present",
            current: true,
            past: false,
            band_position: "Bassist and backing vocalist",
            bio: "\nRoberto Agustín Trujillo (Spanish\npronunciation: [roˈβerto tɾuˈxiʎo];\nborn October 23, 1964)[2] is an\nAmerican musician and songwriter best\nknown as the current bassist of the\nheavy metal band Metallica, a position\nhe has held since 2003. He was also\na member of crossover thrash metal\nband Suicidal Tendencies, funk metal\nsupergroup Infectious Grooves, heavy\nmetal band Black Label Society, and\nhas worked with Jerry Cantrell,\nand Ozzy Osbourne."
          },

          {
            name: "Dave Mustaine",
            image_url: "https://www.desktopbackground.org/download/800x600/2012/10/22/471845_dave-mustaine-megadeth-wallpapers-23361443-fanpop_1024x640_h.jpg",
            born: "September 13, 1961. La Mesa, California, U.S.",
            instruments: "Guitar, vocals",
            years_active: "1978-present",
            band_time: "1982-1983",
            current: false,
            past: true,
            band_position: "Lead guitarist and backing vocalist"
          },

          {
            name: "Ron McGovney",
            image_url: "http://metbash.ru/wp-content/uploads/2009/11/ron-mcgovney-with-fender-precision.jpg",
            born: "November 2, 1962. Los Angeles, California, U.S.",
            instruments: "Bass guitar, guitar, vocals",
            years_active: "1981-1982, 1986-1988",
            band_time: "1982",
            current: false,
            past: true,
            band_position: "Bassist and backing vocalist"
          },

          {
            name: "Cliff Burton",
            image_url: "http://2.bp.blogspot.com/--D_M5EnJ_X0/UyINDoRso5I/AAAAAAAACw4/8uZvLdI6QCo/s1600/CliffBurton.jpg",
            born: "February 10, 1962. Castro Valley, California, U.S.",
            instruments: "Bass guitar, guitar, piano, vocals",
            years_active: "1980-1986",
            band_time: "1982-1986; died 1986",
            current: false,
            past: true,
            band_position: "Bassist and backing vocalist",
          },

          {
            name: "Jason Newsted",
            image_url: "http://www.mypalmbeachpost.com/rf/image_lowres/Pub/p8/MyPalmBeachPost/2017/12/05/Images/newsEngin.20398994_newsted.jpg",
            born: "March 4, 1963. Battle Creek, Michigan, U.S.",
            instruments: "Bass guitar, vocals, guitar",
            years_active: "1981-2014, 2016-present",
            band_time: "1986-2001",
            current: false,
            past: true,
            band_position: "Bassist and backing vocalist",
          },
        ]
  })();
  