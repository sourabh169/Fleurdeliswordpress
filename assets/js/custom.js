$(document).ready(function() {

  //menuBtn
  $(".menuBtn").click(function() {
    $(".menuNavigation").addClass("menuNavigationActive");
  });
  $(".menuNavigationCloseBtn").click(function() {
    $(".menuNavigation").removeClass("menuNavigationActive");
  });

	$('#bannerSlider').owlCarousel({
	    animateOut: 'fadeOut',
	    animateIn: 'fadeIn',
	    items:1,
	    margin:0,
	    //nav: true,
	    //navText: ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
	    dots: true,
	    autoplay: 6000,
	    loop: true,
	    autoplayHoverPause: true
	});

  //languageSwitcherBtn
  $(".languageSwitcherBtn > ul > li:nth-of-type(1)").click(function(event){
    event.preventDefault();
  });
  $(".languageSwitcherBtn").click(function() {
    $(this).toggleClass("languageSwitcherBtnActive");
  });
  $('body').click(function(e) {
  if ($(e.target).closest('.languageSwitcherBtn > ul > li > a').length === 0) {
        $(".languageSwitcherBtn").removeClass("languageSwitcherBtnActive");
    }
  });

  //productCatTitle
  $(".productCatTitle").appendTo("#wooCommPage");

  //shareThisBlock
  $(".shareThisBlock .shareThisBlockBtn").click(function() {
    $(".shareThisBlockModal").toggleClass("shareThisBlockModalActive");
  });

  //continueShoppingBtn
  $(".continueShoppingBtn").click(function(event){
    event.preventDefault();
    $(".woocommerce-message").fadeOut("medium");
  });

  //cartBtn
  $(".cartBtn").click(function(event){
    event.preventDefault();
    $(".miniCartBlock").toggleClass("miniCartBlockActive");
    $(".innerPageSection").toggleClass("animateRightMiniCart");
  });
  $(".minicartInnerCloseBtn").click(function(){
    $(".miniCartBlock").removeClass("miniCartBlockActive");
    $(".innerPageSection").removeClass("animateRightMiniCart");
  });

  //woocommerce-shipping-fields
  $(".woocommerce-shipping-fields h3#ship-to-different-address span").text('This is a gift');
  $(".woocommerce-shipping-fields h3#ship-to-different-address").addClass("headingPrimary");
  $(".woocommerce-shipping-fields h3#ship-to-different-address label").append('<small>Receive the order elegantly presented in our Gift Package.</small>');
  $(".woocommerce-shipping-fields h3#ship-to-different-address label").append('<div class="pull-right">EDIT</div>')
  $(".woocommerce-shipping-fields h3#ship-to-different-address label input").removeAttr("checked");
  $(".woocommerce-shipping-fields h3#ship-to-different-address label input").wrap('<div class="inputDiv"></div>');
  $(".woocommerce-shipping-fields h3#ship-to-different-address label .inputDiv").append('<span class="checkmark"></span>');
  $(".woocommerce-shipping-fields .shipping_address p#shipping_first_name_field label").text("RECEIVER’S NAME (printed on envelope)");
  $(".woocommerce-shipping-fields .shipping_address p#shipping_address_2_field label").text("PERSONAL MESSAGE (optional)");
  $(".woocommerce-shipping-fields .shipping_address p#shipping_address_2_field input").attr("placeholder","");
  $(".woocommerce-billing-fields__field-wrapper #billing_address_1").removeAttr("placeholder");
  //$(".woocommerce-billing-fields__field-wrapper #billing_address_1").attr("placeholder","Address Lane 1");
  $(".innerPageSection .woocommerce form.checkout .col-1 .colInner").append('<a href="#" class="returnCartBtnBlock"><i></i> <span>Return to cart</span></a>');

  $(".returnCartBtnBlock").click(function(){
      history.back();
      return false;
  });

  //boutiqueHeadCol scroll
  $(window).scroll(function() {
    if ($(this).scrollTop() > 1) {
      $(".boutiqueHeadCol").addClass("boutiqueHeadColScrolled");
      $(".boutiqueSection").addClass("boutiqueSectionScrolled");
    } else {
      $(".boutiqueHeadCol").removeClass("boutiqueHeadColScrolled");
      $(".boutiqueSection").removeClass("boutiqueSectionScrolled");
    }
  });

  //myAccountDashboard
  $(".woocommerce-MyAccount-content .myAccountDashboard .myaccHead").prependTo(".woocommerce");

  /*$('.boutiqueHeadCol').bind('mousewheel', function(e){
      if(e.originalEvent.wheelDelta /1 > 0) {
        $('.boutiqueHeadCol').addClass("boutiqueHeadColScrolled");
      }
      else{
        $('.boutiqueHeadCol').removeClass("boutiqueHeadColScrolled");
      }
  });*/

	//parallax scrolling bg
  var $window = $(window); //You forgot this line in the above example

  $('section[data-type="background"]').each(function(){
      var $bgobj = $(this); // assigning the object
      $(window).scroll(function() {
        var yPos = -($window.scrollTop() / $bgobj.data('speed'));
        // Put together our final background position
        var coords = '100% '+ yPos + 'px';
        // Move the background
        $bgobj.css({ backgroundPosition: coords 
        });
      });
  });

  //positioned parallax element
  function parallax(){
    var scrolled = $(window).scrollTop();
      $('.overviewStrip1').css('left', +(scrolled * 0.55) + 'px');
      $('.overviewStrip2').css('left', +(scrolled * 0.35) + 'px');
      $('.overviewStrip3').css('left', +(scrolled * 0.10) + 'px');
  }
  $(window).scroll(function(e){
      parallax();
  });

  //target link slide on click
  $('.scrollDownBtn > a,.visionMissionRotateHeading a,.faqDiscoverBtn a').click(function () {
    $('html, body').animate({
      scrollTop: $($(this).attr('href')).offset().top - 0
    }, 1000);
    return false;
  });

  //scrollUp
  $(window).scroll(function() {
    if ($(this).scrollTop() > 100) {
      $('.scroll-to-top').fadeIn();
      $(".navigationBar").addClass("navigationBarFixed");
    } else {
      $('.scroll-to-top').fadeOut();
      $(".navigationBar").removeClass("navigationBarFixed");
    }
  });

  $('.scroll-to-top').click(function() {
    $("html, body").animate({scrollTop: 0}, 600);
    return false;
  });

  //collectionSlider
  $('#collectionSlider').owlCarousel({
    items:3,
    margin:0,
    nav: true,
    navText: ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
    dots: true,
    autoplay: 6000,
    loop: true,
    autoplayHoverPause: true,
    responsiveClass:true,
    responsive:{
        0:{
            items:1,
        },
        600:{
            items:1,
        },
        1000:{
            items:3,
        }
    }
  });

  //abtPageSlider & visionMissionSlider
  $('#abtPageSlider,#visionMissionSlider').owlCarousel({
    animateOut: 'fadeOut',
    animateIn: 'fadeIn',
    items:1,
    margin:0,
    nav: false,
    dots: false,
    autoplay: 15000,
    loop: false,
    rewind: true,
    autoplayHoverPause: false,
    responsiveClass:true,
    autoplayTimeout:10000,
    responsive:{
        0:{
            items:1,
        },
        600:{
            items:1,
        },
        1000:{
            items:1,
        }
    }
  });

  //about page slider settings
  $("#abtPageSlider .owl-item:nth-of-type(1) .item .abtPageSectionInner .col-md-6").addClass("col-md-offset-3");
  $("#abtPageSlider .owl-item:nth-of-type(2) .item .abtPageSectionInner").removeClass("abtPageSectionInnerCenter");
  $("#abtPageSlider .owl-item:nth-of-type(2) .item .abtPageSectionInner").addClass("abtPageSectionInnerTop");
  $("#abtPageSlider .owl-item:nth-of-type(2) .item .abtPageSectionInner .col-md-6").addClass("col-md-offset-1");
  $("#abtPageSlider .owl-item:nth-of-type(3) .item .abtPageSectionInner .col-md-6").addClass("col-md-offset-3");
  $("#abtPageSlider .owl-item:nth-of-type(4) .item .abtPageSectionInner .col-md-6").addClass("col-md-offset-1");
  $("#abtPageSlider .owl-item:nth-of-type(5) .item .abtPageSectionInner .col-md-6").addClass("col-md-offset-3");
  $("#abtPageSlider .owl-item:nth-of-type(4) .item .abtPageSectionInner").removeClass("abtPageSectionInnerCenter");
  $("#abtPageSlider .owl-item:nth-of-type(4) .item .abtPageSectionInner").addClass("abtPageSectionInnerBottom");

  //collections sections
  $(".collectionsSection:nth-of-type(1)").addClass("collectionsSection2");
  $(".collectionsSection:nth-of-type(2)").addClass("collectionsSection3");
  $(".collectionsSection:nth-of-type(3)").addClass("collectionsSection4");

  //.mainSliderSection .owl-carousel .item
  $(".mainSliderSection .owl-carousel .item").each(function() {
    $(this).hover(function() {
      $(this).addClass("slideItemActive");
      //$(".mainSliderSection .owl-carousel .item").stop(true, false).animate({opacity: 0.5}, "medium");
      $(".mainSliderSection .owl-carousel .item").addClass("opacityAdd");
    }, function() {
      $(this).removeClass("slideItemActive");
      //$(".mainSliderSection .owl-carousel .item").stop(true, false).animate({opacity: 1}, "medium");
      $(".mainSliderSection .owl-carousel .item").removeClass("opacityAdd");
    });
  });

  //faqBlock
  $(".faqBlock .faqBlockInner ul > li:nth-of-type(2)").parent().addClass("faqUls");

  //loginPageSection
  $(".innerPageSection .woocommerce .loginPageSection").parent().parent().addClass("innerPageSectionMyAccount");

  //owl carousel
  $('#owl').owlCarousel({
    items:2,
    margin:0,
    nav: false,
    //navText: ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
    dots: true,
    autoplay: 6000,
    loop: true,
    autoplayHoverPause: true,
    responsiveClass:true,
    responsive:{
        0:{
            items:1,
        },
        600:{
            items:1,
        },
        1000:{
            items:2,
        }
    }
  });
});