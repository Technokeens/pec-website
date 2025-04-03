<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ManageApplication extends CI_Controller 
{   
    public function __construct()
    {
        parent::__construct();
        $this->load->model('common');
        $this->load->model('applicationModel');
        $this->load->library('form_validation');
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

   
    /*Product module*/
    public function add_application()
    {
        $this->common->check_auth();
        if(!empty($_POST['btn_add_product']))
        {
            // echo "<pre>";
            // print_r($_POST['brand_id']);
            // print_r($_FILES);
            // exit();
            $this->form_validation->set_rules('title','title','required');
            $this->form_validation->set_rules('description','description','required');
            $this->form_validation->set_rules('short_description','short_description','required');
            $this->form_validation->set_rules('meta_title','meta_title','required');
            $this->form_validation->set_rules('meta_description','meta_description','required');
            $this->form_validation->set_rules('meta_keyword','meta_keyword','required');
            $checkRecord  = $this->common->numberofrecord("t_id","tbl_application"," WHERE status='1' AND title='".$this->input->post('title')."'");

            if($checkRecord == 0)
            {
                if($this->form_validation->run())
                {
                    $title              = $this->input->post('title',true);
                    $description        = $this->input->post('description',true);
                    $position           = $this->input->post('position',true);
                    $short_description  = $this->input->post('short_description',true);
                    $meta_keyword       = $this->input->post('meta_keyword',true);
                    $meta_description   = $this->input->post('meta_description',true);
                    $meta_title         = $this->input->post('meta_title',true);
                    $slug               = ""; 
                    $show_as_home =$this->input->post('show_as_home',true);

                    $application_image_alt = (!empty($_POST['application_image_alt'])) ? $_POST['application_image_alt'] : '';
                    $application_icon_white_alt = (!empty($_POST['application_icon_white_alt'])) ? $_POST['application_icon_white_alt'] : '';
                    $banner_image_alt = (!empty($_POST['banner_image_alt'])) ? $_POST['banner_image_alt'] : '';


                    if(empty($show_as_home))
                    {
                        $show_as_home="off";
                    }   
                    $add_data=array(
                                    'title'                 => $title,
                                    'description'           => $description,
                                    'position'              => $position,
                                    'show_as_home'          => $show_as_home,
                                    'short_description'     => $short_description,
                                    'seo_keywords'          => $meta_keyword,
                                    'seo_description'       => $meta_description,
                                    'seo_title'             => $meta_title,
                                    'application_image_alt'      => $application_image_alt,
                                    'application_icon_white_alt' => $application_icon_white_alt,
                                    'banner_image_alt'          => $banner_image_alt,
                                    'created_on'            => date("Y-m-d H:i:s"),
                                    'status'                => '1',
                                    'slug'                  => $slug
                                );
                    //echo "<pre>";print_r($add_data);exit();
                    if($this->common->db_add('tbl_application',$add_data))
                    {
                        $id=$this->db->insert_id(); 
                        $slug = $this->common->create_seo($_POST['title'],$id);
                        $update_array = array('slug' => $slug);
                        $this->common->db_update('tbl_application',$update_array,'t_id',$id);

                        $application_image="";                        
                        if($_FILES['application_image']['name']!= '')
                        {   
                            $config = array('allowed_types'=>'jpg|jpeg|png|gif',
                            'file_name'=>time().'_'.$_FILES['application_image']['name'],
                            'upload_path'=>'uploads/application/');
                            $this->upload->initialize($config);
                            if($this->upload->do_upload('application_image'))
                            {
                                $up_data = $this->upload->data();   
                                $application_image = $up_data['file_name'];
                                $update_data=array('application_image'=>$application_image);  
                                $imagedata = getimagesize('uploads/application/'.$application_image);

                                $tech_thumb_width  = $this->common->getValueStore('tech_thumb_width');
                                $tech_thumb_height = $this->common->getValueStore('tech_thumb_height');
                                $tech_large_width  = $this->common->getValueStore('tech_large_width');
                                $tech_large_height = $this->common->getValueStore('tech_large_height');
                                
                                $this->common->create_thumb('uploads/application/'.$application_image,'uploads/application/thumb/'.$application_image,$tech_thumb_width,$tech_thumb_height); 
                                $this->common->create_thumb('uploads/application/'.$application_image,'uploads/application/large/'.$application_image,$tech_large_width,$tech_large_height);

                                $img=$this->common->db_update('tbl_application',$update_data,'t_id',$id);
                                                            
                            }
                            else
                            {
                                $this->session->set_flashdata('error','You can upload only jpg/jpeg/png image');
                                redirect(base_url().'admin/add-application');                                  
                            }
                        }

                        /*application white icon*/
                        $application_icon_white="";                        
                        if($_FILES['application_icon_white']['name']!= '')
                        {   
                            $config = array('allowed_types'=>'jpg|jpeg|png|gif',
                            'file_name'=>time().'_'.$_FILES['application_icon_white']['name'],
                            'upload_path'=>'uploads/application/white/');
                            $this->upload->initialize($config);
                            if($this->upload->do_upload('application_icon_white'))
                            {
                                $up_data = $this->upload->data();   
                                $application_icon_white = $up_data['file_name'];
                                $update_data=array('application_icon_white'=>$application_icon_white);  
                                $imagedata = getimagesize('uploads/application/white/'.$application_icon_white);

                                $tech_thumb_width  = $this->common->getValueStore('tech_thumb_width');
                                $tech_thumb_height = $this->common->getValueStore('tech_thumb_height');
                                $tech_large_width  = $this->common->getValueStore('tech_large_width');
                                $tech_large_height = $this->common->getValueStore('tech_large_height');
                                
                                $this->common->create_thumb('uploads/application/white/'.$application_icon_white,'uploads/application/white/thumb/'.$application_icon_white,$tech_thumb_width,$tech_thumb_height); 
                                $this->common->create_thumb('uploads/application/white/'.$application_icon_white,'uploads/application/white/large/'.$application_icon_white,$tech_large_width,$tech_large_height);

                                $img=$this->common->db_update('tbl_application',$update_data,'t_id',$id);
                                                            
                            }
                            else
                            {
                                $this->session->set_flashdata('error','You can upload only jpg/jpeg/png image');
                                redirect(base_url().'admin/add-application');                                  
                            }
                        }
                        /*application white icon end*/


                        if($_FILES['banner_image']['name']!= '')
                        { 
                            $upath = '.' . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . 'application_banner' . DIRECTORY_SEPARATOR ;
                            $upath_thumb = '.' . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . 'application_banner' . DIRECTORY_SEPARATOR . 'thumb'. DIRECTORY_SEPARATOR ;
                            $upath_large = '.' . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . 'application_banner' . DIRECTORY_SEPARATOR . 'large'. DIRECTORY_SEPARATOR ;

                            if (!file_exists($upath))
                            @mkdir($upath, 0777);
                            if (!file_exists($upath_thumb))
                            @mkdir($upath_thumb, 0777);
                            if (!file_exists($upath_large))
                            @mkdir($upath_large, 0777);


                            $config = array('allowed_types'=>'jpg|jpeg|png|gif',
                            'file_name'=>time(),
                            'upload_path'=>'uploads/application_banner/');                         
                            $this->upload->initialize($config);
                            if($this->upload->do_upload('banner_image'))
                            {                               
                                $up_data = $this->upload->data();   
                                $banner_image = $up_data['file_name'];
                                $update_data1=array('banner_image'=>$banner_image); 
                                $imagedata = getimagesize('uploads/application_banner/'.$banner_image);
                                
                                $this->common->create_thumb('uploads/application_banner/'.$banner_image,'uploads/application_banner/thumb/'.$banner_image,80,50); 
                                 $this->common->create_thumb('uploads/application_banner/'.$banner_image,'uploads/application_banner/large/'.$banner_image,1350,400); 
                          
                                $this->common->db_update('tbl_application',$update_data1,'t_id',$id);
                            }
                            else
                            {
                                $this->session->set_flashdata('error','You can upload only jpg/jpeg/png image');
                                redirect(base_url().'technology/edit_technology/'.base64_encode($id));                                 
                            }
                        }

                        $this->session->set_flashdata('success','Application added successfully');  
                        redirect(base_url().'admin/manage-application');
                    }
                    else
                    {
                        $this->session->set_flashdata('error','failed to add technology');  
                        redirect(base_url().'admin/add-application');
                    }
                }
            }
            else
            {
                $this->session->set_flashdata('error','Application name already exists');  
                redirect(base_url().'admin/add-application'); 
            }
        }
        else
        {
            // $data['brands'] = $this->common->fetchdata("b_id,brand_name","tbl_brand"," WHERE status='1'");
            $data['title']='Add Application';
            $data['middle_content']="application/add_application";
            $this->load->view('admin/admin-template',$data);
        }
        
    }

    public function manage_application()
    {   
        $this->common->check_auth(); 
        $data['application']=$this->common->fetchdata('*','tbl_application',' WHERE delete_status="0"',' ORDER BY position ASC');
        $data['title']='Manage Technology';
        $data['middle_content']="application/manage_application";
        $this->load->view('admin/admin-template',$data);
        
    }

    public function application_list()
    {
        $this->common->check_auth();
        $sr_no              = "";
        $title              = "";
        $description        = "";
        $position           = "";
        $status             = "";
        $action             = "";
        $edit               = "";        
        $delete             = "";

        $data = array();
        $draw               = $_POST['draw'];
        $row                = $_POST['start'];
        $rowperpage         = $_POST['length']; // Rows display per testimonial
        $columnIndex        = $_POST['order'][0]['column']; // Column index
        $columnName         = $_POST['columns'][$columnIndex]['data']; // Column name
        $columnSortOrder    = $_POST['order'][0]['dir']; // asc or desc
        $searchValue        = $_POST['search']['value']; // Search value
        // $fList = $this->common->fetchdata('*', 'tbl_application','WHERE delete_status="0"');
        $fList = $this->applicationModel->get_application_list($_POST);
        $totalRecordwithFilter = $this->applicationModel->get_application_list_count($_POST);
        $totalRecords          = $totalRecordwithFilter;

        if (!empty($fList))
        {
            $j=1;
            foreach ($fList as $val)
            {  
                $sr_no                      = $j;
                $title                      = (!empty($val['title'])) ? ucfirst($val['title']) : ''; 
                $description                = (!empty($val['short_description'])) ? substr($val['short_description'],0,50).'...' : ''; 
                $position                   = (!empty($val['position'])) ? $val['position'] : '';

                if($val['status'] == 0)
                {     
                   $status = '<a class="btn btn-sm show-tooltip" href="'.base_url() .'manageApplication/change_status/1/' . base64_encode($val['t_id']).'" title="Unlock"><i class="fa fa-lock fa-2x"></i></a>';
                }
                else
                {
                    $status = '<a class="btn btn-sm show-tooltip" href="'.base_url() . 'manageApplication/change_status/0/' .base64_encode($val['t_id']).'" title="Lock"> <i class="fa fa-unlock fa-2x"></i></a>';
                }
                if($val['application_image']!="")
                {
                    $image = '<img src="'.base_url().'uploads/application/'.$val['application_image'].'" style="height:50px;">';
                }else{
                    $image = 'NA';
                }


                $edit = '<a class="btn btn-sm btn-info show-tooltip" href="'.base_url().'admin/edit-application/'.base64_encode($val['t_id']).'" title="Edit"> Edit</a>';
                $delete = '<a class="btn btn-sm btn-danger show-tooltip" href="'.base_url().'manageApplication/delete_application/'.base64_encode($val['t_id']).'" title="Delete" onclick="return confirm(\'Are you sure, you want to delete this application?\');">Delete</a>';

                $action='<td>
                            '.$edit.'
                            '.$delete.'
                        </td>';

                $j++;   
                $data[] = array(
                    'sr_no'                 => $sr_no,
                    'title'                 => $title,
                    'description'           => $description, 
                    'image'                 => $image,
                    'status'                => $status,
                    'action'                => $action
                );             
            }
        } 

        $response = array(
              "recordsTotal"        => $totalRecords,
              "recordsFiltered"     => $totalRecordwithFilter,
              "data"                => $data
        );
        echo json_encode($response); 
    }

    public function manage_archive_application()
    {   
        $this->common->check_auth();  
        $data['title']='Manage Archive Application';
        $data['middle_content']="application/manage_archive_application";
        $this->load->view('admin/admin-template',$data);
    }

    public function application_archive_list()
    {
        $this->common->check_auth();
        $sr_no              = "";
        $title              = "";
        $description        = "";
        $position           = "";
        $status             = "";
        $action             = "";
        $edit               = "";        
        $delete             = "";

        $data = array();
        $draw               = $_POST['draw'];
        $row                = $_POST['start'];
        $rowperpage         = $_POST['length']; // Rows display per testimonial
        $columnIndex        = $_POST['order'][0]['column']; // Column index
        $columnName         = $_POST['columns'][$columnIndex]['data']; // Column name
        $columnSortOrder    = $_POST['order'][0]['dir']; // asc or desc
        $searchValue        = $_POST['search']['value']; // Search value
        // $fList = $this->common->fetchdata('*', 'tbl_application','WHERE delete_status="0"');
        $fList = $this->applicationModel->get_archive_application_list($_POST);
        $totalRecordwithFilter = $this->applicationModel->get_archive_application_list_count($_POST);
        $totalRecords          = $totalRecordwithFilter;

        if (!empty($fList))
        {
            $j=1;
            foreach ($fList as $val)
            {  
                $sr_no                      = $j;
                $title                      = (!empty($val['title'])) ? ucfirst($val['title']) : ''; 
                $description                = (!empty($val['short_description'])) ? substr($val['short_description'],0,50).'...' : ''; 

                if($val['application_image']!="")
                {
                    $image = '<img src="'.base_url().'uploads/application/'.$val['application_image'].'"  height="50">';
                }else{
                    $image = 'NA';
                }

                $edit = '<a class="btn btn-sm btn-success show-tooltip" href="'.base_url().'manageApplication/move_to_list/'.base64_encode($val['t_id']).'" title="Undo" onclick="return confirm(\'Are you sure, you want to undo this application?\');"> Undo</a>';

                $action='<td>
                            '.$edit.'
                        </td>';

                $j++;   
                $data[] = array(
                    'sr_no'                 => $sr_no,
                    'title'                 => $title,
                    'description'           => $description, 
                    'image'                 => $image,
                    'action'                => $action
                );             
            }
        } 

        $response = array(
              "recordsTotal"        => $totalRecords,
              "recordsFiltered"     => $totalRecordwithFilter,
              "data"                => $data
        );
        echo json_encode($response); 
    }

    public function edit_application($t_id=0)
    {       
        $this->common->check_auth();
        $t_id=base64_decode($t_id);
        if(!empty($_POST['btn_edit_product']))
        {
            $this->form_validation->set_rules('title','title','required');
            $this->form_validation->set_rules('description','description','required');
            $this->form_validation->set_rules('short_description','short_description','required');
            $this->form_validation->set_rules('meta_title','meta_title','required');
            $this->form_validation->set_rules('meta_description','meta_description','required');
            $this->form_validation->set_rules('meta_keyword','meta_keyword','required');
            $checkRecord  = $this->common->numberofrecord("t_id","tbl_application"," WHERE status='1' AND title='".$this->input->post('title')."' AND t_id!='".$t_id."'");

            if($checkRecord == 0)
            {
                if($this->form_validation->run())
                {
                    $title        = $this->input->post('title',true);
                    $description        = $this->input->post('description',true);
                    $short_description  = $this->input->post('short_description',true);
                    $meta_keyword       = $this->input->post('meta_keyword',true);
                    $meta_description   = $this->input->post('meta_description',true);
                    $meta_title         = $this->input->post('meta_title',true);
                    $slug               = $this->common->create_seo($title,$t_id); 
                    $position           = $this->input->post('position',true);
                    $hidden_appimage     = $this->input->post('hidden_img',true);
                    $hidden_banner      = $this->input->post('hidden_ban_img',true);
                    $show_as_home =$this->input->post('show_as_home',true);
                    if(empty($show_as_home))
                    {
                        $show_as_home="off";
                    } 

                    $application_image_alt = (!empty($_POST['application_image_alt'])) ? $_POST['application_image_alt'] : '';
                    $application_icon_white_alt = (!empty($_POST['application_icon_white_alt'])) ? $_POST['application_icon_white_alt'] : '';
                    $banner_image_alt = (!empty($_POST['banner_image_alt'])) ? $_POST['banner_image_alt'] : '';
                  
                    $add_data=array(
                                    'title'                 => $title,
                                    'description'           => $description,
                                    'position'              => $position,
                                    'show_as_home'          => $show_as_home,
                                    'short_description'     => $short_description,
                                    'application_image_alt'      => $application_image_alt,
                                    'application_icon_white_alt' => $application_icon_white_alt,
                                    'banner_image_alt'          => $banner_image_alt,
                                    'seo_keywords'          => $meta_keyword,
                                    'seo_description'       => $meta_description,
                                    'seo_title'             => $meta_title,
                                    'created_on'            => date("Y-m-d H:i:s"),
                                    'status'                => '1',
                                    'slug'                  => $slug
                                );

                    if($this->common->db_update('tbl_application',$add_data,'t_id',$t_id)) 
                    {
                        $application_image="";
                        if($_FILES['application_image']['name']!= '')
                        { 
                            $config = array('allowed_types'=>'jpg|jpeg|png|gif',
                            'file_name'=>time().'_'.$_FILES['application_image']['name'],
                            'upload_path'=>'uploads/application/');                         
                            $this->upload->initialize($config);
                            if($this->upload->do_upload('application_image'))
                            {                               
                                $up_data = $this->upload->data();   
                                $application_image = $up_data['file_name'];
                                $update_data=array('application_image'=>$application_image); 
                                $imagedata = getimagesize('uploads/application/'.$application_image);

                                $tech_thumb_width  = $this->common->getValueStore('tech_thumb_width');
                                $tech_thumb_height = $this->common->getValueStore('tech_thumb_height');
                                $tech_large_width  = $this->common->getValueStore('tech_large_width');
                                $tech_large_height = $this->common->getValueStore('tech_large_height');
                                
                                $this->common->create_thumb('uploads/application/'.$application_image,'uploads/application/thumb/'.$application_image,$tech_thumb_width,$tech_thumb_height); 
                                $this->common->create_thumb('uploads/application/'.$application_image,'uploads/application/large/'.$application_image,$tech_large_width,$tech_large_height); 

                                $img=$this->common->db_update('tbl_application',$update_data,'t_id',$t_id); 
                                if(!empty($img))
                                {
                                    @unlink('uploads/application/'.$hidden_appimage);
                                    @unlink('uploads/application/thumb/'.$hidden_appimage);
                                    @unlink('uploads/application/large/'.$hidden_appimage);
                                }
                            }
                            else
                            {
                                $this->session->set_flashdata('error','You can upload only jpg/jpeg/png image');
                                redirect(base_url().'admin/edit-application/'.base64_encode($t_id));                                 
                            }
                        }

                        /*application white icon*/
                        $application_icon_white="";
                        if($_FILES['application_icon_white']['name']!= '')
                        { 
                            $config = array('allowed_types'=>'jpg|jpeg|png|gif',
                            'file_name'=>time().'_'.$_FILES['application_icon_white']['name'],
                            'upload_path'=>'uploads/application/white/');                         
                            $this->upload->initialize($config);
                            if($this->upload->do_upload('application_icon_white'))
                            {                               
                                $up_data = $this->upload->data();   
                                $application_icon_white = $up_data['file_name'];
                                $update_data=array('application_icon_white'=>$application_icon_white); 
                                $imagedata = getimagesize('uploads/application/white/'.$application_icon_white);

                                $tech_thumb_width  = $this->common->getValueStore('tech_thumb_width');
                                $tech_thumb_height = $this->common->getValueStore('tech_thumb_height');
                                $tech_large_width  = $this->common->getValueStore('tech_large_width');
                                $tech_large_height = $this->common->getValueStore('tech_large_height');
                                
                                $this->common->create_thumb('uploads/application/white/'.$application_icon_white,'uploads/application/white/thumb/'.$application_icon_white,$tech_thumb_width,$tech_thumb_height); 
                                $this->common->create_thumb('uploads/application/white/'.$application_icon_white,'uploads/application/white/large/'.$application_icon_white,$tech_large_width,$tech_large_height); 

                                $img=$this->common->db_update('tbl_application',$update_data,'t_id',$t_id); 
                                if(!empty($img))
                                {
                                    @unlink('uploads/application/white/'.$hidden_appimage);
                                    @unlink('uploads/application/white/thumb/'.$hidden_appimage);
                                    @unlink('uploads/application/white/large/'.$hidden_appimage);
                                }
                            }
                            else
                            {
                                $this->session->set_flashdata('error','You can upload only jpg/jpeg/png image');
                                redirect(base_url().'admin/edit-application/'.base64_encode($t_id));                                 
                            }
                        }
                        /*application white icon end*/

                        if($_FILES['banner_image']['name']!= '')
                        { 
                            $config = array('allowed_types'=>'jpg|jpeg|png|gif',
                            'file_name'=>time(),
                            'upload_path'=>'uploads/application_banner/');                         
                            $this->upload->initialize($config);
                            if($this->upload->do_upload('banner_image'))
                            {                               
                                $up_data = $this->upload->data();   
                                $banner_image = $up_data['file_name'];
                                $update_data1=array('banner_image'=>$banner_image); 
                                $imagedata = getimagesize('uploads/application_banner/'.$banner_image);
                                
                                $this->common->create_thumb('uploads/application_banner/'.$banner_image,'uploads/application_banner/thumb/'.$banner_image,80,50); 
                                $this->common->create_thumb('uploads/application_banner/'.$banner_image,'uploads/application_banner/large/'.$banner_image,1350,400); 
                          
                                $img=$this->common->db_update('tbl_application',$update_data1,'t_id',$t_id); 
                                if(!empty($img))
                                {
                                    @unlink('uploads/application_banner/'.$hidden_banner);
                                    @unlink('uploads/application_banner/thumb/'.$hidden_banner);
                                    @unlink('uploads/application_banner/large/'.$hidden_banner);
                                }

                            }
                            else
                            {
                                $this->session->set_flashdata('error','You can upload only jpg/jpeg/png image');
                                redirect(base_url().'admin/edit-application/'.base64_encode($t_id));                                 
                            }
                        }
                    }
                    $this->session->set_flashdata('success','Data updated successfully');  
                    redirect(base_url().'admin/manage-application'); 
                } 
            }
            else               
            {
                $this->session->set_flashdata('error','Application name already exists');  
                redirect(base_url().'admin/edit-application/'.base64_encode($t_id)); 
            }
        }
        $data['detail']=$this->common->fetchsingledata('*','tbl_application',' WHERE t_id='.$t_id);

        $data['title']='Edit Application';
        $data['middle_content']="application/edit_application";
        $this->load->view('admin/admin-template',$data);
    }

    public function change_status($stat=0,$tech_id=0)
    {
        $status=$stat;
        $t_id=base64_decode($tech_id);
        $valid_page=$this->common->numberofrecord('*','tbl_application',' WHERE t_id='.$t_id);
        if($valid_page>0)
        {
            $update_stat=array('status'=>$status);
            if($this->common->db_update('tbl_application',$update_stat,'t_id',$t_id))
            {
                // $getCatgeory = $this->common->fetchdata("c_id,cat_type","tbl_category"," WHERE tech_id='".$t_id."'");
                // if(count($getCatgeory)>0)
                // {
                //     foreach ($getCatgeory as $cat) 
                //     {
                //         if($this->common->db_update('tbl_category',array('status'=>$status),'tech_id',$t_id)){
                //             $this->common->db_update('tbl_series',array('status'=>$status),'cat_id',$cat['c_id']);
                //             $this->common->db_update('tbl_model_size',array('status'=>$status),'cat_id',$cat['c_id']);
                //         }
                //     }
                // }
                // $this->common->db_update('tbl_product',array('status'=>$status),'tech_id',$t_id);
                // for work
                // $this->common->db_update('tbl_work',array('status'=>$status),'tech_id',$t_id);


                $this->session->set_flashdata('success','Status changed successfully!');
                redirect(base_url().'admin/manage-application');  
            }
        }
        else
        {
            $this->session->set_flashdata('error','Application does not exist!');
        }
    }

    public function delete_application($t_id=0)
    {
        $t_id=base64_decode($t_id);
        $valid_size=$this->common->fetchsingledata('*','tbl_application',' WHERE t_id='.$t_id);
        if(!empty($valid_size))
        {
            if($this->common->db_update('tbl_application',array('delete_status'=>'1'),'t_id',$t_id))
            {
               // $getCatgeory = $this->common->fetchdata("c_id,cat_type","tbl_category"," WHERE tech_id='".$t_id."'");
               //  if(count($getCatgeory)>0)
               //  {
               //      foreach ($getCatgeory as $cat) 
               //      {
               //          if($this->common->db_update('tbl_category',array('delete_status'=>'1'),'tech_id',$t_id)){
               //              $this->common->db_update('tbl_series',array('delete_status'=>'1'),'cat_id',$cat['c_id']);
               //              $this->common->db_update('tbl_model_size',array('delete_status'=>'1'),'cat_id',$cat['c_id']);
               //          }
               //      }
               //  }
               //  $this->common->db_update('tbl_product',array('delete_status'=>'1'),'tech_id',$t_id);
               //  // for work
               //  $this->common->db_update('tbl_work',array('delete_status'=>'1'),'tech_id',$t_id);

                $this->session->set_flashdata('success','Application deleted successfully!');
                redirect(base_url().'admin/manage-application');  
            }
        }
        else
        {
            $this->session->set_flashdata('error','Doesnot exist!');
        }
    }

    public function move_to_list($t_id=0)
    {
        $t_id=base64_decode($t_id);
        $valid_size=$this->common->fetchsingledata('*','tbl_application',' WHERE t_id='.$t_id);
        if(!empty($valid_size))
        {
            
            if($this->common->db_update('tbl_application',array('delete_status'=>'0'),'t_id',$t_id))
            {
               // $getCatgeory = $this->common->fetchdata("c_id,cat_type","tbl_category"," WHERE tech_id='".$t_id."'");
               //  if(count($getCatgeory)>0)
               //  {
               //      foreach ($getCatgeory as $cat) 
               //      {
               //          if($this->common->db_update('tbl_category',array('delete_status'=>'0'),'tech_id',$t_id)){
               //              $this->common->db_update('tbl_series',array('delete_status'=>'0'),'cat_id',$cat['c_id']);
               //              $this->common->db_update('tbl_model_size',array('delete_status'=>'0'),'cat_id',$cat['c_id']);
               //          }
               //      }
               //  }
               //  $this->common->db_update('tbl_product',array('delete_status'=>'0'),'tech_id',$t_id);
               //  // for work
               //  $this->common->db_update('tbl_work',array('delete_status'=>'0'),'tech_id',$t_id);

                $this->session->set_flashdata('success','Application undo successfully!');
                redirect(base_url().'admin/manage-archive-application');  
            }
        }
        else
        {
            $this->session->set_flashdata('error','Doesnot exist!');
        }
    }
}