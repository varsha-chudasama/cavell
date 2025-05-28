export class Parts {
  init() {
    this.AudioPlay();
    this.ReadmoreToggle();
    this.AgendaTitle();
    this.ReportsButton();
  }
  AudioPlay() {
let youtubePlayer;
  let vimeoPlayer;

  // Delay init of YouTube player until iframe is loaded
  function initYouTubePlayer() {
    const $youtubeIframe = $("#youtube-player");
    if ($youtubeIframe.length > 0 && typeof YT !== "undefined" && YT.Player) {
      youtubePlayer = new YT.Player("youtube-player", {
        events: {
          onReady: function () {
            console.log("YouTube player ready");
          }
        }
      });
    } else {
      // Retry after short delay
      setTimeout(initYouTubePlayer, 500);
    }
  }

  // DOM Ready
  $(document).ready(function () {
    const $audioBtn = $(".audio-button");
    const $html5Video = $(".left-video")[0];

    // Init Vimeo
    const vimeoIframe = $("#vimeo-player")[0];
    if (vimeoIframe) {
      vimeoPlayer = new Vimeo.Player(vimeoIframe);
    }

    // Init YouTube safely
    initYouTubePlayer();

    // Audio Button Click
    $audioBtn.on("click", function () {
      let anyMuted = false;

      // HTML5 video
      if ($html5Video) {
        if ($html5Video.muted) {
          $html5Video.muted = false;
          anyMuted = true;
        } else {
          $html5Video.muted = true;
        }
      }

      // YouTube
      if (youtubePlayer && typeof youtubePlayer.isMuted === "function") {
        if (youtubePlayer.isMuted()) {
          youtubePlayer.unMute();
          anyMuted = true;
        } else {
          youtubePlayer.mute();
        }
      }

      // Vimeo
      if (vimeoPlayer) {
        vimeoPlayer.getVolume().then(function (volume) {
          if (volume === 0) {
            vimeoPlayer.setVolume(1).then(function () {
              anyMuted = true;
              updateButtonClass(anyMuted);
            });
          } else {
            vimeoPlayer.setVolume(0).then(function () {
              updateButtonClass(anyMuted);
            });
          }
        });
      } else {
        updateButtonClass(anyMuted);
      }

      function updateButtonClass(anyMuted) {
        if (anyMuted) {
          $audioBtn.addClass("pause-btn");
        } else {
          $audioBtn.removeClass("pause-btn");
        }
      }
    });
  });
  }
  ReadmoreToggle() {
    // read more and read less
    $(document).ready(function () {
      $(".toggle-read").click(function () {
        const content = $(this).siblings(".content-text");
        content.toggleClass("expanded");
        if (content.hasClass("expanded")) {
          $(this).text("Read less");
        } else {
          $(this).text("Read more");
        }
      });
    });
  }
  AgendaTitle(){
    $(document).ready(function() {
    $('.agenda-title').on('mouseenter', function() {
        $('.agenda-title').removeClass('active');
        $(this).addClass('active');

        var description = $(this).find('img').data('desc');
        $('.description').text(description);
      });
      $('.agenda-title').first().trigger('mouseenter');
    });
  }
  ReportsButton(){
    $(window).on("scroll", function() {
      if ($(window).scrollTop() >= 480) {
        $(".reports-button").addClass("reports-button-sticky");
      } else {
        $(".reports-button").removeClass("reports-button-sticky");
      }
    });
  }
}
