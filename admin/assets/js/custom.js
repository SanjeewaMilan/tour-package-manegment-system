//clickable row

$(document).ready(function() {

    $(".clickable-row").click(function() {
        window.location = $(this).data("href");
    });
 

 /* $("#language").hide();
    
    $("#guide_yes").click(function(){            
        $("#language").show().attr("required");
    });

    $("#guide_no").click(function(){            
        $("#language").hide();
    }); 
    $("#btn_commet_save,#btn_cancel").hide();
    $(".input_comment").hide();

    $(".btn_comment_edit").click(function(){            
        $("#btn_cancel,.input_comment").show();
        $(".btn_comment_edit").remove();
        $('.comment_box').html('<button type="submit" class="btn btn-success"><i class="fa fa-edit"></i> Save</button> <a id="btn_cancel" onclick="location.reload()" class="btn btn-default"><i class="fa fa-edit"></i> Cancel</a>');
        $(*/
  
});

//data table functions
$(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": false,
      "info": true,
      "autoWidth": false
    });
  }); 