'use strict';



window.addEventListener('scroll', navToggel);
const navigationBar = document.querySelector('.main-header');
function navToggel(){
    if(window.scrollY > 170){
        navigationBar.classList.add('stickyNavbar');
    }else{
        navigationBar.classList.remove('stickyNavbar');
    }
}    
var project_carousel = $('#our-project');
project_carousel.owlCarousel({
	loop:true,
        nav:true,
        autoplay:true,
        dots:false,
        navText: ["<i class='icon icon-chevron-left'></i>","<i class='icon icon-chevron-right'></i>"],
        responsive:{
            0: {
                items: 1
            },
            481: {
                items: 2
            },
            700: {
                items: 3
            },
            992: {
                items: 5
            }
        }
    });

let client_carousel = $('#our-client-slide');
client_carousel.owlCarousel({
    loop:true,
    nav:false,
    dots:false,
    autoplay:true,
    responsive:{
        0:{
            items:1
        },
        481:{
            items:2
        },
        600:{
            items:3
        },
        1000:{
            items:5
        }
    }
})

   // bootstrap animated slider
   function bootstrapAnimatedLayer() {

    /* Demo Scripts for Bootstrap Carousel and Animate.css article
     * on SitePoint by Maria Antonietta Perna
     */

    //Function to animate slider captions 
    function doAnimations(elems) {
        //Cache the animationend event in a variable
        var animEndEv = 'webkitAnimationEnd animationend';

        elems.each(function() {
            var $this = $(this),
                $animationType = $this.data('animation');
            $this.addClass($animationType).one(animEndEv, function() {
                $this.removeClass($animationType);
            });
        });
    }

    //Variables on page load 
    var $myCarousel = $('#minimal-bootstrap-carousel'),
        $firstAnimatingElems = $myCarousel.find('.item:first').find("[data-animation ^= 'animated']");

    //Initialize carousel 
    $myCarousel.carousel({
        interval: 7000
    });

    //Animate captions in first slide on page load 
    doAnimations($firstAnimatingElems);

    //Pause carousel  
    $myCarousel.carousel('pause');


    //Other slides to be animated on carousel slide event 
    $myCarousel.on('slide.bs.carousel', function(e) {
        var $animatingElems = $(e.relatedTarget).find("[data-animation ^= 'animated']");
        doAnimations($animatingElems);
    });
}
bootstrapAnimatedLayer();