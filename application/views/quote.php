<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "WebPage",
  "name": "Request a Quote",
  "url": "https://peccomponents.com/request-quote",
  "description": "Have a project in mind? Share your details to get a customized quote for top-quality power resistors. We're here to help"
}
</script>

<style>
  .shopping-cart__totals > h1, .shopping-cart__totals > .h1 {
      font-size: 1rem;
      text-transform: uppercase;
      margin-bottom: 1.25rem;
  }
</style>
<div class="mb-5 pb-xl-5"></div>
  <main>
    <div class="mb-3 pb-3 mb-md-4 pb-md-2 mb-xl-5 pb-xl-5 hidden-xs"></div>
    
    <section class="shop-main container d-flex">
      <div class="flex-grow-1">
        
        <div class="row mb-4 mb-md-4 pb-md-4 mb-xl-5">
        	<form method="POST" name="contact-us-form" action="<?=base_url();?>quote/send_quotation" id="send_quotation_form">
        	<div class="shopping-cart">
        		<!-- ------------------------------ -->
		        <div class="cart-table__wrapper">
		          <table class="cart-table">
		            <thead>
		              <tr>
		                <th style="width: 20%;"></th>
		                <th style="width: 25%;">Product Name</th>
                        <th style="width: 20%;">Resistance Value</th>
                        <th style="width: 20%;">Tolerance Value</th>
		                <th style="width: 10%;">Quantity</th>
		                <th style="width: 5%;"></th>
		              </tr>
		            </thead>
		            <tbody>
		            	<?php
		            	if(!empty($_SESSION['quotecart']['product'])){
		            			foreach ($_SESSION['quotecart']['product'] as $key => $cart) { 
		            				$seri = $this->common->fetchsingledata('series_image,slug','tbl_product_series',' where ps_id="'.$cart['series_id'].'"');
		            				$prod = $this->common->fetchsingledata('slug','tbl_product',' where p_id="'.$cart['product_id'].'"');

		            				if(!empty($seri['series_image']) && file_exists('uploads/series/'.$seri['series_image'])){
                          $image = base_url().'uploads/series/'.$seri['series_image'];
                        }else{
                          $image = base_url().'assets/images/no-image.jpg';
                        }
		            	?>

		            				<tr>
    					                <td>
    					                  <div class="shopping-cart__product-item">
    					                    <a href="<?=base_url();?>product/<?=$seri['slug']?>/<?=$prod['slug']?>">
    					                      <img loading="lazy" src="<?=$image;?>" width="120" height="120" class="img_pl_2" alt="">
    					                      <input type="hidden" name="product_image[]" value="<?=$image;?>">
    					                    </a>
    					                  </div>
    					                </td>
    					                <td>
    					                  <div class="shopping-cart__product-item__detail">
    					                    <p class="mb-0"><a href="<?=base_url();?>product/<?=$seri['slug']?>/<?=$prod['slug']?>"><?=(!empty($cart['series_name'])) ? $cart['series_name'] : ''; ?>(<?=(!empty($cart['product_name'])) ? $cart['product_name'] : ''; ?>)</a></p>
    					                  </div>
    					                </td>
                                        <td>
                                          <div class="shopping-cart__product-item__detail mr-1">
                                            <textarea name="resistance_value[]" class="qtyinput" style="width: 100%;" ></textarea>
                                          </div>
                                        </td>
                                        <td>
                                          <div class="shopping-cart__product-item__detail mr-1">
                                            <textarea name="tolerance_value[]" class="qtyinput" style="width: 100%;" ></textarea>
                                          </div>
                                        </td>
    					                <td>
    					                	<input type="hidden" name="product_id[]" value="<?=(!empty($cart['product_id'])) ? $cart['product_id'] : ''; ?>">
    					                	<input type="hidden" name="product_name[]" value="<?=(!empty($cart['product_name'])) ? $cart['product_name'] : ''; ?>">
    						                <input type="hidden" name="series_id[]" value="<?=(!empty($cart['series_id'])) ? $cart['series_id'] : ''; ?>">
    						                <input type="hidden" name="series_name[]" value="<?=(!empty($cart['series_name'])) ? $cart['series_name'] : ''; ?>">
    						                <input type="hidden" name="application_id[]" value="<?=(!empty($cart['application_id'])) ? $cart['application_id'] : ''; ?>">

    					                	<input type="number" name="qty[]" class="qtyinput" value="1" min="1" style="width: 100%;" required>
    					                </td>
    					                
    					                <td>
    					                  <a href="javascript:;" class="remove-cart" data-id="<?=$cart['product_id'];?>" onclick="javascript:deleteproduct('<?=$cart['product_id']?>')">
    					                  	<i class="fa fa-trash delete-quote-icon fs-6" aria-hidden="true"></i>
    					                  </a>
    					                </td>
					                </tr>
					              <?php
		            			}
		            	}else{ ?>
		            		<tr>
		            			<td colspan="4" class="text-center">No Product Available</td>
		            		</tr>
		            	<?php }	?>
		            </tbody>
		          </table>
		         
		        </div>
		        <div class="shopping-cart__totals-wrapper">
		          <div class="sticky-content">
		            <div class="shopping-cart__totals">
		              <h1>Request A Quote</h1>
		              <p>Got a project in mind? We're all ears! Fill out the form and tell us all about your project.</p>
		                  <div id="checkquoteerr"></div>
                          <div class="form-floating my-4">
                            <label for="name">Name *</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="John" required>
                          </div>
                          <div class="form-floating my-4">
                            <label for="email">Email *</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Email@example.com" required>
                          </div>
                          <div class="form-floating my-4">
                            <label for="phone">Mobile Number *</label>
                            <input type="number" class="form-control" name="phone" id="phone" placeholder="98********" required>
                          </div>
                          <div class="form-floating my-4">
                            <label>Shipping Address</label>
                            <textarea class="form-control form-control_gray" name="address" id="address" placeholder="Full Address" cols="30" rows="5" required></textarea>
                          </div>
                          <div class="form-floating my-4">
                            <label>Message</label>
                            <textarea class="form-control form-control_gray" name="message" id="message" placeholder="Hello" cols="30" rows="5" required></textarea>
                          </div>
                          <div class="my-4">
                          	<?php //if(!empty($_SESSION['quotecart']['product'])){ ?>
                          		<button type="submit" class="btn btn-outline-primary border-0 fs-base btn-45" id="save">
                                  Request Quote
                                </button>
                                  <button type="button" class="btn btn-outline-primary border-0 fs-base btn-45" id="save_hidden" style="display: none;">
                                  Request Quote
                                  </button>
                            <?php //} ?>
                               
                          </div>
		            </div>
		            
		          </div>
		        </div>





		        <!-- ----------------- -->
		      </div>
		    </form>
        </div>
        
      </div>
    </section><!-- /.shop-main container -->
  </main>

