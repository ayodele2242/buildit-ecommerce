    $("#hero-qr-button").addClass("is-hidden");
    $(".qrWidget").addClass("is-hidden");
    $(".qr-button").addClass("is-hidden");


$(document).ready(function () {
    setTimeout(() => {
        $(".pageLoader").fadeToggle(200);
    }, 1000); // hide delay when page load


});

$(".qr-button .close-button").click(function () {
    $(".qr-button").toggle();
});

$(".sidebarTrigger").click(function (e) {
    e.preventDefault();
    if ($("body").hasClass("sidebar-open")) {
        $("body").removeClass("sidebar-open");
        $("body").addClass("sidebar-closed");
    }
    else if ($("body").hasClass("sidebar-closed")) {
        $("body").removeClass("sidebar-closed");
        $("body").addClass("sidebar-open");
    }
    else {
        $("body").addClass("sidebar-open");
    }

});


/*jQuery(document).ready(function($) {
    $('.loop').owlCarousel({
      center: true,
      items: 2,
      loop: true,
      margin: 10,
      responsive: {
        600: {
          items: 4
        }
      }
    });
    $('.nonloop').owlCarousel({
      center: true,
      items: 2,
      loop: false,
      margin: 10,
      responsive: {
        600: {
          items: 4
        }
      }
    });
  });*/

  $(document).ready(function () {
    $(".loader-top").hide();


  /*  $('#searchme').blur(function () {
    $('.close-icon').removeClass("input-icon").hide();
    $('.search-icon').addClass("input-icon").show();
     $('#search-output').css('display', 'none');
  });

   $(".close-icon").on("click", function() 
    {
    $('.close-icon').removeClass("input-icon").hide();
    $('.search-icon').addClass("input-icon").show();
     $('#search-output').css('display', 'none');
    });*/


    $('.toggle-searchbox').on('click', function() {
      $('#search').toggle('display: inline-block');
      $("#search").css('background', '#f0f0f0');
    });
  
  });

  

  $(document).ready(function(){  
    
    $(window).on("scroll", function() {
      if($(window).scrollTop() > 100) {
          $(".appHeader").addClass("active");
          $('.product-card').addClass("fademe");
      } else {
          //remove the background property so it comes transparent again (defined in your css)
         $(".appHeader").removeClass("active");
         $('.product-card').addClass("fademe");
      }
  });
 
  



});


$(window).on("load",function() {
  $(window).scroll(function() {
    var windowBottom = $(this).scrollTop() + $(this).innerHeight();
    $(".fademe").each(function() {
      /* Check the location of each desired element */
      var objectBottom = $(this).offset().top + $(this).outerHeight();
      
      /* If the element is completely within bounds of the window, fade it in */
      if (objectBottom < windowBottom) { //object comes into view (scrolling down)
        if ($(this).css("opacity")==0) {$(this).fadeTo(500,1);}
      } else { //object goes out of view (scrolling up)
       // if ($(this).css("opacity")==1) {$(this).fadeTo(500,0);}
       /* if ($(this).css("opacity")==1) {
        $(this).addClass("wash");
        }*/

      }
    });
  }).scroll(); //invoke scroll-handler on page-load
});



  
  






