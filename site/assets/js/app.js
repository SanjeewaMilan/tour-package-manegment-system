

$(document).ready(function() {
  $("#language").hide();
  $("#custom_tour").hide();
  $("#readymade_tour").hide();

  $("#guide_yes").click(function(){            
    $("#language").show().attr("required");
  });

  $("#guide_no").click(function(){            
    $("#language").hide();
  });

  $("#tour_type-custom").click(function(){            
    $("#custom_tour").show();
    $("#readymade_tour").hide();
  });

  $("#tour_type-made").click(function(){            
    $("#readymade_tour").show();
    $("#custom_tour").hide();
  });
});