jQuery(document).ready(function() {
  var creativeily_menu_element1;
  var creativeily_menu_element2 = new Array();
  var creativeily_level;
  creativeily_level = 0;

  jQuery("#creativeily-menu-back").hide();
  jQuery("#creativeily-menu-home").hide();

  jQuery(
    '<strong tabindex="0" class="creativeily-submenu-button"><span class="dashicons dashicons-plus-alt"></span></strong>'
  ).insertAfter(
    "#top-menu .page_item_has_children, #top-menu .menu-item-has-children > a"
  );
  /*
  jQuery(
    "#top-menu .page_item_has_children, #top-menu .menu-item-has-children"
  ).prepend(
    '<strong tabindex="0" class="creativeily-submenu-button"><span class="dashicons dashicons-plus-alt"></span></strong>'
  );
  */

  jQuery("#top-menu > ul li .creativeily-submenu-button").on(
    "click keypress",
    function() {
      if (creativeily_level == 0) {
        creativeily_menu_element1 = this;
        creativeily_level = 1;

        jQuery(creativeily_menu_element1)
          .closest("li")
          .find("> ul")
          .css("left", "100%");
        jQuery(creativeily_menu_element1)
          .closest("li")
          .find("ul")
          .show();
        jQuery(creativeily_menu_element1)
          .closest("li")
          .find("> ul")
          .css("opacity", "0");
        jQuery(creativeily_menu_element1)
          .closest("li")
          .find("> ul")
          .animate({ left: "0%", opacity: 1 });

        jQuery("#creativeily-menu-back").slideToggle();
        jQuery("#creativeily-menu-home").slideToggle();
      }
    }
  );

  jQuery("ul li ul li .creativeily-submenu-button").on(
    "click keypress",
    function() {
      creativeily_level++;
      creativeily_menu_element2[creativeily_level] = this;

      jQuery(creativeily_menu_element2[creativeily_level])
        .closest("li")
        .find("> ul")
        .css("left", "100%");
      jQuery(creativeily_menu_element2[creativeily_level])
        .closest("li")
        .find("ul")
        .show();
      jQuery(creativeily_menu_element2[creativeily_level])
        .closest("li")
        .find("ul")
        .css("opacity", "0");
      jQuery(creativeily_menu_element2[creativeily_level])
        .closest("li")
        .find("> ul")
        .animate({ left: "0%", opacity: 1 });
    }
  );

  jQuery("#creativeily-menu-home, .mobile-bar").click(function() {
    jQuery(".header-menu ul ul").animate({ opacity: "0", left: "100%" });
    creativeily_level = 0;
    jQuery("#creativeily-menu-back").hide();
    jQuery("#creativeily-menu-home").hide();
  });

  jQuery("#creativeily-menu-back").click(function() {
    if (creativeily_level > 0) {
      if (creativeily_level == 1) {
        creativeily_level = 0;

        jQuery(creativeily_menu_element1)
          .closest("li")
          .find("> ul")
          .animate({ left: "100%", opacity: 0 }, "slow", "swing", function() {
            jQuery(creativeily_menu_element1)
              .closest("li")
              .find("ul")
              .hide();
            jQuery("#creativeily-menu-back").slideToggle();
            jQuery("#creativeily-menu-home").slideToggle();
          });
      }
      if (creativeily_level >= 2) {
        jQuery(creativeily_menu_element2[creativeily_level])
          .closest("li")
          .find("> ul")
          .animate({ left: "100%", opacity: 0 }, "slow", "swing", function() {
            jQuery(creativeily_menu_element2[creativeily_level])
              .closest("li")
              .find("ul")
              .hide();
            creativeily_level--;
          });
      }
    }
  });

  jQuery(window).scroll(function() {
    creativeily_scroll();
  });

  jQuery("#section06").on("click", function(e) {
    e.preventDefault();
    jQuery("html, body").animate(
      { scrollTop: jQuery(jQuery(this).attr("href")).offset().top },
      500,
      "linear"
    );
  });

  creativeily_scroll();
});

function creativeily_scroll() {
  jQuery(
    "article div, article header, article img, article p, .widget, .widget ul li"
  ).each(function() {
    if (
      jQuery(this).css("opacity") == 0 &&
      isVisible(jQuery(this), jQuery(window))
    ) {
      jQuery(this).animate({ opacity: 1 });
    }
  });
}

function isVisible(row, container) {
  var elementTop = jQuery(row).offset().top,
    elementHeight = jQuery(row).height(),
    containerTop = container.scrollTop(),
    containerHeight = container.height();

  return (
    elementTop - containerTop + elementHeight > 0 &&
    elementTop - containerTop < containerHeight
  );
}