<script>

    $(document).on('click', '.cart-table .remove-cart', function(e) {
        e.preventDefault();
        var product_id = $(this).attr('data-id');
        var answer = confirm("Are you sure you want to remove this product from list ?");
        
        if (answer) {
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('quote/remove_product');?>",
                data: {
                    product_id: product_id,
                },
                success: function(response) {
                    // alert(response)
                    // $(".rowid" + rowid).remove(".rowid" + rowid);
                    
                    // window.location.reload();
                    // return;
                }
            });

            let parentEl = $(this).closest('tr');
            $(parentEl).addClass('_removed');
            setTimeout(() => {
              $(parentEl).remove();
            }, 350);

        }
    });

	// function deleteproduct(product_id) {
    //     var answer = confirm("Are you sure you want to remove this product from list ?");
        
    //     if (answer) {
    //         $.ajax({
    //             type: "POST",
    //             url: "<?php echo base_url('quote/remove_product');?>",
    //             data: {
    //                 product_id: product_id,
    //             },
    //             success: function(response) {
    //             	// alert(response)
    //                 // $(".rowid" + rowid).remove(".rowid" + rowid);
                    
    //                 // window.location.reload();
    //                 // return;
    //             }
    //         });
    //     }else{
    //         $('.remove-cart').show();
    //     }
    // }


 $(document).on('submit','#send_quotation_form',function(){
    var name      = $('#name').val();
    var email     = $('#email').val();
    var message   = $('#message').val();
    var address   = $('#address').val();
    var phone     = $('#phone').val();
    var checkquotelist = "<?=(!empty($_SESSION['quotecart']['product'])) ? count($_SESSION['quotecart']['product']) : ''; ?>"
    var name_regex = /^[a-zA-Z ]+$/;
    var flag    = 0;
    var filter = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
    var phonenumber = /^((\+[1-9]{1,4}[ \-]*)|(\([0-9]{2,3}\)[ \-]*)|([0-9]{2,4})[ \-]*)*?[0-9]{3,4}?[ \-]*[0-9]{3,4}?$/;
    var mobileregexExp = /^[6-9]\d{9}$/gi;

    if(checkquotelist == "")
    {
       show_error("checkquoteerr","Please add products to quote list");
       flag = 1;
    }else
    {
       remove_error("checkquoteerr");
    }    


    if(name=="")
    {
       show_error("name","Please enter name.");
       flag = 1;
    }else
    {
       remove_error("name");
    }

    if(email=="")
    {
       show_error("email","Please enter email.");
       flag = 1;
    }else
    {
        if(!filter.test(email)){
          show_error('email', 'Please enter valid email address.');
          flag = 1;
        }else{
          remove_error('email');
        }
    }

    if (phone == "" || !phone.trim())
    {
        show_error("phone","Please enter mobile number.");
        flag = 1;
    } 
    else if(!/^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/.test(phone))
    {
        show_error("phone","Please enter correct mobile number.");
        flag = 1;
    } 
    else
    {     
        remove_error("phone");
    } 

    if(message=="")
    {
       show_error("message","Please enter message.");
       flag = 1;
    }else
    {
       remove_error('message');
    }

    if(address=="")
    {
       show_error("address","Please enter address.");
       flag = 1;
    }else
    {
       remove_error('address');
    }
    
    
    if (flag == 1) 
    {
       return false;
    }else{ 
       // return true; 
        $('#save').hide();
        $('#save_hidden').show(); 
        $('#send_quotation_form').submit();
    }
 });
</script>