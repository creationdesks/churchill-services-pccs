
 jQuery( document ).ready(function($) {

$('.slider').slick({
  centerMode: true,
  centerPadding: '0px',
  slidesToShow: 3,
  dots: true,
  infinite: true,
  sliderheight: "500",
  image_fit: true,
  autoplay: true,
  speed: 300,
  autoplaySpeed: 3000,
  responsive: [
	{
      breakpoint: 1023,
      settings: {
        arrows: false,
        centerMode: true,
        centerPadding: '40px',
        slidesToShow: 1
      }
    },
    {
      breakpoint: 768,
      settings: {
        arrows: false,
        centerMode: true,
        centerPadding: '40px',
        slidesToShow: 1
      }
    },
    {
      breakpoint: 480,
      settings: {
        arrows: false,
        centerMode: true,
        centerPadding: '40px',
        slidesToShow: 1
      }
    }
  ]
  });

 });