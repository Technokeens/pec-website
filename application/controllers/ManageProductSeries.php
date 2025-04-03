<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ManageProductSeries extends CI_Controller 
{   
    public function __construct()
    {
        parent::__construct();
        $this->load->model('common');
        $this->load->model('productSeriesModel');
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
    public function add_product_series()
    {
        $this->common->check_auth();
        if(!empty($_POST['btn_add_product_series']))
        {
            // echo "<pre>";
            // print_r($_FILES);
            // exit();
            $this->form_validation->set_rules('title','title','required');
            $this->form_validation->set_rules('description','description','required');
            $this->form_validation->set_rules('short_description','short_description','required');
            $this->form_validation->set_rules('meta_title','meta_title','required');
            $this->form_validation->set_rules('meta_description','meta_description','required');
            $this->form_validation->set_rules('meta_keyword','meta_keyword','required');
            $checkRecord  = $this->common->numberofrecord("ps_id","tbl_product_series"," WHERE status='1' AND title='".$this->input->post('title')."'");

            if($checkRecord == 0)
            {
                if($this->form_validation->run())
                {
                    $construction_id = '';
                    if(!empty($_POST['construction_id'])){
                        $construction_id = implode(',', $_POST['construction_id']);
                    }
                    
                    $title              = $this->input->post('title',true);
                    // $construction_id    = $this->input->post('construction_id',true);
                    $description        = $this->input->post('description',true);
                    $position           = $this->input->post('position',true);
                    $short_description  = $this->input->post('short_description',true);
                    $meta_keyword       = $this->input->post('meta_keyword',true);
                    $meta_description   = $this->input->post('meta_description',true);
                    $meta_title         = $this->input->post('meta_title',true);
                    $slug               = "";  
                    $show_as_featured =$this->input->post('show_as_featured',true);
                    if(empty($show_as_featured))
                    {
                        $show_as_featured="off";
                    } 

                    $series_image_alt = (!empty($_POST['series_image_alt'])) ? $_POST['series_image_alt'] : '';

                    $add_data=array(
                                    'title'                 => $title,
                                    'construction_id'       => $construction_id,
                                    'description'           => $description,
                                    'position'              => $position,
                                    'short_description'     => $short_description,
                                    'show_as_featured'      => $show_as_featured,
                                    'series_image_alt'      => $series_image_alt,
                                    'seo_keywords'          => $meta_keyword,
                                    'seo_description'       => $meta_description,
                                    'seo_title'             => $meta_title,
                                    'created_on'            => date("Y-m-d H:i:s"),
                                    'status'                => '1',
                                    'slug'                  => $slug
                                );
                    //echo "<pre>";print_r($add_data);exit();
                    if($this->common->db_add('tbl_product_series',$add_data))
                    {
                        $id=$this->db->insert_id(); 
                        $slug = $this->common->create_seo($_POST['title'],$id);
                        $update_array = array('slug' => $slug);
                        $this->common->db_update('tbl_product_series',$update_array,'ps_id',$id);

                        $series_image="";                        
                        if($_FILES['series_image']['name']!= '')
                        {   
                            $upath = '.' . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . 'series' . DIRECTORY_SEPARATOR ;
                            if (!file_exists($upath))
                                @mkdir($upath, 0777);

                            $config = array('allowed_types'=>'jpg|jpeg|png|gif',
                            'file_name'=>time().'_'.$_FILES['series_image']['name'],
                            'upload_path'=>'uploads/series/');
                            $this->upload->initialize($config);
                            if($this->upload->do_upload('series_image'))
                            {
                                
                                $upath_thumb = '.' . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . 'series' . DIRECTORY_SEPARATOR . 'thumb'. DIRECTORY_SEPARATOR ;
                                $upath_large = '.' . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . 'series' . DIRECTORY_SEPARATOR . 'large'. DIRECTORY_SEPARATOR ;

                                if (!file_exists($upath_thumb))
                                @mkdir($upath_thumb, 0777);
                                if (!file_exists($upath_large))
                                @mkdir($upath_large, 0777);


                                $up_data = $this->upload->data();   
                                $series_image = $up_data['file_name'];
                                $update_data=array('series_image'=>$series_image);  
                                $imagedata = getimagesize('uploads/series/'.$series_image);

                                $series_thumb_width  = $this->common->getValueStore('series_thumb_width');
                                $series_thumb_height = $this->common->getValueStore('series_thumb_height');
                                $series_large_width  = $this->common->getValueStore('series_large_width');
                                $series_large_height = $this->common->getValueStore('series_large_height');
                                
                                $this->common->create_thumb($upath.$series_image,$upath_thumb.$series_image,$series_thumb_width,$series_thumb_height); 
                                $this->common->create_thumb($upath.$series_image,$upath_large.$series_image,$series_large_width,$series_large_height);

                                $img=$this->common->db_update('tbl_product_series',$update_data,'ps_id',$id);
                                                            
                            }
                            else
                            {
                                $this->session->set_flashdata('error','You can upload only jpg/jpeg/png image');
                                redirect(base_url().'admin/add-product-series');                                  
                            }
                        }

                        /*PRODUCT DOCUMENT*/
                        $doc_folder = $id.'-'.time();
                        $output_dir = 'uploads/series_pdf/'. $doc_folder . '/';
                        // folder name in Product_document field
                        $this->common->db_update('tbl_product_series',array('file_folder'=>$doc_folder),'ps_id',$id);

                            if (!file_exists($output_dir))
                                @mkdir($output_dir, 0777);
                   
                                $count = count($_FILES['files']['name']);
        
                                for($i=0;$i<$count;$i++){
                            
                                if(!empty($_FILES['files']['name'][$i])){
                            
                                  $_FILES['file']['name'] = $_FILES['files']['name'][$i];
                                  $_FILES['file']['type'] = $_FILES['files']['type'][$i];
                                  $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
                                  $_FILES['file']['error'] = $_FILES['files']['error'][$i];
                                  $_FILES['file']['size'] = $_FILES['files']['size'][$i];
                          
                                  $config['upload_path'] = $output_dir; 
                                  $config['allowed_types'] = 'pdf';
                                  
                                  $config['file_name'] = $_FILES['files']['name'][$i];
                           
                                  $this->load->library('upload',$config); 
                                 $this->upload->initialize($config);


                                  if($this->upload->do_upload('file')){
                                        $uploadData = $this->upload->data();
                                        $filename = $uploadData['file_name'];
                                            
                                        $docArray = array(
                                                            'series_id'          => $id,
                                                            'folder'        => $doc_folder,
                                                            'pdf_detail'    => $_POST['doc_details'][$i],
                                                            'pdf_file'      => $filename
                                                        );
                                            $this->common->db_add("tbl_product_documents",$docArray);
                                        }
                                        else
                                        {
                                            $this->session->set_flashdata('error',$this->upload->display_errors());  
                                            redirect(base_url().'admin/edit-product-series/'.base64_encode($id));    
                                        }
                                }
                            }   

                        $this->session->set_flashdata('success','Product series added successfully');  
                        redirect(base_url().'admin/manage-product-series');
                    }
                    else
                    {
                        $this->session->set_flashdata('error','Failed to add series');  
                        redirect(base_url().'admin/add-product-series');
                    }
                }
            }
            else
            {
                $this->session->set_flashdata('error','Product series name already exists');  
                redirect(base_url().'admin/add-product-series'); 
            }
        }
        else
        {
            $data['construction'] = $this->common->fetchdata("c_id,construction_title","tbl_construction"," WHERE status='1' AND delete_status='0'");
            $data['title']='Add Series';
            $data['middle_content']="product_series/add_product_series";
            $this->load->view('admin/admin-template',$data);
        }
        
    }

    public function remove_document()
    {
        if(isset($_POST['pdf_id']))
        {
            $pdf_id = $_POST['pdf_id'];
            if($this->common->db_delete("tbl_product_documents",'pdf_id',$pdf_id)){
                $message1 = array(
                        'code'=> 'success',
                        'msg' => 'Document deleted'
                    );
                echo json_encode($message1);
            }
            else
            {
                $message1 = array(
                        'code'=> 'error',
                        'msg' => 'We are facing some internal server issue, Try again later'
                    );
                echo json_encode($message1);
            }
        }
    }

    public function manage_product_series()
    {   
        $this->common->check_auth(); 
        $data['title']='Manage Series';
        $data['middle_content']="product_series/manage_product_series";
        $this->load->view('admin/admin-template',$data);
        
    }

    public function product_series_list()
    {
        $this->common->check_auth();
        $sr_no              = "";
        $title              = "";
        $construction_title = "";
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
        // $fList = $this->common->fetchdata('*', 'tbl_product_series','WHERE delete_status="0"');
        $fList = $this->productSeriesModel->get_series_list($_POST);
        $totalRecordwithFilter = $this->productSeriesModel->get_series_list_count($_POST);
        $totalRecords          = $totalRecordwithFilter;

        if (!empty($fList))
        {
            $j=1;
            foreach ($fList as $val)
            {  
                $construction_array = array();
                if(!empty($val['construction_id'])){
                   $explode = explode(',', $val['construction_id']);
                    foreach ($explode as $key => $value) {
                        $getconstruction = $this->common->fetchsingledata('construction_title', 'tbl_construction',' WHERE c_id="'.$value.'"');
                        if(!empty($getconstruction['construction_title'])){
                            $construction_array[] = $getconstruction['construction_title'];
                        }
                    }
                }

                $sr_no                      = $j;
                $title                      = (!empty($val['title'])) ? ucfirst($val['title']) : ''; 
                // $construction_title         = (!empty($val['construction_title'])) ? $val['construction_title'] : ''; 
                $construction_title               = (!empty($construction_array)) ? implode(', ', $construction_array) : '';
                $position                   = (!empty($val['position'])) ? $val['position'] : '';

                if($val['status'] == 0)
                {     
                   $status = '<a class="btn btn-sm show-tooltip" href="'.base_url() .'manageProductSeries/change_status/1/' . base64_encode($val['ps_id']).'" title="Unlock"><i class="fa fa-lock fa-2x"></i></a>';
                }
                else
                {
                    $status = '<a class="btn btn-sm show-tooltip" href="'.base_url() . 'manageProductSeries/change_status/0/' .base64_encode($val['ps_id']).'" title="Lock"> <i class="fa fa-unlock fa-2x"></i></a>';
                }
                if($val['series_image']!="")
                {
                    $image = '<img src="'.base_url().'uploads/series/thumb/'.$val['series_image'].'" style="width:100px">';
                }else{
                    $image = 'NA';
                }


                $edit = '<a class="btn btn-sm btn-info show-tooltip" href="'.base_url().'admin/edit-product-series/'.base64_encode($val['ps_id']).'" title="Edit"> Edit</a>';
                $delete = '<a class="btn btn-sm btn-danger show-tooltip" href="'.base_url().'manageProductSeries/delete_product_series/'.base64_encode($val['ps_id']).'" title="Delete" onclick="return confirm(\'Are you sure, you want to delete this series?\');">Delete</a>';

                $action='<td>
                            '.$edit.'
                            '.$delete.'
                        </td>';

                $j++;   
                $data[] = array(
                    'sr_no'                 => $sr_no,
                    'title'                 => $title,
                    'construction_title'    => $construction_title, 
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

   
    public function edit_product_series($ps_id=0)
    {       
        $this->common->check_auth();
        $ps_id=base64_decode($ps_id);
        if(!empty($_POST['btn_edit_product_series']))
        {
            $this->form_validation->set_rules('title','title','required');
            $this->form_validation->set_rules('description','description','required');
            $this->form_validation->set_rules('short_description','short_description','required');
            $this->form_validation->set_rules('meta_title','meta_title','required');
            $this->form_validation->set_rules('meta_description','meta_description','required');
            $this->form_validation->set_rules('meta_keyword','meta_keyword','required');
            $checkRecord  = $this->common->numberofrecord("ps_id","tbl_product_series"," WHERE status='1' AND title='".$this->input->post('title')."' AND ps_id!='".$ps_id."'");

            if($checkRecord == 0)
            {
                if($this->form_validation->run())
                {
                    $construction_id = '';
                    if(!empty($_POST['construction_id'])){
                        $construction_id = implode(',', $_POST['construction_id']);
                    }

                    // $construction_id    = $this->input->post('construction_id',true);
                    // $construction_id    = $this->input->post('construction_id',true);
                    $title              = $this->input->post('title',true);
                    $description        = $this->input->post('description',true);
                    $short_description  = $this->input->post('short_description',true);
                    $meta_keyword       = $this->input->post('meta_keyword',true);
                    $meta_description   = $this->input->post('meta_description',true);
                    $meta_title         = $this->input->post('meta_title',true);
                    $slug               = $this->common->create_seo($title,$ps_id); 
                    $position           = $this->input->post('position',true);
                    $hidden_appimage     = $this->input->post('hidden_img',true);

                    $show_as_featured =$this->input->post('show_as_featured',true);
                    if(empty($show_as_featured))
                    {
                        $show_as_featured="off";
                    }

                    $series_image_alt = (!empty($_POST['series_image_alt'])) ? $_POST['series_image_alt'] : '';
                  
                    $add_data=array(
                                    'title'                 => $title,
                                    'construction_id'       => $construction_id,
                                    'description'           => $description,
                                    'position'              => $position,
                                    'short_description'     => $short_description,
                                    'show_as_featured'      => $show_as_featured,
                                    'series_image_alt'      => $series_image_alt,
                                    'seo_keywords'          => $meta_keyword,
                                    'seo_description'       => $meta_description,
                                    'seo_title'             => $meta_title,
                                    'created_on'            => date("Y-m-d H:i:s"),
                                    'status'                => '1',
                                    'slug'                  => $slug
                                );
                    if($this->common->db_update('tbl_product_series',$add_data,'ps_id',$ps_id)) 
                    {
                        $series_image="";
                        if($_FILES['series_image']['name']!= '')
                        { 
                            $config = array('allowed_types'=>'jpg|jpeg|png|gif',
                            'file_name'=>time().'_'.$_FILES['series_image']['name'],
                            'upload_path'=>'uploads/series/');                         
                            $this->upload->initialize($config);
                            if($this->upload->do_upload('series_image'))
                            {                               
                                $up_data = $this->upload->data();   
                                $series_image = $up_data['file_name'];
                                $update_data=array('series_image'=>$series_image); 
                                $imagedata = getimagesize('uploads/series/'.$series_image);

                                $series_thumb_width  = $this->common->getValueStore('series_thumb_width');
                                $series_thumb_height = $this->common->getValueStore('series_thumb_height');
                                $series_large_width  = $this->common->getValueStore('series_large_width');
                                $series_large_height = $this->common->getValueStore('series_large_height');
                                
                                $this->common->create_thumb('uploads/series/'.$series_image,'uploads/series/thumb/'.$series_image,$series_thumb_width,$series_thumb_height); 
                                $this->common->create_thumb('uploads/series/'.$series_image,'uploads/series/large/'.$series_image,$series_large_width,$series_large_height); 

                                $img=$this->common->db_update('tbl_product_series',$update_data,'ps_id',$ps_id); 
                                if(!empty($img))
                                {
                                    @unlink('uploads/series/'.$hidden_appimage);
                                    @unlink('uploads/series/thumb/'.$hidden_appimage);
                                    @unlink('uploads/series/large/'.$hidden_appimage);
                                }
                            }
                            else
                            {
                                $this->session->set_flashdata('error','You can upload only jpg/jpeg/png image');
                                redirect(base_url().'admin/edit-product-series/'.base64_encode($ps_id));                                 
                            }
                        }
                        
                            /*PRODUCT DOCUMENT*/
                            $doc_folder = $ps_id.'-'.time();
                            $output_dir = 'uploads/series_pdf/'. $doc_folder . '/';
                            // folder name in Product_document field
                            $this->common->db_update('tbl_product_series',array('file_folder'=>$doc_folder),'ps_id',$ps_id);

                            if (!file_exists($output_dir))
                            @mkdir($output_dir, 0777);

                            if(!empty($_FILES['old_files']['name'])){
                                $old_count = count($_FILES['old_files']['name']);

                                for($j=0;$j<$old_count;$j++){
                                
                                    if(!empty($_FILES['old_files']['name'][$j])){
                                
                                      $_FILES['old_file']['name'] = $_FILES['old_files']['name'][$j];
                                      $_FILES['old_file']['type'] = $_FILES['old_files']['type'][$j];
                                      $_FILES['old_file']['tmp_name'] = $_FILES['old_files']['tmp_name'][$j];
                                      $_FILES['old_file']['error'] = $_FILES['old_files']['error'][$j];
                                      $_FILES['old_file']['size'] = $_FILES['old_files']['size'][$j];
                              
                                      $config['upload_path'] = $output_dir; 
                                      $config['allowed_types'] = 'pdf';
                                      
                                      $config['file_name'] = time().'-'.$_FILES['old_file']['name'];
                               
                                      $this->load->library('upload',$config); 
                                      $this->upload->initialize($config);


                                       if($this->upload->do_upload('old_file')){
                                            $uploadData = $this->upload->data();
                                            $filename = $uploadData['file_name'];
                                                
                                            $docArray = array(
                                                                'series_id'          => $ps_id,
                                                                'folder'        => $doc_folder,
                                                                'pdf_detail'    => $_POST['old_doc_details'][$j],
                                                                'pdf_file'      => $filename
                                                            );
                                            if($this->common->db_update("tbl_product_documents",$docArray,'pdf_id',$_POST['hidden_pdf_id'][$j])){
                                                @unlink($output_dir.$_POST['hidden_old_files'][$j]);
                                            }
                                        }
                                        else
                                        {
                                            $this->session->set_flashdata('error',$this->upload->display_errors());  
                                            // redirect(base_url().'admin/edit-product-series/'.base64_encode($id));    
                                        }
                                    }
                                }
                            }

               
                            $count = count($_FILES['files']['name']);
                            for($i=0;$i<$count;$i++){
                        
                                if(!empty($_FILES['files']['name'][$i])){
                            
                                  $_FILES['file']['name'] = $_FILES['files']['name'][$i];
                                  $_FILES['file']['type'] = $_FILES['files']['type'][$i];
                                  $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
                                  $_FILES['file']['error'] = $_FILES['files']['error'][$i];
                                  $_FILES['file']['size'] = $_FILES['files']['size'][$i];
                          
                                  $config['upload_path'] = $output_dir; 
                                  $config['allowed_types'] = 'pdf';
                                  
                                  $config['file_name'] = $_FILES['files']['name'][$i];
                           
                                  $this->load->library('upload',$config); 
                                 $this->upload->initialize($config);


                                  if($this->upload->do_upload('file')){
                                        $uploadData = $this->upload->data();
                                        $filename = $uploadData['file_name'];
                                            
                                        $docArray = array(
                                                            'series_id'          => $ps_id,
                                                            'folder'        => $doc_folder,
                                                            'pdf_detail'    => $_POST['doc_details'][$i],
                                                            'pdf_file'      => $filename
                                                        );
                                            $this->common->db_add("tbl_product_documents",$docArray);
                                        }
                                        else
                                        {
                                            $this->session->set_flashdata('error',$this->upload->display_errors());  
                                            redirect(base_url().'admin/edit-product-series/'.base64_encode($id));    
                                        }
                                }
                            }  

                        
                    }
                    $this->session->set_flashdata('success','Data updated successfully');  
                    redirect(base_url().'admin/manage-product-series'); 
                } 
            }
            else               
            {
                $this->session->set_flashdata('error','Series name already exists');  
                redirect(base_url().'admin/edit-product-series/'.base64_encode($ps_id)); 
            }
        }
        $data['detail']=$this->common->fetchsingledata('*','tbl_product_series',' WHERE ps_id='.$ps_id);
        $data['construction'] = $this->common->fetchdata("c_id,construction_title","tbl_construction"," WHERE status='1' AND delete_status='0'");
        $data['files'] = $this->common->fetchdata("*","tbl_product_documents"," WHERE series_id='".$ps_id."'");
        $data['title']='Edit Series';
        $data['middle_content']="product_series/edit_product_series";
        $this->load->view('admin/admin-template',$data);
    }

    public function change_status($stat=0,$tech_id=0)
    {
        $status=$stat;
        $ps_id=base64_decode($tech_id);
        $valid_page=$this->common->numberofrecord('*','tbl_product_series',' WHERE ps_id='.$ps_id);
        if($valid_page>0)
        {
            $update_stat=array('status'=>$status);
            if($this->common->db_update('tbl_product_series',$update_stat,'ps_id',$ps_id))
            {
                // $getCatgeory = $this->common->fetchdata("c_id,cat_type","tbl_category"," WHERE tech_id='".$ps_id."'");
                // if(count($getCatgeory)>0)
                // {
                //     foreach ($getCatgeory as $cat) 
                //     {
                //         if($this->common->db_update('tbl_category',array('status'=>$status),'tech_id',$ps_id)){
                //             $this->common->db_update('tbl_series',array('status'=>$status),'caps_id',$cat['c_id']);
                //             $this->common->db_update('tbl_model_size',array('status'=>$status),'caps_id',$cat['c_id']);
                //         }
                //     }
                // }
                // $this->common->db_update('tbl_product',array('status'=>$status),'tech_id',$ps_id);
                // for work
                // $this->common->db_update('tbl_work',array('status'=>$status),'tech_id',$ps_id);


                $this->session->set_flashdata('success','Status changed successfully!');
                redirect(base_url().'admin/manage-product-series');  
            }
        }
        else
        {
            $this->session->set_flashdata('error','Series does not exist!');
        }
    }

    public function delete_product_series($ps_id=0)
    {
        $ps_id=base64_decode($ps_id);
        $valid_size=$this->common->fetchsingledata('*','tbl_product_series',' WHERE ps_id='.$ps_id);
        if(!empty($valid_size))
        {
            if($this->common->db_update('tbl_product_series',array('delete_status'=>'1'),'ps_id',$ps_id))
            {
               // $getCatgeory = $this->common->fetchdata("c_id,cat_type","tbl_category"," WHERE tech_id='".$ps_id."'");
               //  if(count($getCatgeory)>0)
               //  {
               //      foreach ($getCatgeory as $cat) 
               //      {
               //          if($this->common->db_update('tbl_category',array('delete_status'=>'1'),'tech_id',$ps_id)){
               //              $this->common->db_update('tbl_series',array('delete_status'=>'1'),'caps_id',$cat['c_id']);
               //              $this->common->db_update('tbl_model_size',array('delete_status'=>'1'),'caps_id',$cat['c_id']);
               //          }
               //      }
               //  }
               //  $this->common->db_update('tbl_product',array('delete_status'=>'1'),'tech_id',$ps_id);
               //  // for work
               //  $this->common->db_update('tbl_work',array('delete_status'=>'1'),'tech_id',$ps_id);

                $this->session->set_flashdata('success','Series deleted successfully!');
                redirect(base_url().'admin/manage-product-series');  
            }
        }
        else
        {
            $this->session->set_flashdata('error','Doesnot exist!');
        }
    }

    public function move_to_list($ps_id=0)
    {
        $ps_id=base64_decode($ps_id);
        $valid_size=$this->common->fetchsingledata('*','tbl_product_series',' WHERE ps_id='.$ps_id);
        if(!empty($valid_size))
        {
            
            if($this->common->db_update('tbl_product_series',array('delete_status'=>'0'),'ps_id',$ps_id))
            {
               // $getCatgeory = $this->common->fetchdata("c_id,cat_type","tbl_category"," WHERE tech_id='".$ps_id."'");
               //  if(count($getCatgeory)>0)
               //  {
               //      foreach ($getCatgeory as $cat) 
               //      {
               //          if($this->common->db_update('tbl_category',array('delete_status'=>'0'),'tech_id',$ps_id)){
               //              $this->common->db_update('tbl_series',array('delete_status'=>'0'),'caps_id',$cat['c_id']);
               //              $this->common->db_update('tbl_model_size',array('delete_status'=>'0'),'caps_id',$cat['c_id']);
               //          }
               //      }
               //  }
               //  $this->common->db_update('tbl_product',array('delete_status'=>'0'),'tech_id',$ps_id);
               //  // for work
               //  $this->common->db_update('tbl_work',array('delete_status'=>'0'),'tech_id',$ps_id);

                $this->session->set_flashdata('success','Product series undo successfully!');
                redirect(base_url().'admin/manage-archive-application');  
            }
        }
        else
        {
            $this->session->set_flashdata('error','Doesnot exist!');
        }
    }
}