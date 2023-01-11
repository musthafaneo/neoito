jQuery(function($) {

  gsap.registerPlugin(ScrollTrigger, MotionPathPlugin);
  gsap.defaults({ease: "none"});

  //gsap.set(".ball", {xPercent: -50, yPercent: -50})

  var tl = gsap.timeline({
    defaults: {
      duration: 0.05, 
      autoAlpha: 1, 
      scale: 2, 
      transformOrigin: 'center', 
      ease: "elastic(2.5, 1)"
    }})

  var action = gsap.timeline({defaults: {duration: 1},
    scrollTrigger: {
      trigger: "#process-anim",
      scrub: true,
      start: "top center",
      end: "bottom center"
    }})
  .to(".ball01", {duration: 0.01, autoAlpha: 1})
  //.fromTo(".theLine", {drawSVG: '100%'}, {drawSVG: '100% 100%'}, 0)
  //.from(".theLine", {drawSVG: '0'}, 0)
  .to(".ball01", { motionPath: {path: ".theLine", autoRotate:true, alignOrigin: [0.5, 0.5], align:".theLine"}}, 0)
  .add(tl, 0);

  $(window).on('scroll', function(){
    var ST = $(this).scrollTop();
    var SlT = $('.about-purpose-items').offset().top;
    $('.about-purpose-item').each(function(i){
        var OTN = $(this).offset().top;
        var IHN = $(this).outerHeight();
        var OBN = OTN+IHN;
        var offset = 300;
        isScrolled = $(this);

        
        if(ST>=SlT-300){                        
            if(ST>OTN-offset && ST<OBN-offset){
                $(this).find('h2').addClass('active');
            }else{
                $(this).find('h2').removeClass('active');
                
            }
        } else {
            $(this).find('h2').removeClass('active');
        }
    });
  });
});


