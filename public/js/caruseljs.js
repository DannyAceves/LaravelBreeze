$(document).ready(function () {
  $(".carousel").slick({
    speed: 500,
    centerMode: true,
    centerPadding: '60px',
    slidesToShow: 3,
    slidesToScroll: 1,
    autoplay: true,

    autoplaySpeed: 2000,
    prevArrow: $('#prev'),
    nextArrow: $('#next'),
    centerMode: true,
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 1,
          centerMode: true,
        }
      },
      {
        breakpoint: 800,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2,
          centerMode: true,
          infinite: true
        }
      },
      {
        breakpoint: 500,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          centerMode: true,
          infinite: true,
          autoplay: true,
          autoplaySpeed: 2000
        }
      }
    ]
  });
});