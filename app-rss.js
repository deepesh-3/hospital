var main = function() {
  /* Push the body and the nav over by 285px over */

  $('.icon-menu').click(function() {
    $('.menu').animate({
      left: "0px"
    }, 200);

    $('body').animate({
      left: "350px"
    }, 200);
	
  });

  /* Then push them back */
  $('.icon-close').click(function() {
    $('.menu').animate({
      left: "-350px"
    }, 200);

    $('body').animate({
      left: "0px"
    }, 200);
  });
  
  /* Push the body and the nav over by 285px over */

  $('.login-menu').click(function() {
    $('.menu').animate({
      left: "0px"
    }, 200);

    $('body').animate({
      left: "350px"
    }, 200);
	
  });

  /* Then push them back */
  $('.login-close').click(function() {
    $('.menu').animate({
      left: "-350px"
    }, 200);

    $('body').animate({
      left: "0px"
    }, 200);
  });

  /*Contact-open and close*/
  $('.contact-open').click(function() {
	  $(".contact-info").show(200);
  });
  
  $('.contact-close').click(function() {
	  $(".contact-info").hide(200);
  });
  
  /*Login-open and close*/
  $('.login-open').click(function() {
	  $(".login-form").show(200);
  });
  
  $('.login-close').click(function() {
	  $(".login-form").hide(200);
  });
  
  /*Registration-open and close*/
  $('.registration-open').click(function() {
	  $(".registration-form").show(200);
  });
  
  $('.registration-close').click(function() {
	  $(".registration-form").hide(200);
  });
  
  /*Logout function*/
  $('.logout').click(function() {
	  location.assign("front-rss.php?lmsg=3");
  });
  
    /*passchange-open and close*/
  $('.passchange-open').click(function() {
	  $(".passchange-form").show(200);
  });
  
  $('.passchange-close').click(function() {
	  $(".passchange-form").hide(200);
  });
  
      /*fupload-open and close*/
  $('.fupload-open').click(function() {
	  $(".fupload-form").show(200);
  });
  
  $('.fupload-close').click(function() {
	  $(".fupload-form").hide(200);
  });
  
      /*fdelete-open and close*/
  $('.fdelete-open').click(function() {
	  $(".fdelete-form").show(200);
  });
  
  $('.fdelete-close').click(function() {
	  $(".fdelete-form").hide(200);
  });
};




