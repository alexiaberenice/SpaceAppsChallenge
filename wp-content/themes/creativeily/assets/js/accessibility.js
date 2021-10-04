jQuery(document).ready(function($) {
  var awaitMenu;
  $(".mobile-bar > label.menu-icon").on("focusin click", function() {
    clearTimeout(awaitMenu);
    awaitMenu = setTimeout(function() {
      $("#menu-toggle").prop("checked", !$("#menu-toggle").prop("checked"));
    }, 200);
  });

  $("#accessibility-close-menu").focusin(function() {
    $("#menu-toggle").prop("checked", false);
  });

  $("#top-menu .sub-menu").append(
    "<a href='#' class='accessibility-return-to-topmenu'></a>"
  );
  $(".accessibility-return-to-topmenu").focusin(function() {
    $("#creativeily-menu-back").click();
  });
});
