<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller 
{   
    public function __construct()
    {
        parent::__construct();
        $this->load->model('common');
        $this->load->library('form_validation');
        $this->load->library('email');
        $this->load->library('session');
        $this->load->library('upload');
        $this->load->helper('url');
        $this->load->helper('download');
        $this->load->helper('cookie');
        $this->load->helper('security'); 
        $this->load->library('calendar');  
        // $this->load->library('Imap');       
        $this->load->database();        
        ini_set('memory_limit','64M');  
        $this->load->library('PHPExcel');
        date_default_timezone_set("Asia/Calcutta"); 

        $this->session->keep_flashdata('error');
        $this->session->keep_flashdata('success'); 
    }

   
    public function index()
    {
        if($this->session->userdata('user_type')!='' && $this->session->userdata('user_type')=='admin')
        {
            redirect(base_url().'admin/dashboard');    
        }
        else
        {
            redirect(base_url().'admin');
        }
    }

    public function login()
    {
        $data['title']='PEC - Login';
        $data['middle_content']="PEC - Login";
        $this->load->view('admin/auth/login',$data);
    }

    public function go_login()
    {
        if(!empty($_POST['login']))
        {
            $user=$this->input->post('login_username',true);                                
            $pass=$this->input->post('login_pass',true);
            $check_user=$this->common->fetchsingledata('*','admin',' WHERE user_name="'.$user.'" AND password="'.md5($pass).'"');
          
            if(!empty($check_user))
            {
                $fieldarray=array('last_login'=>date('Y-m-d H:i:s'));
                $this->common->db_update('admin',$fieldarray,'id',$check_user['id']);
                $admin_data=array('user_id'=>$check_user['id'],'user_type'=>$check_user['user_type'],'login_time'=>date('H:i:s'),'first_name'=>$check_user['first_name'],'last_name'=>$check_user['last_name'],'user_email'=>$check_user['user_name'],'role_slug'=>$check_user['user_type'],'username'=>$check_user['user_name']);
                $this->session->set_userdata($admin_data);
                 if (isset($_POST['remember_me'])) {
                    /* Set cookie to last 1 year */
                    set_cookie('username', $_POST['login_username'], time()+60*60*24*365);
                    set_cookie('password', $_POST['login_pass'], time()+60*60*24*365);
                    }
                $setting=$this->common->fetchsingledata('*','tbl_website_setting',' WHERE wid=1');
                $this->session->set_userdata('timezone',$setting['timezone']);
                redirect(base_url().'admin/dashboard/');
            }
            else
            {
                $this->session->set_flashdata('error','Please enter valid email id / password');
                redirect(base_url().'admin');
            }
        }
    }

    public function logout()
    { 
        if($this->session->userdata('user_type')!='' && $this->session->userdata('user_type')=='admin' || $this->session->userdata('user_type')=='user')
        {
            if($this->session->userdata('user_type')!='' && $this->session->userdata('user_type')=='admin'){
            $admin_data=array('user_id','user_type','login_time','first_name','last_name');
            }else if($this->session->userdata('user_type')!='' && $this->session->userdata('user_type')=='user') {
                 $admin_data=array('user_id','user_type','login_time','name');
            }
            $this->session->unset_userdata($admin_data);
            redirect(base_url().'admin'); 
        }
        else
        {
            redirect(base_url().'admin');
        }
    }   

    public function dashboard()
    {  
        if($this->session->userdata('user_type')!='' && $this->session->userdata('user_type')=='admin' || $this->session->userdata('user_type')=='user')
        { 
            // $data['downloadCounts'] = $this->common->numberofrecord("d_id","tbl_downloads"," WHERE status='1'");
            $data['applicationCounts'] = $this->common->numberofrecord("t_id","tbl_application"," WHERE status='1' AND delete_status = '0'");
            $data['seriesCounts'] = $this->common->numberofrecord("ps_id","tbl_product_series"," WHERE status='1' AND delete_status = '0'");
            $data['productCounts'] = $this->common->numberofrecord("p_id","tbl_product"," WHERE status='1' AND delete_status = '0'");
            $data['eventCounts'] = $this->common->numberofrecord("e_id","tbl_event"," WHERE status='1'");
            $data['leadsCounts'] = $this->common->numberofrecord("l_id","tbl_leads","");
            $data['quoteRequestCounts'] = $this->common->numberofrecord("id","tbl_quotation","");

            $data['getLatestQuoteRequest'] = $this->common->fetchdata("*","tbl_quotation"," WHERE id !='' ORDER BY id DESC LIMIT 5");

            $data['title']='Dashboard';
            $data['middle_content']="auth/dashboard";

            // $this->load->view('admin/sidebar');
            $this->load->view('admin/admin-template',$data);
        }
        else
        {
           redirect(base_url().'admin'); 
        }
    }

    /*ajax function for city and state in registration form*/
    public function state()
    {
        $id=$_POST['id'];
        $states=$this->common->fetchdata("*","states"," WHERE country_id=".$id);
        $record='<option value="">Select State</option>';
        foreach ($states as $state) {
            $record.='<option value="'.$state['name'].'">'.$state['name'].'</option>';
        }
        echo $record;
    }
    
    public function update_profile()
    {
        if($this->session->userdata('user_type')!='' && $this->session->userdata('user_type')=='admin' || $this->session->userdata('user_type')=='user')
        {
            if(!empty($_POST['btn_update_user']))
            {
                // print_r($_POST);exit();
                $this->form_validation->set_rules('first_name','First name','required|trim');
                $this->form_validation->set_rules('last_name','Last name','required|trim');               
                $this->form_validation->set_rules('email','Email','required|valid_email|trim');

                if($this->form_validation->run())
                {
                    $first_name=$this->input->post('first_name',true);
                    $last_name=$this->input->post('last_name',true);
                    $email=$this->input->post('email',true);                  
                   
                    if($_FILES['profile']['name']!="")
                    {
                        $config = array('allowed_types'=>'jpg|jpeg|png|gif',
                                'file_name'=>time().'_'.$_FILES['profile']['name'],
                                'upload_path'=>'uploads/user/');
                                $this->upload->initialize($config);
                        if($this->upload->do_upload('profile'))
                        {
                            $up_data     = $this->upload->data();   
                            $profile_img = $up_data['file_name'];
                            $this->common->create_thumb('uploads/user/'.$profile_img,'uploads/user/thumb/'.$profile_img,'250','250'); 
                        }
                    }
                    if(!empty($_POST['password']))
                    {
                        $password=md5($this->input->post('password',true));
                    }
                        if($this->session->userdata('user_type')=="admin")
                        {
                            
                            if(!empty($_POST['password']))
                            {
                                $add_data=array('first_name'=>$first_name,'last_name'=>$last_name,'user_name'=>$email,'password'=>$password,'last_login'=>date('Y-m-d H:i:s'));
                                $add_update=array('name'=>$first_name);
                            }
                            else if(!empty($profile_img))
                            {
                                $add_data=array('first_name'=>$first_name,'last_name'=>$last_name,'user_name'=>$email,'last_login'=>date('Y-m-d H:i:s'),'profile_image'=>$profile_img); 
                                $add_update=array('name'=>$first_name,'filename'=>'logo.png');
                            }
                            else
                            {
                                $add_data=array('first_name'=>$first_name,'last_name'=>$last_name,'user_name'=>$email,'last_login'=>date('Y-m-d H:i:s')); 
                                $add_update=array('name'=>$first_name);
                            }

                            if($this->common->db_update('admin',$add_data,'id',$this->session->userdata('user_id')))
                            {
                               // echo $this->db->last_query();exit;
                               // $this->common->db_update('lh_users',$add_update,'id','1');
                                $this->session->set_flashdata('success','Profile updated successfully!');
                                redirect(base_url().'admin/update_profile'); 
                            }
                        }
                        else
                        {
                            if($_POST['password']!='')
                            {
                                $add_data=array('first_name'=>$first_name,'last_name'=>$last_name,'user_name'=>$email,'password'=>$password,'last_login'=>date('Y-m-d H:i:s'));
                                $add_update=array('name'=>$first_name);
                            }
                             else if($profile_img!="")
                            {
                                $add_data=array('first_name'=>$first_name,'last_name'=>$last_name,'user_name'=>$email,'last_login'=>date('Y-m-d H:i:s'),'profile_image'=>$profile_img); 
                                 $add_update=array('name'=>$first_name,'filename'=>'profile.png');
                            }
                            else
                            {
                                $add_data=array('first_name'=>$first_name,'last_name'=>$last_name,'user_name'=>$email,'last_login'=>date('Y-m-d H:i:s')); 
                                $add_update=array('name'=>$first_name);
                            }

                            if($this->common->db_update('admin',$add_data,'id',$this->session->userdata('user_id')))
                            {
                                $this->session->set_flashdata('success','Profile updated successfully!');
                                redirect(base_url().'admin/update_profile'); 
                            }  
                        }                       
                  
                }
            }

            $data['user']=$this->common->fetchsingledata('*','admin',' WHERE id='.$this->session->userdata('user_id'));

            $data['title']='Update Admin';
            $data['middle_content']="auth/edit_profile";

            // $this->load->view('admin/sidebar');
            $this->load->view('admin/admin-template',$data);
           
        }
        else
        {
            redirect(base_url().'admin');
        }
    }

    public function contact_us()
    {
        if($this->session->userdata('user_type')!='' && $this->session->userdata('user_type')=='admin')
        {
            $data['contacts']=$this->common->fetchsingledata('*','tbl_contact_us',' WHERE id="1"');
            $data['other_contacts']=$this->common->fetchdata('*','tbl_contact_us',' WHERE address_type="Other"');
            if(!empty($_POST['btn_save_contact']))
            {
                $company_name   = $this->input->post('company_name',true);
                $address_title  = $this->input->post('address_title',true);
                $address        = $this->input->post('address',true);
                $embedded_url   = $this->input->post('embedded_url',true);
                $telephone      = $this->input->post('telephone',true);
                $person_name    = $this->input->post('person_name',true);
                $address_type   = $this->input->post('address_type',true);
                $phone          = $this->input->post('phone_number',true);
                $fax            = $this->input->post('fax',true);
                $email          = $this->input->post('email',true);

                $update_data    = array(
                    'address_type'  => 'Main',
                    'company_name'  => $company_name,
                    'address_title' => $address_title, 
                    'address'       => $address,
                    'embedded_url'  => $embedded_url,
                    'telephone'     => $telephone,
                    'person_name'   => $person_name,
                    'phone'         => $phone,
                    'fax'           => $fax,
                    'email'         => $email,    
                );

                if(!empty($_POST['main_edit_id'])){
                    $this->common->db_update('tbl_contact_us',$update_data,'id',$_POST['main_edit_id']);
                }else{
                    $this->common->db_add('tbl_contact_us',$update_data);
                }
                
                $this->session->set_flashdata('success','Contact Us information updated successfully!');
                redirect(base_url().'admin/contact_us');   
            }
            
            $data['title']='Update Contact';
            $data['middle_content']="settings/contact_settings";
            $this->load->view('admin/admin-template',$data);
        }
        else
        {
            redirect(base_url().'admin'); 
        }
    }  

    public function add_contact()
    {
        //other contact
        $this->common->check_auth();
        $data['title']='Add Contact';
        $data['middle_content']="settings/add_contact";

       if(!empty($_POST['btn_save_contact']))
        {
            $company_name   = $this->input->post('company_name',true);
            $address_title  = $this->input->post('address_title',true);
            $address        = $this->input->post('address',true);
            $embedded_url   = $this->input->post('embedded_url',true);
            $telephone      = $this->input->post('telephone',true);
            $person_name    = $this->input->post('person_name',true);
            $address_type   = $this->input->post('address_type',true);
            $phone          = $this->input->post('phone_number',true);
            $fax            = $this->input->post('fax',true);
            $email          = $this->input->post('email',true);

             $add_data    = array(
                'address_type'  => 'Other',
                'company_name'  => $company_name,
                'address_title' => $address_title, 
                'address'       => $address,
                'embedded_url'  => '',
                'telephone'     => $telephone,
                'person_name'   => $person_name,
                'phone'         => $phone,
                'fax'           => '',
                'email'         => $email,    
            );
            $this->common->db_add('tbl_contact_us',$add_data);
            $this->session->set_flashdata('success','Contact Us information updated successfully!');
            redirect(base_url().'admin/contact_us');   
        }

        $this->load->view('admin/admin-template',$data);
    }

    public function edit_other_contact($id=0)
    {
        //other contact
        $this->common->check_auth();
        $id=base64_decode($id);
        $data['title']='edit Contact';
        $data['middle_content']="settings/edit_contact";

        $data['contacts']=$this->common->fetchsingledata('*','tbl_contact_us',' WHERE id= "'.$id.'"');

       if(!empty($_POST['btn_save_contact']))
        {
            $company_name   = $this->input->post('company_name',true);
            $address_title  = $this->input->post('address_title',true);
            $address        = $this->input->post('address',true);
            $embedded_url   = '';
            $telephone      = $this->input->post('telephone',true);
            $person_name    = $this->input->post('person_name',true);
            $address_type   = $this->input->post('address_type',true);
            $phone          = $this->input->post('phone_number',true);
            $fax            = '';
            $email          = $this->input->post('email',true);

             $update_data    = array(
                'address_type'  => 'Other',
                'company_name'  => $company_name,
                'address_title' => $address_title, 
                'address'       => $address,
                'embedded_url'  => ' ',
                'telephone'     => $telephone,
                'person_name'   => $person_name,
                'phone'         => $phone,
                'fax'           => '',
                'email'         => $email,    
            );
            $this->common->db_update('tbl_contact_us',$update_data,'id',$id);
            $this->session->set_flashdata('success','Contact Us information updated successfully!');
            redirect(base_url().'admin/contact_us');   
        }

        $this->load->view('admin/admin-template',$data);
    }

    public function forgotpassword()
    {
        if(!empty($_POST['btn_forgot']))
        { 
            $this->form_validation->set_rules('email','Email','required|trim|valid_email');
            if($this->form_validation->run())
            {
                $email=$this->input->post('email');
                $check_email1=$this->common->fetchsingledata("*","admin"," WHERE user_name='".$email."' ");
                // $check_email2=$this->common->fetchsingledata("*","tbl_user_master"," WHERE user_name='".$email."' ");

                if($check_email1 != "")
                {
                    $user        = "admin";
                    $check_email = $check_email1;
                    $status      = $check_email1['status'];
                    $name_user   = $check_email1['first_name'];
                }
               
                if(!empty($check_email))
                {
                    if($check_email['status']=='1')
                    {
                        
                        $randcode= base64_encode(rand(111111,999999));
                        $add_term=array('email'=>$email,
                                        'randcode'=>$randcode,
                                        'user' =>$user);

                        $this->common->db_add('tbl_forgotpwd',$add_term);
                        $getsite=$this->common->fetchsingledata("*","tbl_website_setting"," WHERE wid=1");

                        $email_id=$getsite['webemail'];
                        $system_name = $getsite['title'];
                        // print_r($email_id);exit();
                        $user_email=$email;
                        $logo=base_url().'uploads/'.$getsite['logo'];
                        $str="";
                        $this->common->setting_smtp();
                        $activation_key=base64_encode($randcode);
                        $str=file_get_contents('email/forgot-password-mail.html');
                        $str=str_replace('@LOGO@',$logo,$str);
                        $str            = str_replace('@system_name@', $system_name, $str);
                        $str=str_replace('@DATE@',date('Y-m-d'),$str);
                        $str=str_replace('@NAME@','Hi '.$name_user,$str);
                        $str=str_replace('@LINK@','<br>Please <a href="'.base_url().'admin/update_password/'.$activation_key.'" target="_new" style="text-decoration:none;">click here</a> to change your account password.',$str);         
                        //echo $str;exit;
                        $this->email->set_newline("\r\n");
                        $this->email->from($email_id);
                        $this->email->to($email);
                        $this->email->subject('Forget Password');
                        $this->email->set_mailtype("html");
                        $this->email->message($str); 
                        $this->email->send();
                        $this->session->set_flashdata('success', 'Please check your email now to reset your password');
                        redirect(base_url().'admin/forgotpassword');
                    }
                    else
                    {
                        $this->session->set_flashdata('error', 'Your account is not validate yet, please validate your account.');
                        redirect(base_url().'admin/forgotpassword');
                    }
                }
                else
                {
                    $this->session->set_flashdata('error', 'Please register an account or check your email address again.');
                    redirect(base_url().'admin/forgotpassword');
                }
        
            }
        }    
        $this->load->view('admin/auth/forgotpassword');
    }

    public function update_password($forgot_text='')
    {
        
        if(!empty($_POST['reset']))
        {
            $forgot_text=$this->input->post('forgot_text');
            $this->form_validation->set_rules('password','Password','required|min_length[6]|trim|matches[confirmpassword]');
            $this->form_validation->set_rules('confirmpassword','Confirm password','required|min_length[6]|trim');
            if($this->form_validation->run())
            { 

                $code=$this->uri->segment(3);
                $password=md5($this->input->post('password'));
                $check=$this->common->fetchsingledata("*","tbl_forgotpwd"," WHERE randcode='".base64_decode($forgot_text)."'");
                $fp_date        = $check['date_time'];
                $current_time   = date('Y-m-d H:i:s');
                $start_date     = new DateTime($fp_date);
                $since_start    = $start_date->diff(new DateTime($current_time));
                $since_start_d  = $since_start->d;

                if(!empty($check))
                {
                    if($check['user'] == 'admin')
                    {
                        $table = 'admin';
                    }
                    else{
                        $table = 'tbl_user_master';
                    }

                    if ($since_start_d < 4) 
                    {

                        if(count($check)>1)
                        {
                            $fieldarray=array('password'=>$password);
                            if($this->common->db_update($table,$fieldarray,'user_name',$check['email']))
                            {
                                $this->session->set_flashdata('success', 'Password updated successfully.');
                                redirect(base_url().'admin'); 
                            }
                            
                        } else {
                        $this->session->set_flashdata('error', 'Something went Wrong! Please Try Again.');
                        redirect(base_url().'admin/update_password/'.$forgot_text);
                        }
                    }else{
                        
                        $this->session->set_flashdata('error', 'Token expire <a href="'.base_url().'admin/forgotpassword">click here</a> to generate new token.');
                        redirect(base_url().'admin/update_password/'.$forgot_text);

                    }
                }else{
                    $this->session->set_flashdata('error', 'No email exist');
                        redirect(base_url().'admin/update_password/'.$forgot_text);
                }
            }
        } 
        $this->load->view('admin/auth/resetpassword');
    }
    
    public function update_settings()
    {
        if($this->session->userdata('user_type')!='' && $this->session->userdata('user_type')=='admin')
        {
            if(!empty($_POST['btn_update']))
            {
                $this->form_validation->set_rules('title','title','required|trim');
                $this->form_validation->set_rules('webemail','webemail','required|trim|valid_email');
                $this->form_validation->set_rules('subemail','subemail','required|trim|valid_email');
                $this->form_validation->set_rules('seo_title','Seo Title','required|trim');
                $this->form_validation->set_rules('seo_keywords','Seo Keywords','required|trim');
                $this->form_validation->set_rules('seo_description','Seo Description','required|trim');
                if($this->form_validation->run())
                {
                    $title=$this->input->post('title',true);
                    $switch=$this->input->post('switch',true);
                    $scheduleswitch=$this->input->post('scheduleswitch',true);
                    // $timezone=$this->input->post('timezone',true);
                    $timezone = date('Y-m-d');
                    $webemail=$this->input->post('webemail',true);
                    $subemail=$this->input->post('subemail',true);
                    $seo_title=$this->input->post('seo_title',true);
                    $seo_keywords=$this->input->post('seo_keywords',true);
                    $seo_description=$this->input->post('seo_description',true);
                    $script=$this->input->post('script',true);
                    //$script=$_POST['script'];

                    if($switch=="")
                    {
                        $switch="off";
                    }

                    if($scheduleswitch=="")
                    {
                        $scheduleswitch="off";
                    }

                    $logo=$this->input->post('hidden_logo',true);;
                    $unload_logo=$logo;

                    if($_FILES['logo']['name'] !="")
                    {
                        $config = array();
                        $config['upload_path'] = 'uploads';
                        $config['allowed_types'] = 'gif|jpg|png|jpeg';
                        $config['max_size']      = '0';
                        $config['overwrite']     = TRUE;
                        $config['remove_spaces'] = TRUE;
                        

                        $this->load->library('upload', $config);
                        $this->upload->initialize($config);
                        if (!$this->upload->do_upload('logo'))
                        {
                            // case - failure
                            //echo $this->upload->display_errors();exit;
                            $this->session->set_flashdata('error' ,$this->upload->display_errors());
                            redirect(base_url().'admin/update_settings/');  
                        }
                        else
                        {
                            @unlink('uploads/'.$file);
                            $logo=$_FILES['logo']['name'];
                        }
                    }
                    
                    //echo $logo;exit;
                    if($_FILES['logo']['name'] !=""){
                        $add_data=array('title'=>$title,'logo'=>$logo,'webemail'=>$webemail,'subemail'=>$subemail,'status'=>$switch,'schedule_status'=>$scheduleswitch,'timezone'=>$timezone,'seo_title'=>$seo_title,'seo_keywords'=>$seo_keywords,'seo_description'=>$seo_description,'script'=>$script);
                    }
                    else
                    {
                        $add_data=array('title'=>$title,'webemail'=>$webemail,'subemail'=>$subemail,'status'=>$switch,'schedule_status'=>$scheduleswitch,'timezone'=>$timezone,'seo_title'=>$seo_title,'seo_keywords'=>$seo_keywords,'seo_description'=>$seo_description,'script'=>$script);    
                    }
                    
                    //print_r($add_data);exit;
                    if(!empty($_POST['editid']))
                    {
                        if($this->common->db_update('tbl_website_setting',$add_data,'wid',$_POST['editid']))
                        {
                            $this->session->set_flashdata('success','Website settings updated successfully!');
                            redirect(base_url().'admin/update_settings/');  
                        }
                        else
                        {
                            $this->session->set_flashdata('error','Error occured, please try again!');
                            redirect(base_url().'admin/update_settings/');
                        }

                    }else
                    {
                        if($this->common->db_add('tbl_website_setting',$add_data))
                        {
                            $this->session->set_flashdata('success','Website settings added successfully!');
                            redirect(base_url().'admin/update_settings/');  
                        }
                        else
                        {
                            $this->session->set_flashdata('error','Error occured, please try again!');
                            redirect(base_url().'admin/update_settings/');
                        }
                    }
                    
                    
                }
            }
            $data['setting']=$this->common->fetchsingledata('*','tbl_website_setting',' WHERE wid=1');
            $data['timezone']=$this->common->fetchdata('*','zone',''); 
            $data['title']='Website Settings';
            $data['middle_content']="settings/edit_settings";
            // $this->load->view('admin/sidebar');
            $this->load->view('admin/admin-template',$data);
        }
        else
        {
            redirect(base_url().'admin');
        }
    }

    public function update_email_settings()
    {
        if($this->session->userdata('user_type')!='' && $this->session->userdata('user_type')=='admin')
        {  
            if(!empty($_POST['btn_update_email_settings']))
            {
                $this->form_validation->set_rules('smtphost','SMTP host','required|trim');
                $this->form_validation->set_rules('smtpport','SMTP port','required|trim');
                $this->form_validation->set_rules('smtpuser','SMTP email','required|trim');
                $this->form_validation->set_rules('smtppass','SMTP password','required|trim');
                if($this->form_validation->run())
                {
                    $smtphost   = $this->input->post("smtphost");
                    $smtpport   = $this->input->post("smtpport");
                    $smtpuser   = $this->input->post("smtpuser");
                    $smtppass   = $this->input->post("smtppass");
                    $update_data = array(
                        'smtphost'  =>  $smtphost,
                        'smtpport'  =>  $smtpport,
                        'smtpuser'  =>  $smtpuser,
                        'smtppass'  =>  base64_encode($smtppass));
                    if($this->common->db_update("tbl_mailsetting",$update_data,'id','1')){
                    $this->session->set_flashdata('success','Email settings updated successfully!');
                    redirect(base_url().'admin/update_email_settings/');
                    }
                }
            }

            $data['mailsetting']=$this->common->fetchsingledata('*','tbl_mailsetting',' where id =1');    
            $data['title']='Email Settings';
            $data['middle_content']="settings/edit_email_settings";
            // $this->load->view('admin/sidebar');
            $this->load->view('admin/admin-template',$data);              
        } 
        else
        {
            redirect(base_url().'admin/index');
        }   
    }

    /*Layout module*/
    public function layout()
    {
        $data['title']='Layout';
        $data['middle_content']="layout";
        $this->load->view('admin/admin-template',$data);
    }
    /*End layout module*/

    public function social()
    {
        if($this->session->userdata('user_type')!='' && $this->session->userdata('user_type')=='admin')
        {  
            if(!empty($_POST['btn_add_social']))
            {
                $facebook=$this->input->post('facebook',true);
                //$twitter=$this->input->post('twitter',true);
                // $linkedin=$this->input->post('linkedin',true);
                $googleplus=$this->input->post('googleplus',true);
                $youtube=$this->input->post('youtube',true);

                $add_data=array('facebook'=>$facebook,'linkedin'=>$linkedin,'youtube'=>$youtube);

                if($this->common->db_update('social',$add_data,'user_id',$this->session->userdata('user_id')))
                {
                    $this->session->set_flashdata('success','Social data updated successfully');
                    redirect(base_url().'admin/social');
                }
                else
                {
                    $this->session->set_flashdata('error','Some error has been occured while updating data');
                    redirect(base_url().'admin/social');
                }
            }
            $data['social']=$this->common->fetchsingledata("*","social"," WHERE user_id='1' ");
            $data['title']='social';
            $data['middle_content']="settings/social_settings";
            $this->load->view('admin/admin-template',$data);
        }
        else
        {
           redirect(base_url().'admin'); 
        }
    }    

    public function old_password()
    {
       if($this->session->userdata('user_type')!='' && $this->session->userdata('user_type')=='admin')
        {
            $current_password= $_POST['oldpassword'];
            $data= $this->common->fetchsingledata('*','admin',' WHERE password="'.md5($current_password).'"');
            if(!empty($data))
            {
               echo "success";
            }
            else
            {
                echo "error";
            }
           
        } 
        else
        {
            redirect(base_url().'admin');
        } 
    }

    public function media_settings()
    {
        if($this->session->userdata('user_type')!='' && $this->session->userdata('user_type')=='admin')
        {
            if(!empty($_POST['btn_update']))
            {
                $this->common->setValueStore('tech_thumb_width', $_POST['tech_thumb_width']);
                $this->common->setValueStore('tech_thumb_height', $_POST['tech_thumb_height']);
                $this->common->setValueStore('tech_large_width', $_POST['tech_large_width']);
                $this->common->setValueStore('tech_large_height', $_POST['tech_large_height']);
                // $this->common->setValueStore('cat_thumb_width', $_POST['cat_thumb_width']);
                // $this->common->setValueStore('cat_thumb_height', $_POST['cat_thumb_height']);
                // $this->common->setValueStore('cat_large_width', $_POST['cat_large_width']);
                // $this->common->setValueStore('cat_large_height', $_POST['cat_large_height']);
                // $this->common->setValueStore('work_thumb_width', $_POST['work_thumb_width']);
                // $this->common->setValueStore('work_thumb_height', $_POST['work_thumb_height']);
                // $this->common->setValueStore('work_large_width', $_POST['work_large_width']);
                // $this->common->setValueStore('work_large_height', $_POST['work_large_height']);
                $this->common->setValueStore('series_thumb_width', $_POST['series_thumb_width']);
                $this->common->setValueStore('series_thumb_height', $_POST['series_thumb_height']);
                $this->common->setValueStore('series_large_width', $_POST['series_large_width']);
                $this->common->setValueStore('series_large_height', $_POST['series_large_height']);
                // $this->common->setValueStore('brand_thumb_width', $_POST['brand_thumb_width']);
                // $this->common->setValueStore('brand_thumb_height', $_POST['brand_thumb_height']);
                // $this->common->setValueStore('brand_large_width', $_POST['brand_large_width']);
                // $this->common->setValueStore('brand_large_height', $_POST['brand_large_height']);
                $this->common->setValueStore('prod_thumb_width', $_POST['prod_thumb_width']);
                $this->common->setValueStore('prod_thumb_height', $_POST['prod_thumb_height']);
                $this->common->setValueStore('prod_large_width', $_POST['prod_large_width']);
                $this->common->setValueStore('prod_large_height', $_POST['prod_large_height']);
                $this->common->setValueStore('size_thumb_width', $_POST['size_thumb_width']);
                $this->common->setValueStore('size_thumb_height', $_POST['size_thumb_height']);
                $this->common->setValueStore('size_large_width', $_POST['size_large_width']);
                $this->common->setValueStore('size_large_height', $_POST['size_large_height']);
                $this->common->setValueStore('news_thumb_width', $_POST['news_thumb_width']);
                $this->common->setValueStore('news_thumb_height', $_POST['news_thumb_height']);
                $this->common->setValueStore('news_large_width', $_POST['news_large_width']);
                $this->common->setValueStore('news_large_height', $_POST['news_large_height']);

                $this->session->set_flashdata('success','Media settings updated successfully');
                redirect(base_url().'admin/media_settings');
            }
            $data['timezone']=$this->common->fetchdata('*','zone',''); 
            $data['title']='Media Settings';
            $data['middle_content']="settings/media_settings";
            $this->load->view('admin/admin-template',$data);
        }
        else
        {
            redirect(base_url().'admin');
        }
    }

    public function delete_other_contact($id="")
    {   
        if($this->common->db_delete('tbl_contact_us','id',base64_decode($id)))
        {
            $this->session->set_flashdata('success','Address Deleted Successfully');
            redirect('admin/contact_us'); 
        }
        else
        {
            $this->session->set_flashdata('error','Try again');
            redirect('admin/contact_us'); 
        }

    }
    
}