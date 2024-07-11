  <?php
  $setting=$this->common->fetchsingledata('*','tbl_website_setting',' WHERE wid=1');
  ?>
        <!--  <div class="footer">
          <div>
			        <strong>© Copyright </strong> <?php echo date('Y');?> <a href="<?php echo base_url();?>"><?=$setting['title']?></a> 			        
			    </div>
			</div> -->
		</div>
	</div>

<script src="<?php echo base_url();?>admin_assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>admin_assets/js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="<?php echo base_url();?>admin_assets/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
<script src="<?php echo base_url();?>admin_assets/js/plugins/pace/pace.min.js"></script>
<!-- Custom and plugin javascript -->
<script src="<?php echo base_url();?>admin_assets/js/inspinia.js"></script>
<script src="<?php echo base_url();?>admin_assets/js/plugins/pace/pace.min.js"></script>
<!-- iCheck -->
<script src="<?php echo base_url();?>admin_assets/js/plugins/iCheck/icheck.min.js"></script>
<script src="<?php echo base_url();?>admin_assets/js/plugins/summernote/summernote.min.js"></script>
<script src="<?php echo base_url();?>admin_assets/js/plugins/datapicker/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url();?>admin_assets/js/plugins/clockpicker/clockpicker.js"></script>
<script src="<?php echo base_url();?>admin_assets/js/plugins/fullcalendar/moment.min.js"></script>
<script src="<?php echo base_url();?>admin_assets/js/plugins/fullcalendar/fullcalendar.min.js"></script>
<script src="<?php echo base_url();?>admin_assets/js/plugins/cropper/cropper.min.js"></script>
<script src="<?php echo base_url();?>admin_assets/js/plugins/jasny/jasny-bootstrap.min.js"></script>
<script src="<?php echo base_url();?>admin_assets/js/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js"></script>
<script src="<?php echo base_url();?>admin_assets/js/plugins/dataTables/datatables.min.js"></script>
<script src="<?php echo base_url();?>admin_assets/js/plugins/chosen/chosen.jquery.js"></script>
<script src="<?php echo base_url();?>admin_assets/js/plugins/toastr/toastr.min.js"></script>
<script src="<?php echo base_url();?>admin_assets/js/plugins/select2/select2.full.min.js"></script>
<!-- ChartJS-->
<script src="<?php echo base_url();?>admin_assets/js/plugins/chartJs/Chart.min.js"></script>
<script src="<?php echo base_url();?>admin_assets/js/demo/chartjs-demo.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>admin_assets/js/admin-validations.js"></script>


<!-- <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/sky-forms-pro/skyforms/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/sky-forms-pro/skyforms/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/sky-forms-pro/skyforms/js/jquery.maskedinput.min.js"></script> -->
<!-- <script src="<?php echo base_url();?>admin_assets/js/admin-validations.js"></script> -->
<script>
    $(document).ready(function(){

      $(".alert-danger").fadeOut(10000);
      $(".alert-success").fadeOut(10000);



         $('.chosen-select').chosen({width: "100%"});
        $('.i-checks').iCheck({
            checkboxClass: 'icheckbox_square-green',
            radioClass: 'iradio_square-green',
        });
      
        $('.dataTables-example').DataTable({    pageLength: 25,    responsive: true  });
        
        $('.summernote').summernote();

        $("#add_todo").click(function(){
         
            var todo=$("#todo").val();
        if($.trim(todo)=='')
        {
            show_error("todo","Please enter TODO task");    
            return false;
        }
        else
        {
            remove_error("todo");   
            $("#frm_todo").submit();
            return true;    
        }});

        $(".delete_todo").click(function(){
            var id=$(this).attr('data-id');
            var link = site_url + 'admin/deletetodo/';
                var image = site_url + 'images/loader.gif';
                $.ajax({
                    url: link,
                    type: "POST",
                    dataType: "html",
                    data: {
                        id: id
                    },
                    success: function(msg) {
                        $(".to_do"+id).remove();
                    }

                })
                return false;
        });

  function show_error(id,msg)
  { 
    if(!$("#"+id).hasClass("has-error"))
    {
      $("#"+id).addClass("has-error");
      $('<span for="'+id+'" class="text-danger">'+msg+'</span>').insertAfter($("#"+id));      
    }
    else
    {
      $("#"+id).next("span.text-danger").html(msg);
    }
  }
  function remove_error(id)
  {
    $("#"+id).removeClass("has-error");
    $("#"+id).next("span.text-danger").remove();
  }
  
    });

</script>
<script type="text/javascript">
  $(document).ready(function()
  {        
    $(".loader_background").fadeOut(); 
  });    
  $(document).ajaxStart(function()
  {       
    $(".loader_background").fadeIn("fast");    
  });   
  
  $(document).ajaxComplete(function()
  {        
    $(".loader_background").fadeOut("fast");
  });
</script>


</body>
</html>

 