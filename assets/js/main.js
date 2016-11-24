$(document).ready(function() {
  
  // Function to check if it's a small screen. If it's true, execute the code
  function mobile() {
    
    // Set variable to get window width
    var windowWidth = $(window).width();
    
    // Create condition to check screen size
    // Here we assume that 768px is a small screen size
    if (windowWidth <= 768) {
      
      // Main engine of the mobile navigation
      $(".mobile-dropdown-btn").click(function() {
        
        // Lock the scroll on body element for fixed navigation
        // $("body").toggleClass(" open-mobile-nav");
        
        // Slides toggle the links
        $("#mobile_nav").slideToggle(500);
        
        // Change the arrow direction when menu open and close
        var icon = $(".mobile-dropdown-btn i");
        if (icon.hasClass("ion-ios-arrow-down")) {
          icon.removeClass("ion-ios-arrow-down"),
          icon.addClass("ion-ios-arrow-up")
        } else {
          icon.removeClass("ion-ios-arrow-up"),
          icon.addClass("ion-ios-arrow-down")
        }
        
      });
    } else {
      // Empty
    }
    // End of function mobile()
  }
  
  // Call the function when te document is load
  mobile();
  
  // Home banner slider function
  $("#bannerSlider").bxSlider({
    startSlide: 0,
    controls: false,
    auto: true,
    speed: 800,
    pause: 8000,
    autoHover: true,
  });
  
  // Home review slider function
  $("#reviewSlider").bxSlider({
    auto: true,
    speed: 800,
    pause: 8000,
    autoHover: true,
    startSlider: 0,
  });
  
  // Magnific popup on gallery of About Page
  $(".infra-gallery").magnificPopup({
    delegate: "a",
    type: "image",
    gallery: {
      enabled: true
    }
  })
  
  // Toggle active class on topic title in FAQ page
  function toggleClass() {
    var menu = $('.panel-title a');
    menu.click(function () {
      menu.not(this).removeClass('active');
      $(this).toggleClass('active');
    });
  }
  toggleClass();
  
});