$(function() {
        function getCarouselSizes()
        {
            let maxNumberOfSlides = 5;
            switch(true) {
                case (window.matchMedia("(max-width: 700px)").matches):
                    maxNumberOfSlides = 3;
                    break;
                case (window.matchMedia("(max-width: 500px)").matches):
                    maxNumberOfSlides = 2;
                    break;
                    
            }
            return {
                carouselWidth: $("#trick-carousel .carousel-inner")[0].scrollWidth,
                cardWidth: $("#trick-carousel .carousel-item").width(),
                maxNumberOfSlides: maxNumberOfSlides
            }
        }
        var scrollPosition = 0;
        $("#trick-carousel .carousel-control-next").on("click", function () {
            let carouselSizes = getCarouselSizes();
            if (scrollPosition < Math.floor(carouselSizes.carouselWidth - carouselSizes.cardWidth * carouselSizes.maxNumberOfSlides)) {
              scrollPosition += carouselSizes.cardWidth;
              $("#trick-carousel .carousel-inner").animate(
                { scrollLeft: scrollPosition },
                400
              );
            }
        });
        $("#trick-carousel .carousel-control-prev").on("click", function () {
            let carouselSizes = getCarouselSizes();
            if (scrollPosition > 0) {
              scrollPosition -= carouselSizes.cardWidth;
              $("#trick-carousel .carousel-inner").animate(
                { scrollLeft: scrollPosition },
                400
                );
            }
        });
  });