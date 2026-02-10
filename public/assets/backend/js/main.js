$("ul.sidebar_menu > li:has(ul)").addClass('hassub');
$('ul.sidebar_menu li.hassub > a.parentmenu').click(function () {
  $('a.parentmenu').not(this).removeClass('active');
  $(".sub-menu.show").slideUp(300);
  if (!$(this).hasClass('active')) {
    $(this).next('.sub-menu').addClass("show").slideDown(300);
    $(this).addClass('active');
  } else {
    $(this).removeClass('active');
  }
});

$('ul.sidebar_menu li.hassub a.childmenu').click(function () {
  $('a.childmenu').not(this).removeClass('active');
  $(".subchildmenu.show").slideUp(300);
  if (!$(this).hasClass('active')) {
    $(this).next('.subchildmenu').addClass("show").slideDown(300);
    $(this).addClass('active');
  } else {
    $(this).removeClass('active');
  }
});

function toggleFullScreen() {
  if ((document.fullScreenElement && document.fullScreenElement !== null) ||
   (!document.mozFullScreen && !document.webkitIsFullScreen)) {
    if (document.documentElement.requestFullScreen) {
      document.documentElement.requestFullScreen();
    } else if (document.documentElement.mozRequestFullScreen) {
      document.documentElement.mozRequestFullScreen();
    } else if (document.documentElement.webkitRequestFullScreen) {
      document.documentElement.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);
    }
  } else {
    if (document.cancelFullScreen) {
      document.cancelFullScreen();
    } else if (document.mozCancelFullScreen) {
      document.mozCancelFullScreen();
    } else if (document.webkitCancelFullScreen) {
      document.webkitCancelFullScreen();
    }
  }
}

$("#darkModeToggler").click(function(){
	$(".app_wrapper").toggleClass("dark_mode");
	$("#darkModeToggler .las").toggleClass("la-moon");
	$("#darkModeToggler .las").toggleClass("la-sun");
});

$("#sidebarToggler").click(function(){
  $(".sidepanel").toggleClass("hide");
  $(".header_wrapper").toggleClass("start-0");
  $(".body_wrapper").toggleClass("full");
});

if ($(window).width() < 992) {
  $(".sidepanel").addClass("hide");
  $(".header_wrapper").addClass("start-0");
  $(".body_wrapper").addClass("full");

  $("#sidebarToggler").click(function(){
    $(".mobile_menu_close").toggle(300);
    $(".black_overlay").toggle();
  });

  $(".mobile_menu_close a").click(function(){
    $(".sidepanel").addClass("hide");
    $(".header_wrapper").removeClass("start-0");
    $(".body_wrapper").removeClass("full");
    $(".mobile_menu_close").hide();
    $(".black_overlay").hide();
  });
}
