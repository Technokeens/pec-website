$(document).ready(function () {

	$(document).on('click', '.next', function() {  
        //var start=$(this).attr("data-start");
        var end=$(this).attr("data-page");
        var link = site_url + 'trash/trash_ajax/';
        var image = site_url + 'images/loader.gif';
        //var start_limit=start ;
        var end_limit=end;
        
        $.ajax({
            url: link,
            type: "POST",
            dataType: "html",
            data: {
                end:end_limit
            },
            success: function(msg) {
                $(".trash_msg").html("");
                $(".trash_msg").html(msg);

            }

        })
        return false;

       });
       $(document).on('click', '.pre', function() {  
        //var start=$(this).attr("data-start");
        var end=$(this).attr("data-page");
        var link = site_url + 'trash/trash_ajax/';
        var image = site_url + 'images/loader.gif';
        //var start_limit=start ;
        var end_limit=end-1;
        
        $.ajax({
            url: link,
            type: "POST",
            dataType: "html",
            data: {
                end:end_limit
            },
            success: function(msg) {
                $(".trash_msg").html("");
                $(".trash_msg").html(msg);

            }

        })
        return false;

       });
});