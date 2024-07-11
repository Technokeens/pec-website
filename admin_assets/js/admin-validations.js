 $(document).ready(function()
{
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
  /*Validations for edit package on admin*/
/*  $("#frm_edit_package").on('submit',function()
  {    
    var title = $('#title').val();
    var price = $('#price').val();
    var tax = $('#tax').val();
    var package_duration     = $('#package_duration').val(); 
    var hosting = $('#hosting').val();  
    var customer_support     = $('#customer_support').val();
    var package_type = $('#package_type').val();   
   
   
    var flag=0;

    if(title=="")
    {
      show_error("title","Title field must be filled out");
      flag=1;
    }
    else
    {
      remove_error("title");       
    }

    if(price=="")
    {
      show_error("price","Price field must be filled out");
      flag=1;
    }
    else
    {
      remove_error("price");       
    }

    if(tax=="")
    {
      show_error("tax","Tax field must be filled out");
      flag=1;
    }
    else
    {
      remove_error("tax");       
    }

    if(package_duration=="")
    {
      show_error("package_duration","Package duration field must be selected");
      flag=1;
    }
    else
    {
      remove_error("package_duration");       
    }

    if(hosting=="")
    {
      show_error("hosting","Hosting field must be filled out");
      flag=1;
    }
    else
    {
      remove_error("hosting");       
    }

    if(customer_support=="")
    {
      show_error("customer_support","Customer support field must be filled out");
      flag=1;
    }
    else
    {
      remove_error("customer_support");
    }

    if(package_type=="")
    {
      show_error("package_type","Package type must be selected");
      flag=1;
    }
    else
    {
      remove_error("package_type");       
    }

    if(flag==1)
    {
      return false;
    }
    else
    {
      return true;
    }  
  });*/


   
   /*validations for update paypal */
   $("#frm_update_fees").on('submit',function()
      {    
        var email = $('#email').val();
        var min_paypal_uname = $('#min_paypal_uname').val();
        var password     = $('#password').val();
        var sign = $('#sign').val();   
        var appid = $('#appid').val(); 
        var max_paypal_email = $('#max_paypal_email').val();
        var user_name = $('#user_name').val();
        var max_paypal_password = $('#max_paypal_password').val();
        var max_paypal_sign = $('#max_paypal_sign').val();
        var max_paypal_appid = $('#max_paypal_appid').val();
        var sand_paypal_email = $('#sand_paypal_email').val();
        var sand_paypal_uname = $('#sand_paypal_uname').val();
        var sand_paypal_password = $('#sand_paypal_password').val();
        var sand_paypal_sign = $('#sand_paypal_sign').val();
        var sand_paypal_appid = $('#sand_paypal_appid').val();
       
        var flag=0;

        if(sand_paypal_email=="")
        {
          show_error("sand_paypal_email","Email address field must be filled out");
          flag=1;
        }
        else
        {
          remove_error("sand_paypal_email");       
        }

        if(sand_paypal_uname=="")
        {
          show_error("sand_paypal_uname","Username field must be filled out");
          flag=1;
        }
        else
        {
          remove_error("sand_paypal_uname");       
        }

        if(min_paypal_uname=="")
        {
          show_error("min_paypal_uname","Username field must be filled out");
          flag=1;
        }
        else
        {
          remove_error("min_paypal_uname");       
        }

          if(sand_paypal_password=="")
        {
          show_error("sand_paypal_password","Password field must be filled out");
          flag=1;
        }
        else
        {
          remove_error("sand_paypal_password");       
        }

        if(sand_paypal_sign=="")
        {
          show_error("sand_paypal_sign","Signature field must be filled out");
          flag=1;
        }
        else
        {
          remove_error("sand_paypal_sign");       
        }

         if(sand_paypal_appid=="")
        {
          show_error("sand_paypal_appid","App Id field must be filled out");
          flag=1;
        }
        else
        {
          remove_error("sand_paypal_appid");       
        }

        if(email=="")
        {
          show_error("email","Email address field must be filled out");
          flag=1;
        }
        else
        {
          remove_error("email");       
        }

        if(min_paypal_uname=="")
        {
          show_error("uname","Username field must be filled out");
          flag=1;
        }
        else
        {
          remove_error("uname");       
        }

         if(password=="")
        {
          show_error("password","Password field must be filled out");
          flag=1;
        }
        else
        {
          remove_error("password");       
        }

       if(sign=="")
        {
          show_error("sign","Signature field must be filled out");
          flag=1;
        }
        else
        {
          remove_error("sign");       
        }

        if(appid=="")
        {
          show_error("appid",'App Id field must be filled out');
          flag=1;
        }
        else
        {
          remove_error("appid");
        }

        if(max_paypal_email=="")
        {
          show_error("max_paypal_email",'Email address field must be filled out');
          flag=1;
        }
        else
        {
          remove_error("max_paypal_email");
        }

        if(user_name=="")
        {
          show_error("user_name",'Username field must be filled out');
          flag=1;
        }
        else
        {
          remove_error("user_name");
        }

        if(max_paypal_password=="")
        {
          show_error("max_paypal_password","Password field must be filled out");
          flag=1;
        }
        else
        {
          remove_error("max_paypal_password");       
        }

         if(max_paypal_sign=="")
        {
          show_error("max_paypal_sign","Signature field must be filled out");
          flag=1;
        }
        else
        {
          remove_error("max_paypal_sign");       
        }

         if(max_paypal_appid=="")
        {
          show_error("max_paypal_appid","App Id field must be filled out");
          flag=1;
        }
        else
        {
          remove_error("max_paypal_appid");       
        }

        if(flag==1)
        {
          return false;
        }
        else
        {
          return true;
        }  
      });



      /* validation to accept numbers for phone number only*/
       $("#phone").keydown(function (e) {
          // Allow: backspace, delete, tab, escape, enter and .
          if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
               // Allow: Ctrl/cmd+A
              (e.keyCode == 65 && (e.ctrlKey === true || e.metaKey === true)) ||
               // Allow: Ctrl/cmd+C
              (e.keyCode == 67 && (e.ctrlKey === true || e.metaKey === true)) ||
               // Allow: Ctrl/cmd+X
              (e.keyCode == 88 && (e.ctrlKey === true || e.metaKey === true)) ||
               // Allow: home, end, left, right
              (e.keyCode >= 35 && e.keyCode <= 39)) {
                   // let it happen, don't do anything
                   return;
          }
          // Ensure that it is a number and stop the keypress
          if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
              e.preventDefault();
          }
      });

        /*validation to accept numbers for Zipcode only*/
       $("#pincode").keydown(function (e) {
          // Allow: backspace, delete, tab, escape, enter and .
          if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
               // Allow: Ctrl/cmd+A
              (e.keyCode == 65 && (e.ctrlKey === true || e.metaKey === true)) ||
               // Allow: Ctrl/cmd+C
              (e.keyCode == 67 && (e.ctrlKey === true || e.metaKey === true)) ||
               // Allow: Ctrl/cmd+X
              (e.keyCode == 88 && (e.ctrlKey === true || e.metaKey === true)) ||
               // Allow: home, end, left, right
              (e.keyCode >= 35 && e.keyCode <= 39)) {
                   // let it happen, don't do anything
                   return;
          }
          // Ensure that it is a number and stop the keypress
          if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
              e.preventDefault();
          }
      });


  

     /*validations for contact us page*/
       $("#frm_contact_us").on('submit',function()
      {    
        var address = $('#address').val();
        var phone = $('#phone').val();
        var email = $('#email').val();
        var fax = $('#fax').val();
        var start_day = $('#start_day').val();
        var end_day = $('#end_day').val();
        var start_time = $('#start_time').val();
        var end_time = $('#end_time').val();
        var closed = $('#closed').val();
       
        var flag=0;

        if(address=="")
        {
          show_error("address","Address field must be filled out");
          flag=1;
        }
        else
        {
          remove_error("address");       
        }

        if(phone=="")
        {
          show_error("phone","Phone field must be filled out");
          flag=1;
        }
        else
        {
          remove_error("phone");       
        }

        if(email=="")
        {
          show_error("email","Email Address field must be filled out");
          flag=1;
        }
        else
        {
          remove_error("email");       
        }

        if(fax=="")
        {
          show_error("fax","Fax field must be filled out");
          flag=1;
        }
        else
        {
          remove_error("fax");       
        }

        if(start_day=="")
        {
          show_error("start_day","Start Day field must be filled out");
          flag=1;
        }
        else
        {
          remove_error("start_day");       
        }

        if(end_day=="")
        {
          show_error("end_day","End Day must be filled out");
          flag=1;
        }
        else
        {
          remove_error("end_day");       
        }

        if(start_time=="")
        {
          show_error("start_time","Start Time field must be filled out");
          flag=1;
        }
        else
        {
          remove_error("start_time");       
        }

        if(end_time=="")
        {
          show_error("end_time","End Time field must be filled out");
          flag=1;
        }
        else
        {
          remove_error("end_time");       
        }

        if(closed=="")
        {
          show_error("closed","Closing Days field must be filled out");
          flag=1;
        }
        else
        {
          remove_error("closed");       
        }

        if(flag==1)
        {
          return false;
        }
        else
        {
          return true;
        }  
      });


      /*validations for add faq*/
        $("#frm_add_faq").on('submit',function()
      {    
        var question = $('#question').val();
        var Answers = $('#Answers').val();
        
        var flag=0;

        if(question=="")
        {
          show_error("question","Question field must be filled out");
          flag=1;
        }
        else
        {
          remove_error("question");       
        }

        if(Answers=="")
        {
          show_error("Answers","Answer field must be filled out");
          flag=1;
        }
        else
        {
          remove_error("Answers");       
        }

        if(flag==1)
        {
          return false;
        }
        else
        {
          return true;
        }  
      });

      /*validations for edit faq*/
      $("#frm_edit_faq").on('submit',function()
      {    
        var question = $('#question').val();
        var answer = $('#answer').val();
        
        var flag=0;

        if(question=="")
        {
          show_error("question","Question field must be filled out");
          flag=1;
        }
        else
        {
          remove_error("question");       
        }

        if(answer=="")
        {
          show_error("answer","Answer field must be filled out");
          flag=1;
        }
        else
        {
          remove_error("answer");       
        }

        if(flag==1)
        {
          return false;
        }
        else
        {
          return true;
        }  
      });  

        /*Validations for csv report generation module*/
        $("#frm_report").on('submit',function(){
          var package = $('#package').val();
          var start_date = $('#start_date').val();
          var end_date = $('#end_date').val();
          var flag=0;

        if(package=="")
        {
          show_error("package","Package field must be selected");
          flag=1;
        }
        else
        {
          remove_error("package");       
        }

        if(start_date=="")
        {
          show_error("start_date_err","Start date field must be filled out");
          flag=1;
        }
        else
        {
          remove_error("start_date_err");       
        }

        if(end_date=="")
        {
          show_error("end_date_err","End date field must be filled out");
          flag=1;
        }
        else
        {
          remove_error("end_date_err");       
        }

        if(flag==1)
        {
          return false;
        }
        else
        {
          return true;
        } 
        });


        $("#end_date").change(function () {
          var startDate = document.getElementById("start_date").value;
          var endDate = document.getElementById("end_date").value;
       
          if ((startDate!='' && endDate!='' && Date.parse(startDate) >= Date.parse(endDate))) {
              alert("End date should be greater than Start date");
              document.getElementById("end_date").value = "";
          }
      });

       /*validations for mail settings*/
      $("#frm_mail_setting").on('submit',function()
      {    
        var hostname = $('#hostname').val();
        var encrypto = $('#encrypto').val();
        var mailsetemail = $('#mailsetemail').val();
        var mailsetpassword = $('#mailsetpassword').val();
        
        var flag=0;

        if(hostname=="")
        {
          show_error("hostname","Host name field must be filled out");
          flag=1;
        }
        else
        {
          remove_error("hostname");       
        }

        if(encrypto=="")
        {
          show_error("encrypto","Encryption type field must be selected");
          flag=1;
        }
        else
        {
          remove_error("encrypto");       
        }

        if(mailsetemail=="")
        {
          show_error("mailsetemail","User email field must be filled out");
          flag=1;
        }
        else
        {
          remove_error("mailsetemail");       
        }

        if(mailsetpassword=="")
        {
          show_error("mailsetpassword","Time Zone field must be selected");
          flag=1;
        }
        else
        {
          remove_error("mailsetpassword");       
        }

        if(flag==1)
        {
          return false;
        }
        else
        {
          return true;
        }  
      });

});

