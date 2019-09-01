$( document ).ready(function () {
  $(".col-sm-3").slice(0, 4).show();
    if ($(".col-sm-3:hidden").length != 0) {
      $("#loadMore").show();
    }   
    $("#loadMore").on('click', function (e) {
      e.preventDefault();
      $(".col-sm-3:hidden").slice(0, 100).slideDown();
      if ($("col-sm-3:hidden").length == 0) {
        $("#loadMore").fadeOut('slow');
      }
    });
  });