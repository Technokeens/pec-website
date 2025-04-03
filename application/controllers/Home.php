<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller 
{   
    private $num_rows = 20;
    private $num_rows_types = 21;
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

        // $this->session->keep_flashdata('error');
        // $this->session->keep_flashdata('success');     
    }
    
    
    public function index()
    {   
        $data = array();
        $head = array();

        $setting=$this->common->fetchsingledata('*','tbl_website_setting',' WHERE wid=1');

        $head['title']          = $setting['seo_title'];

        $head['description']    = $setting['seo_description'];

        $head['keywords']       = $setting['seo_keywords'];

        $data['sliders']      = $this->common->fetchdata('*','tbl_slider','where status="1" ORDER BY id DESC');

        $data['applications'] = $this->common->fetchdata('*','tbl_application','where status="1" AND delete_status = "0" AND show_as_home ="on" ORDER BY position ASC LIMIT 6');

        $data['allapplications'] = $this->common->fetchdata("t_id,title","tbl_application"," WHERE status='1' AND delete_status='0'");
        $data['allconstruction'] = $this->common->fetchdata("c_id,construction_title","tbl_construction"," WHERE status='1' AND delete_status='0'");
        $data['allpower_ratings'] = $this->common->fetchdata("pr_id,power_rating","tbl_power_rating"," WHERE status='1' AND delete_status='0'");

        $data['events'] = $this->common->fetchdata('*','tbl_event','where status="1" ORDER BY e_id DESC');

        $data['clients'] = $this->common->fetchdata('*','tbl_client','where status="1" ORDER BY id DESC');

        $data['featured_series'] = $this->common->fetchdata('*','tbl_product_series','where status="1" AND delete_status = "0" AND show_as_featured = "on" LIMIT 10');


        $this->load->view('layout/header',$head);
        $this->load->view('home',$data);
        $this->load->view('layout/footer',$head);
    }

    public function about()
    {   
        $data = array();
        $head = array();

        $head['title']          = 'About Us - PEC';
        $head['description']    = 'Since 1972, PEC has been crafting innovative, certified resistors with unmatched quality and reliability for industries worldwide.';
        $head['keywords']       = 'Resistor';

        $this->load->view('layout/header',$head);
        $this->load->view('about',$data);
        $this->load->view('layout/footer',$head);
    }

    public function series($page=0)
    {   
        $data = array();
        $head = array();

        $head['title']          = "Explore Advanced Power Resistor Products - PEC";
        $head['description']    = "Discover PEC's wide range of power resistors, including wirewound, axial, tubular, and braking resistor solutions. Designed for reliability and diverse applications.";
        $head['keywords']       = "Power Resistors";

        $data['applications'] = $this->common->fetchdata('*','tbl_application','where status="1" AND delete_status = "0" ORDER BY position ASC');
        $data['constructions'] = $this->common->fetchdata('*','tbl_construction','where status="1" AND delete_status = "0" ORDER BY position ASC');
        $data['power_ratings'] = $this->common->fetchdata('*','tbl_power_rating','where status="1" AND delete_status = "0"  ORDER BY position ASC');
        $get=$_GET; 
        if (!empty($get['per_page']) && $get['per_page']!=0) {
            $page = $get['per_page']; 
            $page=$page-1;
            $page=$page*20;
        }
          
        $rowscount = $this->public_model->seriesCount($get);
        $data['series'] = $this->public_model->getSeriesList($this->num_rows,$page,$get);
        $data['appFilter'] = $this->getApplicationFilter($get);
        $data['constructionFilter'] = $this->getConstructionFilter($get);
        $data['powerFilter'] = $this->getPowerFilter($get);
        

        // $data['test'] = $this->public_model->test($this->num_rows,$page,$get);
        $data['links_pagination'] = seriespagination('product', $rowscount, $this->num_rows);

        $this->load->view('layout/header',$head);
        $this->load->view('series',$data);
        $this->load->view('layout/footer',$head);
    }

    public function getApplicationFilter($get)
    {
        $applications = $this->common->fetchdata('*','tbl_application','where status="1" AND delete_status = "0" ORDER BY title ASC');
        $final = array();
        if(!empty($applications)){
          $checked ='';
          $prodcount='0';
          $sum = 0;
          $array_inner_count = array();
          $cnnt = 0;
          foreach ($applications as $key => $value) 
          { 
            if(!empty($get['application'])){
              $checked ='';
              $prodcount='0';
              $expapplication = explode(',', $get['application']);
                foreach ($expapplication as $apkey => $ap) 
                {
                  if($ap == $value['t_id']){
                    $checked = 'checked';
                    $cnnt = $cnnt+1;
                    $prodcount = $this->public_model->productCountFilter('application',$value['t_id'],$get);
                  }
                }
            }else{
                $prodcount = $this->public_model->productCountFilter('application',$value['t_id'],$get);
            }
            if(!empty($prodcount['product_count'])){
                $sum = $sum+$prodcount['product_count'];
            }

            $array_inner_count[] = array(
                't_id' => $value['t_id'],
                'title' => $value['title'],
                'product_count' => (!empty($prodcount['product_count'])) ? $prodcount['product_count'] : '0',
                'checked' => $checked,
            );

          }
        }

        $final = array(
            'sum' => $sum,
            'cnnt' => $cnnt,
            'application' => $array_inner_count,
        );

        return $final;
    }

    public function getConstructionFilter($get)
    {
        $constructions = $this->common->fetchdata('*','tbl_construction','where status="1" AND delete_status = "0" ORDER BY construction_title ASC');
        $final = array();
        if(!empty($constructions)){
          $cchecked ='';
          $prodcount='0';
          $sum=0;
          $cnnt = 0;
          $array_inner_count = array();
          foreach ($constructions as $ckey => $cvalue) 
          { 
                if(!empty($get['construction'])){
                  $cchecked ='';
                  $prodcount='0';
                  $expconstruction = explode(',', $get['construction']);
                    foreach ($expconstruction as $conskey => $cons) 
                    {
                      if($cons == $cvalue['c_id']){
                        $cchecked = 'checked';
                        $cnnt = $cnnt+1;
                        $prodcount = $this->public_model->productCountFilter('construction',$cvalue['c_id'],$get);
                      }
                    }
                }else{
                  $prodcount = $this->public_model->productCountFilter('construction',$cvalue['c_id'],$get);
                }

            if(!empty($prodcount['product_count'])){
                $sum = $sum+$prodcount['product_count'];
            }
        
            $array_inner_count[] = array(
                'c_id' => $cvalue['c_id'],
                'construction_title' => $cvalue['construction_title'],
                'product_count' => (!empty($prodcount['product_count'])) ? $prodcount['product_count'] : '0',
                'cchecked' => $cchecked,
            );
          }
        }
        $final = array(
            'sum' => $sum,
            'cnnt' =>$cnnt,
            'constructions' => $array_inner_count,
        );

        return $final;
    }

    public function getPowerFilter($get)
    {
        $power_ratings = $this->common->fetchdata('*','tbl_power_rating','where status="1" AND delete_status = "0"  ORDER BY position ASC');
        $final = array();
        if(!empty($power_ratings)){
          $pchecked ='';
          $prodcount='0';
          $sum=0;
          $cnnt = 0;
          $array_inner_count = array();
          foreach ($power_ratings as $pkey => $pvalue) 
          { 
            if(!empty($get['power'])){
              $pchecked ='';
              $prodcount='0';
              $exppower = explode(',', $get['power']);
                foreach ($exppower as $ponskey => $pow) 
                {
                  if($pow == $pvalue['pr_id']){
                    $pchecked = 'checked';
                    $cnnt = $cnnt+1;
                    $prodcount = $this->public_model->productCountFilter('power_rating',$pvalue['pr_id'],$get);
                  }
                }
            }else{
              $prodcount = $this->public_model->productCountFilter('power_rating',$pvalue['pr_id'],$get);
            }

            if(!empty($prodcount['product_count'])){
                $sum = $sum+$prodcount['product_count'];
            }

            $array_inner_count[] = array(
                'pr_id' => $pvalue['pr_id'],
                'power_rating' => $pvalue['power_rating'],
                'product_count' => (!empty($prodcount['product_count'])) ? $prodcount['product_count'] : '0',
                'pchecked' => $pchecked,
            );
        
          }
        }
        $final = array(
            'sum' => $sum,
            'cnnt' => $cnnt,
            'powerratings' => $array_inner_count,
        );

        return $final;
    }

    public function product($series_slug=null,$page=0)
    {
        $data = array();
        $head = array();

        $get=$_GET; 
        if (!empty($get['per_page']) && $get['per_page']!=0) {
            $page = $get['per_page']; 
            $page=$page-1;
            $page=$page*21;
        }
          
        $rowscount = $this->public_model->productCount($get,$series_slug);
        $data['product_types'] = $this->public_model->getProductList($this->num_rows_types, $page,$get,$series_slug);
        $data['series_data'] = $this->public_model->getSeriesDetail($series_slug);
        if(!empty($data['series_data'])){
            $data['datasheets'] = $this->common->fetchdata('*','tbl_product_documents','where series_id="'.$data['series_data']['ps_id'].'" ORDER BY pdf_id DESC');
        }
        $data['links_pagination'] = seriespagination($series_slug, $rowscount, $this->num_rows);

        $head['title']          = (!empty($data['series_data']['seo_title'])) ? $data['series_data']['seo_title'] : 'PEC | Product';
        $head['description']    = (!empty($data['series_data']['seo_description'])) ? $data['series_data']['seo_description'] : 'PEC | Product';
        $head['keywords']       = (!empty($data['series_data']['seo_keywords'])) ? $data['series_data']['seo_keywords'] : 'PEC | Product';

        $this->load->view('layout/header',$head);
        $this->load->view('product',$data);
        $this->load->view('layout/footer',$head);
    }

    public function product_detail($series_slug=null,$product_slug=null)
    {
        $data = array();
        $head = array();

        $get=$_GET;  
        $page = 1;
        if (!empty($page) && $page!=0) {
            $page=$page-1;
            $page=$page*20;  // to test
        }
        $data['datasheets'] = array();
          
        // $rowscount = $this->public_model->productCount($get,$series_slug);

        // $data['product_types'] = $this->public_model->getProductList($this->num_rows, $page,$get,$series_slug);
        
        $data['product_data'] = $this->public_model->getProductDetail($product_slug);
        if(!empty($data['product_data'])){
            $data['datasheets'] = $this->common->fetchdata('*','tbl_product_documents','where series_id="'.$data['product_data']['ps_id'].'" ORDER BY pdf_id DESC');
        }
        $data['getproducts'] = $this->common->fetchdata('product_name,slug,position','tbl_product','where series_id="'.$data['product_data']['series_id'].'" AND status="1" AND delete_status = "0" ORDER BY position ASC');

        $head['title']          = (!empty($data['product_data']['meta_title'])) ? $data['product_data']['meta_title'] : 'PEC | Product Details';
        $head['description']    = (!empty($data['product_data']['meta_description'])) ? $data['product_data']['meta_description'] : 'PEC | Product Details';
        $head['keywords']       = (!empty($data['product_data']['meta_keyword'])) ? $data['product_data']['meta_keyword'] : 'PEC | Product Details';

        $this->load->view('layout/header',$head);
        $this->load->view('product_detail',$data);
        $this->load->view('layout/footer',$head);
    }

    public function contact()
    {   
        $data = array();
        $head = array();

        $data['mainaddress']      = $this->common->fetchsingledata('*','tbl_contact_us',' where id="1"');
        $data['address']      = $this->common->fetchdata('*','tbl_contact_us',' where id!="1"');

        $head['title']          = (!empty($data['mainaddress']['seo_title'])) ? $data['mainaddress']['seo_title'] : 'Precision Electronic Component | Contact';
        $head['description']    = (!empty($data['mainaddress']['seo_keywords'])) ? $data['mainaddress']['seo_keywords'] : 'Precision Electronic Component | Contact';
        $head['keywords']       = (!empty($data['mainaddress']['seo_description'])) ? $data['mainaddress']['seo_description'] : 'Precision Electronic Component | Contact';


        $this->load->view('layout/header',$head);
        $this->load->view('contact',$data);
        $this->load->view('layout/footer',$head);
    }

    public function save_contact()
    {
        if (!empty($_POST['lead_message']))
        {
            $add_data = array(
                'lead_name'     => (!empty($_POST['lead_name'])) ? $_POST['lead_name'] : '',
                'lead_email'    => (!empty($_POST['lead_email'])) ? $_POST['lead_email'] : '',
                'lead_phone'    => (!empty($_POST['lead_phone'])) ? $_POST['lead_phone'] : '',
                'lead_subject'  => (!empty($_POST['lead_subject'])) ? $_POST['lead_subject'] : '',
                'lead_message'  => (!empty($_POST['lead_message'])) ? $_POST['lead_message'] : '',
                'created_on'    => date('Y-m-d H:i:s'),
            );

            if ($this->common->db_add('tbl_leads', $add_data)) {
                $result = $this->sendEmail();
                if ($result) {
                    $this->session->set_flashdata('success', 'Email is send and your request is submited successfully!');
                } else {
                    $this->session->set_flashdata('error', 'Email send error!');
                }
            } else {
                $this->session->set_flashdata('error', 'Something went wrong!');
            }

            redirect(base_url().'contact-us');
            
        }else
        {
            $this->session->set_flashdata('error','Please fill the form required fields');
             redirect(base_url().'contact-us');
        }

    }

    private function sendEmail()
    {   
        
        $website      = $this->common->fetchsingledata('*','tbl_website_setting',' where wid="1"'); 
        $mailsetting      = $this->common->fetchsingledata('*','tbl_mailsetting',' where id="1"'); 
        $myEmail = (!empty($website['webemail'])) ? $website['webemail'] : '';
        if (filter_var($myEmail, FILTER_VALIDATE_EMAIL) && filter_var($_POST['lead_email'], FILTER_VALIDATE_EMAIL)) 
        {
            
            $str=file_get_contents('email/contact-us-mail-to-user.html');
            $siteLogo = (!empty($website['logo'])) ? $website['logo'] : '';
            $siteName = (!empty($website['title'])) ? $website['title'] : '';
            $smtpuser = (!empty($mailsetting['smtpuser'])) ? $mailsetting['smtpuser'] : '';
            $logo     = '<img src="'.base_url().'uploads/'.$siteLogo.'" width="75" alt="logo" />';
            $this->common->setting_smtp();
           
            $lead_name = (!empty($_POST['lead_name'])) ? ucfirst($_POST['lead_name']) :'';
            $lead_subject = (!empty($_POST['lead_subject'])) ? ucfirst($_POST['lead_subject']) : '';
            $lead_phone = (!empty($_POST['lead_phone'])) ? ucfirst($_POST['lead_phone']) : '';

            $fullname = $lead_name;
            $str = str_replace('@LOGO@',$logo,$str);
            $str = str_replace('@NAME@',$fullname,$str);
            $str = str_replace('@PHONE@',$lead_phone,$str);
            $str = str_replace('@DATE@',date('d-m-Y'),$str);
            $str = str_replace('@SITENAME@',ucfirst($siteName),$str);
            
            $this->email->set_newline("\r\n");
            $this->email->from($smtpuser);
            $this->email->bcc('');
            $this->email->cc('');
            $this->email->to($_POST['lead_email']);
            $this->email->subject('Thank you for contacting us');
            $this->email->set_mailtype("html");
            $this->email->message($str); 
            $this->email->send();
            
            $str=file_get_contents('email/contact-us-mail-to-admin.html');
            $admin_mail     = $myEmail;
            $str = str_replace('@FIRSTNAME@',$fullname,$str);
            $str = str_replace('@LOGO@',$logo,$str);
            $str = str_replace('@EMAIL@',$_POST['lead_email'],$str);  
            $str = str_replace('@PHONE@',$lead_phone,$str);
            $str = str_replace('@MESSAGE@',$_POST['lead_message'],$str);
            $str = str_replace('@SUBJECT@',$_POST['lead_subject'],$str);
            $str = str_replace('@DATE@',date('d-m-Y'),$str);
            $str = str_replace('@SITENAME@',$siteName,$str);
            $this->email->set_newline("\r\n");
            $this->email->from($smtpuser);
            $this->email->bcc('');
            $this->email->cc('');
            $this->email->to($admin_mail);
            $this->email->subject('Contact Leads');
            $this->email->set_mailtype("html");
            $this->email->message($str); 
            if($this->email->send())
            {
                return true;
            }else{
                return false;
            }
        }
        
        return false;
    }

    public function application_list()
    {   
        $data = array();
        $head = array();

        $head['title']          = 'Versatile Resistor Solutions for All Applications - PEC';
        $head['description']    = 'Explore PEC’s resistors designed for automotive, energy metering, renewable energy, medical, telecom, and more. Reliable solutions for diverse industries!';
        $head['keywords']       = 'Resistors For Automotive, Renewable Energy, Medical, Traction';

        $data['applications']      = $this->common->fetchdata('*','tbl_application',' where status="1" AND delete_status="0" ORDER BY position ASC');
        // $data['address']      = $this->common->fetchdata('*','tbl_contact_us',' where id!="1"');

        $this->load->view('layout/header',$head);
        $this->load->view('application_list',$data);
        $this->load->view('layout/footer',$head);
    }

    public function view_application($slug = null)
    {   
        $data = array();
        $head = array();

        $head['title']          = 'PEC | View Application';
        $head['description']    = 'PEC | View Application';
        $head['keywords']       = 'PEC | View Application';

        $data['application']      = $this->common->fetchsingledata('*','tbl_application',' where slug = "'.$slug.'" ');
        $data['application_related_series'] = $this->public_model->application_related_series($data['application']['t_id']);

        $head['title']          = (!empty($data['application']['seo_title'])) ? $data['application']['seo_title'] : 'PEC | View Application';
        $head['description']    = (!empty($data['application']['seo_description'])) ? $data['application']['seo_description'] : 'PEC | View Application';
        $head['keywords']       = (!empty($data['application']['seo_keywords'])) ? $data['application']['seo_keywords'] : 'PEC | View Application';

        $this->load->view('layout/header',$head);
        $this->load->view('view_application',$data);
        $this->load->view('layout/footer',$head);
    }

    public function terms()
    {
        $data = array();
        $head = array();

        $head['title']          = 'Terms of Service - Precision Electronic Components Mfg Co.';
        $head['description']    = 'Understand our terms of service, warranties, and usage rules. Using our site means you agree to these terms. Got questions? Reach out! ';
        $head['keywords']       = 'PEC | Terms of service';

        $this->load->view('layout/header',$head);
        $this->load->view('terms',$data);
        $this->load->view('layout/footer',$head);
    }

    public function privacy_policy()
    {
        $data = array();
        $head = array();

        $head['title']          = 'Privacy Policy | How We Use & Protect Your Data';
        $head['description']    = 'We collect info like your name, email, and usage data to improve services. Your data stays secure. Want details? Check out our privacy policy!';
        $head['keywords']       = 'PEC | Privacy Policy';

        $this->load->view('layout/header',$head);
        $this->load->view('privacy_policy',$data);
        $this->load->view('layout/footer',$head);
    }

    public function testmail()
    {   
        
        $website      = $this->common->fetchsingledata('*','tbl_website_setting',' where wid="1"'); 
        $mailsetting      = $this->common->fetchsingledata('*','tbl_mailsetting',' where id="1"');

        $smtpuser = (!empty($mailsetting['smtpuser'])) ? $mailsetting['smtpuser'] : '';
        $this->common->setting_smtp();
        $this->email->set_newline("\r\n");
        $this->email->from($smtpuser);
        $this->email->bcc('');
        $this->email->cc('');
        $this->email->to('ashita.kumawat@technokeens.com');
        $this->email->subject('Thank you for contacting us');
        $this->email->set_mailtype("html");
        $this->email->message('Test mail'); 
       
        if($this->email->send())
        {
            echo "mail send";
            exit();
        }else{
            echo "no mail send";
            echo $this->email->print_debugger();
           exit();
        }
        
        
     
    }
    
}