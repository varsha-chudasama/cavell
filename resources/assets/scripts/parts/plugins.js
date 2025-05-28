import "slick-carousel";

export class Plugins {
  init() {
    this.logoSlider();
    this.ServiceCardsSlider();
    this.TeamCardsSlider();
    this.OutcomesSlider();
    this.EventSpeakerSlider();
    this.InsightsSlider();
    this.IndustrySlider();
    this.ChannelCardsSlider();
  }
  logoSlider() {
    $(".logo-slider").slick({
      slidesToShow: 6,
      cssEase: "linear",
      autoplay: true,
      autoplaySpeed: 10,
      speed: 2000,
      infinite: true,
      arrows: false,
        responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1,
          },
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
          },
        },
      ],
    });
  }
  ServiceCardsSlider() {
    $(".service-cards-slider").slick({
      dots: false,
      infinite: false,
      speed: 300,
      slidesToShow: 4,
      slidesToScroll: 1,
      arrows:false,
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1,
          },
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
          },
        },
      ],
    });
  }

  InsightsSlider() {
    $(".industry-card-slider").slick({
      dots: false,
      infinite: false,
      speed: 300,
      slidesToShow: 2,
      slidesToScroll: 1,
      arrows:false,
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
          },
        },
      ],
    });
  }

  IndustrySlider() {
    $(".insights-slider").slick({
      dots: false,
      infinite: false,
      speed: 300,
      slidesToShow: 3,
      slidesToScroll: 1,
      arrows:false,
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1,
          },
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
          },
        },
      ],
    });
  }

  ChannelCardsSlider() {
    $(".channel-cards-slider").slick({
      dots: false,
      infinite: false,
      speed: 300,
      slidesToShow: 3,
      slidesToScroll: 1,
      arrows:false,
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1,
          },
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
          },
        },
      ],
    });
  }

  TeamCardsSlider() {
     $(".team-slider-container").slick({
      slidesToShow: 4,  
      slidesToScroll:1,
      infinite: false,
      arrows: true,
        prevArrow: ".team-slider-section .prev-arrow",
        nextArrow: ".team-slider-section .next-arrow",
        responsive: [
          {
            breakpoint: 1024,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 1,
            }
          },
          {
            breakpoint: 600,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 1
            }
          },
          {
            breakpoint: 480,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1
            }
          }
        ]
    });
  }
  EventSpeakerSlider() {
     $(".event-speakers-slider").slick({
      slidesToShow: 5,  
      slidesToScroll:1,
      infinite: false,
      arrows: true,
        prevArrow: ".event-speakers-slider-section .prev-arrow",
        nextArrow: ".event-speakers-slider-section .next-arrow",
        responsive: [
          {
            breakpoint: 1024,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 1,
            }
          },
          {
            breakpoint: 600,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 1
            }
          },
          {
            breakpoint: 480,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1
            }
          }
        ]
    });
  }

  OutcomesSlider(){
      $('.outcomes-slider').slick({
        dots: false,
        infinite: false,
        speed: 300,
        slidesToShow: 3,
        slidesToScroll: 1,
        arrows: true,
        prevArrow: ".outcomes-slider-section .prev-arrow",
        nextArrow: ".outcomes-slider-section .next-arrow",
        responsive: [
          {
            breakpoint: 1024,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 1,
            }
          },
          {
            breakpoint: 600,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 1
            }
          },
          {
            breakpoint: 480,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1
            }
          }
        ]
      });
  }
}
