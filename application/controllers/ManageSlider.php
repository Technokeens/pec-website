<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ManageSlider extends CI_Controller 
{   
    public function __construct()
    {
        parent::__construct();
        $this->load->model('common');
        $this->load->model('sliderModel');
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
    public function add_slider()
    {
        $this->common->check_auth();
            
        if(!empty($_POST['add_slider']))
        {
            $this->form_validation->set_rules('slider_content','Slider Content','required|trim');
            $this->form_validation->set_rules('description','Description','required|trim');
            if($this->form_validation->run())
            { 
                $hidden_profile = "slider-".time();
                $slider_content = $this->input->post("slider_content");
                $description    = $this->input->post("description");
                $url            = $this->input->post("url");
                
                $output_dir = "uploads/slider/";
                $output_dir_thumb = "uploads/slider/thumb/";
                $output_dir_medium = "uploads/slider/medium/";
                if (!file_exists($output_dir))
                @mkdir($output_dir, 0777);
                if (!file_exists($output_dir_thumb))
                @mkdir($output_dir_thumb, 0777);
                if (!file_exists($output_dir_medium))
                @mkdir($output_dir_medium, 0777);

                if($_FILES['slider_img']['name'] != '')
                { 
                    $config = array('allowed_types'=>'jpg|jpeg|png',
                        'file_name'=>$hidden_profile,
                        'upload_path'=>$output_dir);
                    $this->upload->initialize($config);
                    if($this->upload->do_upload('slider_img'))
                    {
                        $up_data = $this->upload->data();   
                        $slider  = $up_data['file_name'];
                        /*$this->common->create_thumb($output_dir.$slider,$output_dir_thumb.$slider,1680,750);
                        $this->common->create_thumb($output_dir.$slider,$output_dir_medium.$slider,350,100);*/
                        $this->common->create_thumb($output_dir.$slider,$output_dir_thumb.$slider,1440,500);
                        $this->common->create_thumb($output_dir.$slider,$output_dir_medium.$slider,350,100);
                        
                    }
                    else
                    {
                        $errors = $this->upload->display_errors();
                        $this->session->set_flashdata('error',$errors);
                        redirect(base_url().'admin/manage-slider');
                    }
                    $insert_array=array('title'=>$slider_content,'description'=>$description,'image'=>$slider,'url'=>$url);
                }
                    
                    
                if($this->common->db_add('tbl_slider',$insert_array))
                {
                    $this->session->set_flashdata('success','Slider added successfully!');
                    
                     redirect(base_url().'admin/manage-slider');
                }else{

                    $this->session->set_flashdata('error','Try again later');
                    redirect('add-slider');
                }            
            }
        }
        else
        {
            $data['slider']= $this->common->fetchdata('*','tbl_slider',' WHERE status ="1"');  

            $data['title']='Add Slider';
            $data['middle_content']="slider/add_slider";
            $this->load->view('admin/admin-template',$data);
        }
        
    }

    public function manage_slider()
    {   
        $this->common->check_auth(); 
        $data['title']='Manage Slider';
        $data['middle_content']="slider/manage_slider";
        $this->load->view('admin/admin-template',$data);
        
    }

    public function slider_list()
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
        // $fList = $this->common->fetchdata('*', 'tbl_slider','WHERE delete_status="0"');
        $fList = $this->sliderModel->get_slider_list($_POST);
        $totalRecordwithFilter = $this->sliderModel->get_slider_list_count($_POST);
        $totalRecords          = $totalRecordwithFilter;

        if (!empty($fList))
        {
            $j=1;
            foreach ($fList as $val)
            {  
                $sr_no                      = $j;
                $title                      = (!empty($val['title'])) ? substr($val['title'],0,30).'...' : ''; 
                $url                = (!empty($val['url'])) ? $val['url'] : ''; 
                // $position                   = (!empty($val['position'])) ? $val['position'] : '';

                if($val['status'] == 0)
                {     
                   $status = '<a class="btn btn-sm show-tooltip" href="'.base_url() .'ManageSlider/change_status/1/' . base64_encode($val['id']).'" title="Unlock"><i class="fa fa-lock fa-2x"></i></a>';
                }
                else
                {
                    $status = '<a class="btn btn-sm show-tooltip" href="'.base_url() . 'ManageSlider/change_status/0/' .base64_encode($val['id']).'" title="Lock"> <i class="fa fa-unlock fa-2x"></i></a>';
                }
                if($val['image']!="")
                {
                    $image = '<img src="'.base_url().'uploads/slider/thumb/'.$val['image'].'" width="90"  height="50">';
                }else{
                    $image = 'NA';
                }


                $edit = '<a class="btn btn-sm btn-info show-tooltip" href="'.base_url().'admin/edit-slider/'.base64_encode($val['id']).'" title="Edit"> Edit</a>';
                $delete = '<a class="btn btn-sm btn-danger show-tooltip" href="'.base_url().'ManageSlider/delete_slider/'.base64_encode($val['id']).'" title="Delete" onclick="return confirm(\'Are you sure, you want to delete this slider?\');">Delete</a>';

                $action='<td>
                            '.$edit.'
                            '.$delete.'
                        </td>';

                $j++;   
                $data[] = array(
                    'sr_no'                 => $sr_no,
                    'title'                 => $title,
                    'url'                   => $url, 
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


    public function edit_slider($id=0)
    {       
        $this->common->check_auth();
        $id=base64_decode($id);
        if(!empty($_POST['edit_slider']))
        {
            $this->form_validation->set_rules('slider_content','Slider Content','required|trim');
            $this->form_validation->set_rules('description','Description','required|trim');
            if($this->form_validation->run())
            {
                     
                    $slider_content = $this->input->post("slider_content");
                    $description    = $this->input->post("description");
                    $url            = $this->input->post("url");
                    $hidden_slider  = $this->input->post("hidden_slider");
                   
                    $output_dir = "uploads/slider/";
                    $output_dir_thumb = "uploads/slider/thumb/";
                    $output_dir_medium = "uploads/slider/medium/";
                    if (!file_exists($output_dir))
                    @mkdir($output_dir, 0777);
                    if (!file_exists($output_dir_thumb))
                    @mkdir($output_dir_thumb, 0777);
                    if (!file_exists($output_dir_medium))
                    @mkdir($output_dir_medium, 0777);       

                    if($_FILES['slider_img']['name'] != '')
                    { 
                        $config = array('allowed_types'=>'jpg|jpeg|png',
                            'file_name'=>$_FILES['slider_img']['name'],
                            'upload_path'=>$output_dir);
                        $this->upload->initialize($config);
                        if($this->upload->do_upload('slider_img'))
                        {
                            $up_data = $this->upload->data();   
                            $slider  = $up_data['file_name'];
                            /*$this->common->create_thumb($output_dir.$slider,$output_dir_thumb.$slider,1680,750);
                            $this->common->create_thumb($output_dir.$slider,$output_dir_medium.$slider,350,100);*/
                            $this->common->create_thumb($output_dir.$slider,$output_dir_thumb.$slider,1440,500);
                                $this->common->create_thumb($output_dir.$slider,$output_dir_medium.$slider,350,100);
                            
                        }  
                        $insert_array   =   array(
                                'title'       => $slider_content,
                                'description' => $description,
                                'image'       => $slider,
                                'url'         => $url
                            );

                        @unlink($output_dir.$hidden_slider);
                        @unlink($output_dir_thumb.$hidden_slider);
                        @unlink($output_dir_medium.$hidden_slider);

                        if($this->common->db_update('tbl_slider',$insert_array,'id',$id))
                        {
                            $this->session->set_flashdata('success','Slider updated successfully');
                            redirect(base_url().'admin/manage-slider');
                        }

                    }
                    else
                    {
                        $insert_array   =   array(
                                'title'=>$slider_content,
                                'description'=>$description,
                                'image'=>$hidden_slider,
                                'url'         => $url
                            );

                        if($this->common->db_update('tbl_slider',$insert_array,'id',$id))
                        {
                            $this->session->set_flashdata('success','Slider updated successfully');
                            redirect(base_url().'admin/manage-slider');
                        }
                    }           
                
            }
            
        }
        $data['detail']=$this->common->fetchsingledata('*','tbl_slider',' WHERE id='.$id);
        

        $data['title']='Edit Slider';
        $data['middle_content']="slider/edit_slider";
        $this->load->view('admin/admin-template',$data);
    }

    public function change_status($stat=0,$tech_id=0)
    {
        $status=$stat;
        $id=base64_decode($tech_id);
        $valid_page=$this->common->numberofrecord('*','tbl_slider',' WHERE id='.$id);
        if($valid_page>0)
        {
            $update_stat=array('status'=>$status);
            if($this->common->db_update('tbl_slider',$update_stat,'id',$id))
            {
                $this->session->set_flashdata('success','Status changed successfully!');
                redirect(base_url().'admin/manage-slider');  
            }
        }
        else
        {
            $this->session->set_flashdata('error','Slider does not exist!');
        }
    }

    public function delete_slider($id=0)
    {
        $id=base64_decode($id);
        
        if($this->common->db_delete('tbl_slider','id',$id))
        {
            $this->session->set_flashdata('success','Slider deleted successfully!');
            redirect(base_url().'admin/manage-slider');  
        }else
        {
            $this->session->set_flashdata('error','Try again');
            redirect('admin/manage-slider'); 
        }
        
    }
  
}