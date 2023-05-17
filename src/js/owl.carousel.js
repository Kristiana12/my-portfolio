//OWL CAROUSEL
jQuery(document).ready(function () {
  jQuery('.owl-carousel').owlCarousel({
    margin: 16,
    responsiveClass: true,
    responsive: {
      0: {
        items: 1,
      },
      700: {
        items: 2,
      },
      1100: {
        items: 3,
      },
    },
  });
}); 
