/*=========================================================================================
  File Name: Components.js
  Description: For Generic Components.
  ----------------------------------------------------------------------------------------
  Item Name: Vuexy  - Vuejs, HTML & Laravel Admin Dashboard Template
  Author: Pixinvent
  Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/

(function (window, document, $) {
  /***** Component Variables *****/
  var alertValidationInput = $(".alert-validation"),
    alertRegex = /^[0-9]+$/,
    alertValidationMsg = $(".alert-validation-msg"),
    accordion = $(".accordion"),
    collapseTitle = $(".collapse-title"),
    collapseHoverTitle = $(".collapse-hover-title"),
    dropdownMenuIcon = $(".dropdown-icon-wrapper .dropdown-item");

  /***** Alerts *****/
  /* validation with alert */
  alertValidationInput.on('input', function () {
    if (alertValidationInput.val().match(alertRegex)) {
      alertValidationMsg.css("display", "none");
    } else {
      alertValidationMsg.css("display", "block");
    }
  });

  /***** Carousel *****/
  // For Carousel With Enabled Keyboard Controls
  $(document).on("keyup", function (e) {
    if (e.which == 39) {
      $('.carousel[data-keyboard="true"]').carousel('next');
    } else if (e.which == 37) {
      $('.carousel[data-keyboard="true"]').carousel('prev');
    }
  })

  // To open Collapse on hover
  if (accordion.attr("data-toggle-hover", "true")) {
    collapseHoverTitle.closest(".card").on("mouseenter", function () {
      $(this).children(".collapse").collapse("show");
    });
  }
  // Accordion with Shadow - When Collapse open
  $('.accordion-shadow .collapse-header .card-header').on("click", function () {
    var $this = $(this);
    $this.parent().siblings(".collapse-header.open").removeClass("open");
    $this.parent(".collapse-header").toggleClass("open");
  });

  /***** Dropdown *****/
  // For Dropdown With Icons
  dropdownMenuIcon.on("click", function () {
    $(".dropdown-icon-wrapper .dropdown-toggle i").remove();
    $(this).find("i").clone().appendTo(".dropdown-icon-wrapper .dropdown-toggle");
    $(".dropdown-icon-wrapper .dropdown-toggle .dropdown-item").removeClass("dropdown-item");
  });
+


  /***** Chips *****/
  // To close chips
  $('.chip-closeable').on('click', function () {
    $(this).closest('.chip').remove();
  })

    
})(window, document, jQuery);

$(function(){
  var currentLayout = localStorage.getItem("caberz_currentLayout");
  $("#content_body").data('type' , currentLayout);
  if (currentLayout != null && currentLayout != 'light') {
      $("#layout-mode").html(`<i class="ficon feather icon-sun" onclick="changeMode()"></i>`);
      $("#content_body").addClass('dark-layout');
      $("#content_body").removeClass('light-mode');
  }else{
      $("#layout-mode").html(`<i class="ficon feather icon-moon" onclick="changeMode()"></i>`);
      $("#content_body").removeClass('dark-layout');
      $("#content_body").addClass('light-mode');
  }
});
function changeMode() {
  var layoutOptions = $("#content_body").data('type');
  if (layoutOptions == 'dark') {
      localStorage.setItem("caberz_currentLayout" , 'light')
      $("#content_body").data('type' , 'light');
      $("#content_body").removeClass('dark-layout');
      $("#content_body").addClass('light-mode');
      $("#layout-mode").html(`<i class="ficon feather icon-moon" onclick="changeMode()"></i>`);

  }else{
      localStorage.setItem("caberz_currentLayout" , 'dark')
      $("#content_body").data('type' , 'dark');
      $("#layout-mode").html(`<i class="ficon feather icon-sun" onclick="changeMode()"></i>`);
      $("#content_body").addClass('dark-layout');
      $("#content_body").removeClass('light-mode');
  }
}
