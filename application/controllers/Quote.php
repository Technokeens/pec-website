<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Quote extends CI_Controller 
{   
    private $num_rows = 20;
    public function __construct()
    {
        parent::__construct();
        $this->load->model('common');
        $this->load->model('public_model');
        $this->load->library('email');
        $this->load->library('session');
        $this->load->library('upload');
        $this->load->helper('url');
        $this->load->helper('download');
        $this->load->database();       
        ini_set('memory_limit','64M');  
        $this->session->keep_flashdata('error');
        $this->session->keep_flashdata('success');     
    }
    
    public function index()
    {   
        $data = array();
        $head = array();

        $head['title']          = 'Get a Quote for High-Performance Power Resistors | PEC';
        $head['description']    = "Have a project in mind? Share your details to get a customized quote for top-quality power resistors. We're here to help!";
        $head['keywords']       = 'PEC | Request Quote';


        // session_unset();
        // destroy the session
        // session_destroy();
        // echo "<pre>";
        // print_r($_SESSION['quotecart']['product']);
        // exit();

        $this->load->view('layout/header',$head);
        $this->load->view('quote',$data);
        $this->load->view('layout/footer',$head);
    }

    public function add_to_quote()
    {
        if(!empty($_POST['product_id'])){
            $quotedata = array(
                'product_id' => (!empty($_POST['product_id'])) ? $_POST['product_id'] : '',
                'product_name' => (!empty($_POST['product_name'])) ? $_POST['product_name'] : '',
                'series_id' => (!empty($_POST['series_id'])) ? $_POST['series_id'] : '',
                'application_id' => (!empty($_POST['application_id'])) ? $_POST['application_id'] : '',
                'series_name' => (!empty($_POST['series_name'])) ? $_POST['series_name'] : '',
            );
            if(empty($_SESSION['quotecart'])){
               $_SESSION['quotecart']['product'] = array();
               array_push($_SESSION['quotecart']['product'], $quotedata); //push to array
                $this->session->set_flashdata('success','Product added to quote list successfully');
            }
            else
            {
              if(!in_array( $quotedata,$_SESSION['quotecart']['product'])) //check in array available
              {
                array_push($_SESSION['quotecart']['product'], $quotedata); //push to array
                $this->session->set_flashdata('success','Product added to quote list successfully');
              }
            } 

            // $this->session->set_userdata('quote',$quotedata);
            // $this->session->unset_userdata($admin_data);
            if(!empty($_POST['redirecturl']))
            {
                redirect($_POST['redirecturl']);
            }
            else{
                redirect('request-quote');
            }
        }
    }

    public function compare()
    {
        if(!empty($_POST['product_id']))
        {
            // session_destroy();
            $comparedata = array(
                'product_id' => (!empty($_POST['product_id'])) ? $_POST['product_id'] : '',
                'product_name' => (!empty($_POST['product_name'])) ? $_POST['product_name'] : '',
                'product_image' => (!empty($_POST['product_image'])) ? $_POST['product_image'] : '',
                'construction_title' => (!empty($_POST['construction_title'])) ? $_POST['construction_title'] : '',
                'power_rating' => (!empty($_POST['power_rating'])) ? $_POST['power_rating'] : '',
            );
            if(empty($_SESSION['compare'])){
               $_SESSION['compare']['cmpproduct'] = array();
                array_push($_SESSION['compare']['cmpproduct'], $comparedata); //push to array
                $this->session->set_flashdata('success','Product added to compare list successfully');
            }
            else
            {
              if(!in_array( $comparedata,$_SESSION['compare']['cmpproduct'])) //check in array available
              {
                array_push($_SESSION['compare']['cmpproduct'], $comparedata); //push to array
                $this->session->set_flashdata('success','Product added to compare list successfully');
              }
            } 
            $messageArray = array('status' => "Success" ,"message"=>"Product added to compare list");
            // $messageArray = array('status' => "error" ,"message"=>"No data compare");

            // echo json_encode($messageArray);

            // if(!empty($_POST['redirecturl']))
            // {
            //    $this->session->set_flashdata('success','Product added to compare list successfully');  
            //     redirect($_POST['redirecturl']);
            // }
            // else{
            //     $this->session->set_flashdata('success','Something went wrong'); 
            //     redirect('product');
            // }
        }
    }

    public function remove_compared_product()
    {
        if(!empty($_POST['product_id'])){
            $product_id = $_POST['product_id'];
            foreach ($_SESSION['compare']['cmpproduct'] as $key => $product) {
                if ($product['product_id'] == $product_id) {
                    unset($_SESSION['compare']['cmpproduct'][$key]);
                    // Re-index the array
                    $_SESSION['compare']['cmpproduct'] = array_values($_SESSION['compare']['cmpproduct']);
                    break;
                }
            }
        }
    }

    public function remove_product()
    {
        if(!empty($_POST['product_id'])){
            // echo $_POST['product_id'];
            // unset($_SESSION['quotecart']['product'][$_POST['product_id']]);
            $product_id = $_POST['product_id'];
            foreach ($_SESSION['quotecart']['product'] as $key => $product) {
                if ($product['product_id'] == $product_id) {
                    unset($_SESSION['quotecart']['product'][$key]);
                    // Re-index the array
                    $_SESSION['quotecart']['product'] = array_values($_SESSION['quotecart']['product']);
                    break;
                }
            }
        }
    }

    public function send_quotation()
    {
        if(!empty($_POST['email']))
        {

            if(!empty($_POST['qty'])){
                $cnt = count($_POST['qty']);
                $product_array = array();
                for ($i=0; $i < $cnt ; $i++) 
                { 
                    $product_array[] = array(
                        'product_id' => $_POST['product_id'][$i],
                        'series_id' => $_POST['series_id'][$i],
                        'product_image' => $_POST['product_image'][$i],
                        'product_name' => $_POST['product_name'][$i],
                        'series_name' => $_POST['series_name'][$i],
                        'application_id' => $_POST['application_id'][$i],
                        'resistance_value' => (!empty($_POST['resistance_value'][$i])) ? $_POST['resistance_value'][$i] : '-',
                        'tolerance_value' => (!empty($_POST['tolerance_value'][$i])) ? $_POST['tolerance_value'][$i] : '-',
                        'qty' => $_POST['qty'][$i],
                    );
                }
            }

            $product_data = json_encode($product_array,true);
            $savedata = array(
                'product_data' => $product_data,
                'name' => (!empty($_POST['name'])) ? $_POST['name'] : '',
                'email' => (!empty($_POST['email'])) ? $_POST['email'] : '',
                'phone' => (!empty($_POST['phone'])) ? $_POST['phone'] : '',
                'address' => (!empty($_POST['address'])) ? $_POST['address'] : '',
                'message' => (!empty($_POST['message'])) ? $_POST['message'] : '',
                'created_on' => date('Y-m-d H:i:s'),
            );

            // $this->sendEmail();exit();
            if($this->common->db_add('tbl_quotation',$savedata))
            {
                $id=$this->db->insert_id(); 
                if($this->sendEmail()){
                    unset($_SESSION['quotecart']['product']);
                    session_destroy();
                    $this->session->set_flashdata('success','Quotation submited successfully');
                }else{
                   
                    $this->session->set_flashdata('error','Failed to send mail.Please try again');
                }
                $this->session->set_flashdata('success','Quotation submited successfully');  
                redirect(base_url().'product');
            }
            else
            {
                $this->session->set_flashdata('error','failed to send quotation');  
                redirect(base_url().'product');
            }
        }
    }
   

    private function sendEmail()
    {   
        $website      = $this->common->fetchsingledata('*','tbl_website_setting',' where wid="1"'); 
        $mailsetting      = $this->common->fetchsingledata('*','tbl_mailsetting',' where id="1"'); 
        $myEmail = (!empty($website['webemail'])) ? $website['webemail'] : '';
        if (filter_var($myEmail, FILTER_VALIDATE_EMAIL) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) 
        {
           
            if(!empty($_POST['qty'])){
                $cnt = count($_POST['qty']);
                $product_array = '<table style="width:100%;text-align: center;" border="1">
                                            <tr>
                                                <td valign="top" align="left">
                                                    <p><b>Image</b></p>
                                                </td>
                                                <td valign="top" align="left">
                                                    <p><b>Product</b></p>
                                                </td>
                                                <td valign="top" align="left">
                                                    <p><b>Resistance Value</b></p>
                                                </td>
                                                <td valign="top" align="left">
                                                    <p><b>Tolerance Value</b></p>
                                                </td>
                                                <td valign="top" align="left">
                                                    <p><b>Quantity</b></p>
                                                </td>
                                            </tr>';
                for ($i=0; $i < $cnt ; $i++) 
                { 
                    $resistance_value = (!empty($_POST['resistance_value'][$i])) ? $_POST['resistance_value'][$i] : '-';
                    $tolerance_value = (!empty($_POST['tolerance_value'][$i])) ? $_POST['tolerance_value'][$i] : '-';

                    $product_array .= '
                            <tr>
                                <td valign="top" align="left">
                                    <p><img src="'.$_POST['product_image'][$i].'" style="width:100px;height:70px" /></p>
                                </td>
                                <td valign="top" align="left">
                                    <p>'.$_POST['product_name'][$i].' - '.$_POST['series_name'][$i].'</p>
                                </td>
                                <td valign="top" align="left">
                                    <p>'.$resistance_value.'</p>
                                </td>
                                <td valign="top" align="left">
                                    <p>'.$tolerance_value.'</p>
                                </td>
                                <td valign="top" align="left">
                                    <p>'.$_POST['qty'][$i].'</p>
                                </td>
                            </tr>
                        ';

                }

                $product_array .= '</table>';
            }

            // echo "<pre>";
            // print_r($product_array);
            // exit();

            $str=file_get_contents('email/quotation-mail-to-user.html');
            $siteLogo = (!empty($website['logo'])) ? $website['logo'] : '';
            $siteName = (!empty($website['title'])) ? $website['title'] : '';
            $smtpuser = (!empty($mailsetting['smtpuser'])) ? $mailsetting['smtpuser'] : '';
            $logo     = '<img src="'.base_url().'uploads/'.$siteLogo.'" width="75" alt="logo" />';
            $this->common->setting_smtp();
           
            $name = (!empty($_POST['name'])) ? ucfirst($_POST['name']) :'';
            $address = (!empty($_POST['address'])) ? ucfirst($_POST['address']) : '';

            $fullname = $name;
            $str = str_replace('@LOGO@',$logo,$str);
            $str = str_replace('@FIRSTNAME@',$fullname,$str);
            $str = str_replace('@NAME@',$fullname,$str);
            $str = str_replace('@EMAIL@',$_POST['email'],$str);  
            $str = str_replace('@PHONE@',$_POST['phone'],$str);  
            $str = str_replace('@MESSAGE@',$_POST['message'],$str);
            $str = str_replace('@ADDRESS@',$_POST['address'],$str);
            $str = str_replace('@PRODUCTDATA@',$product_array,$str);
            $str = str_replace('@DATE@',date('d-m-Y'),$str);
            $str = str_replace('@SITENAME@',ucfirst($siteName),$str);
            
            $this->email->set_newline("\r\n");
            $this->email->from($smtpuser);
            $this->email->bcc('');
            $this->email->cc('');
            $this->email->to($_POST['email']);
            $this->email->subject('Quotation Send');
            $this->email->set_mailtype("html");
            $this->email->message($str);
            // print_r($str);
            $this->email->send();
            
            $str=file_get_contents('email/quotation-mail-to-admin.html');
            $admin_mail     = $myEmail;
            $str = str_replace('@FIRSTNAME@',$fullname,$str);
            $str = str_replace('@LOGO@',$logo,$str);
            $str = str_replace('@EMAIL@',$_POST['email'],$str);  
            $str = str_replace('@PHONE@',$_POST['phone'],$str);  
            $str = str_replace('@MESSAGE@',$_POST['message'],$str);
            $str = str_replace('@ADDRESS@',$_POST['address'],$str);
            $str = str_replace('@PRODUCTDATA@',$product_array,$str);
            $str = str_replace('@DATE@',date('d-m-Y'),$str);
            $str = str_replace('@SITENAME@',$siteName,$str);
            $this->email->set_newline("\r\n");
            $this->email->from($smtpuser);
            $this->email->bcc('');
            $this->email->cc('');
            $this->email->to($admin_mail);
            $this->email->subject('Enquiry from the website');
            $this->email->set_mailtype("html");
            $this->email->message($str); 
            // print_r($str);exit();
            if($this->email->send())
            {
                return true;
            }else{
                return false;
            }
        }
        
        return false;
    }





    
}