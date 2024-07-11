<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ManageEvent extends CI_Controller 
{   
    public function __construct()
    {
        parent::__construct();
        $this->load->model('common');
        $this->load->model('eventModel');
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
    public function add_event()
    {
        $this->common->check_auth();
        if(!empty($_POST['btn_news']))
        {
            $title         = $this->input->post('title');
            $description   = $this->input->post('description');
            $start_date         = '';
            $end_date           = '';
           
            $add_data = array(
                            'title'             => $title,
                            'slug'              => '',
                            'description'       => $description,
                            'start_date'        => '',
                            'end_date'          => '',
                            'added_date'        => date("Y-m-d h:i:s"),
                        );
            
            if($this->common->db_add('tbl_event',$add_data))
            {
                $id = $this->db->insert_id();
                $slug = $this->common->create_seo($_POST['title'],$id);
                $update_array = array('slug' => $slug);
                $this->common->db_update('tbl_event',$update_array,'e_id',$id);
               
                if($_FILES['file_name']['name']!= '')
                {
                    $array = array(
                    'id' => $id,
                    );

                    $config = array('allowed_types'=>'jpg|jpeg|png|gif',
                            'file_name'=>time().'_'.$id,
                            'upload_path'=>'uploads/events/');
                    
                    $this->upload->initialize($config);
                    
                    if($this->upload->do_upload('file_name'))
                    {
                        $up_data    = $this->upload->data();   
                        $image      = $up_data['file_name'];
                        $update_data=array('event_image'=>$image);  
                        
                        
                        $this->common->create_thumb('uploads/events/'.$image,'uploads/events/thumb/'.$image,80,80); 
                        //$this->common->create_thumb('uploads/events/'.$image,'uploads/events/medium/'.$image,870,600); 
                        
                        if($this->common->db_update('tbl_event',$update_data,'e_id',$id))
                        {
                            $this->session->set_flashdata('success','Event added successfully!');
                            redirect(base_url().'admin/manage-event'); 
                        }

                    }
                   
                }
                 $this->session->set_flashdata('success','Event added successfully!');
                    redirect(base_url().'admin/manage-event');
               
            }else{
                    $this->session->set_flashdata('error','Try again!');
                    redirect(base_url().'add-events');
            }
        }
        else
        {
            // $data['brands'] = $this->common->fetchdata("b_id,brand_name","tbl_brand"," WHERE status='1'");
            $data['title']='Add Event';
            $data['middle_content']="event/add_event";
            $this->load->view('admin/admin-template',$data);
        }
        
    }

    public function manage_event()
    {   
        $this->common->check_auth(); 
        $data['title']='Manage Event';
        $data['middle_content']="event/manage_event";
        $this->load->view('admin/admin-template',$data);
        
    }

    public function Event_list()
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
        // $fList = $this->common->fetchdata('*', 'tbl_event','WHERE delete_status="0"');
        $fList = $this->eventModel->get_event_list($_POST);
        $totalRecordwithFilter = $this->eventModel->get_event_list_count($_POST);
        $totalRecords          = $totalRecordwithFilter;

        if (!empty($fList))
        {
            $j=1;
            foreach ($fList as $val)
            {  
                $sr_no                      = $j;
                $title                      = (!empty($val['title'])) ? substr($val['title'],0,30).'...' : ''; 
                $description                = (!empty($val['description'])) ? substr($val['description'],0,50).'...' : ''; 
                // $position                   = (!empty($val['position'])) ? $val['position'] : '';

                if($val['status'] == 0)
                {     
                   $status = '<a class="btn btn-sm show-tooltip" href="'.base_url() .'ManageEvent/change_status/1/' . base64_encode($val['e_id']).'" title="Unlock"><i class="fa fa-lock fa-2x"></i></a>';
                }
                else
                {
                    $status = '<a class="btn btn-sm show-tooltip" href="'.base_url() . 'ManageEvent/change_status/0/' .base64_encode($val['e_id']).'" title="Lock"> <i class="fa fa-unlock fa-2x"></i></a>';
                }
                if($val['event_image']!="")
                {
                    $image = '<img src="'.base_url().'uploads/events/thumb/'.$val['event_image'].'">';
                }else{
                    $image = 'NA';
                }


                $edit = '<a class="btn btn-sm btn-info show-tooltip" href="'.base_url().'admin/edit-event/'.base64_encode($val['e_id']).'" title="Edit"> Edit</a>';
                $delete = '<a class="btn btn-sm btn-danger show-tooltip" href="'.base_url().'ManageEvent/delete_event/'.base64_encode($val['e_id']).'" title="Delete" onclick="return confirm(\'Are you sure, you want to delete this event?\');">Delete</a>';

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

    public function edit_event($e_id=0)
    {       
        $this->common->check_auth();
        $e_id=base64_decode($e_id);
        if(!empty($_POST['btn_edit_news']))
        {
            $title              = $this->input->post('title');
            $description        = $this->input->post('description');
            $start_date         = '';
            $end_date           = '';
            $slug               = $this->common->create_seo($title,"");
           
            $add_data = array(
                            'title'        => $title,
                            'slug'         => $slug,
                            'description'  => $description,
                            'start_date'        => '',
                            'end_date'          => '',
                            'added_date'        => date("Y-m-d h:i:s"),
                        );

            if($this->common->db_update('tbl_event',$add_data,'e_id',$e_id))
            {
                if($_FILES['file_name']['name']!= '')
                {

                    $config = array('allowed_types'=>'jpg|jpeg|png|gif',
                            'file_name'=>time().'_'.$_FILES['file_name']['name'],
                            'upload_path'=>'uploads/events/');
                    
                    $this->upload->initialize($config);
                    
                    if($this->upload->do_upload('file_name'))
                    {
                        $up_data    = $this->upload->data();   
                        $image      = $up_data['file_name'];
                        $update_data=array('event_image'=>$image);  
                        
                        $this->common->create_thumb('uploads/events/'.$image,'uploads/events/thumb/'.$image,80,80); 
                        //$this->common->create_thumb('uploads/events/'.$image,'uploads/events/medium/'.$image,870,600);
                        
                        if($this->common->db_update('tbl_event',$update_data,'e_id',$e_id))
                        {
                            $hidden_img     = $this->input->post('hidden_img',true);
                            @unlink('uploads/events/'.$hidden_img);
                            @unlink('uploads/events/thumb/'.$hidden_img);
                            //@unlink('uploads/events/medium/'.$hidden_img);

                            $this->session->set_flashdata('success','Event updated successfully!');
                            redirect(base_url().'admin/manage-event'); 
                        }

                    }
                   
                }
               
                $this->session->set_flashdata('success','Event updated successfully!');
                redirect(base_url().'admin/manage-event'); 
            }else{
                    $this->session->set_flashdata('error','Page doesnot exist!');
                    redirect(base_url().'admin/manage-event');
            }
        }
        $data['detail']=$this->common->fetchsingledata('*','tbl_event',' WHERE e_id='.$e_id);

        $data['title']='Edit Event';
        $data['middle_content']="event/edit_event";
        $this->load->view('admin/admin-template',$data);
    }

    public function change_status($stat=0,$tech_id=0)
    {
        $status=$stat;
        $e_id=base64_decode($tech_id);
        $valid_page=$this->common->numberofrecord('*','tbl_event',' WHERE e_id='.$e_id);
        if($valid_page>0)
        {
            $update_stat=array('status'=>$status);
            if($this->common->db_update('tbl_event',$update_stat,'e_id',$e_id))
            {
                // $getCatgeory = $this->common->fetchdata("c_id,cat_type","tbl_category"," WHERE tech_id='".$e_id."'");
                // if(count($getCatgeory)>0)
                // {
                //     foreach ($getCatgeory as $cat) 
                //     {
                //         if($this->common->db_update('tbl_category',array('status'=>$status),'tech_id',$e_id)){
                //             $this->common->db_update('tbl_series',array('status'=>$status),'cae_id',$cat['c_id']);
                //             $this->common->db_update('tbl_model_size',array('status'=>$status),'cae_id',$cat['c_id']);
                //         }
                //     }
                // }
                // $this->common->db_update('tbl_product',array('status'=>$status),'tech_id',$e_id);
                // for work
                // $this->common->db_update('tbl_work',array('status'=>$status),'tech_id',$e_id);


                $this->session->set_flashdata('success','Status changed successfully!');
                redirect(base_url().'admin/manage-event');  
            }
        }
        else
        {
            $this->session->set_flashdata('error','Event does not exist!');
        }
    }

    public function delete_event($e_id=0)
    {
        $e_id=base64_decode($e_id);
        
        if($this->common->db_delete('tbl_event','e_id',$e_id))
        {
            $this->session->set_flashdata('success','Event deleted successfully!');
            redirect(base_url().'admin/manage-event');  
        }else
        {
            $this->session->set_flashdata('error','Try again');
            redirect('admin/manage-event'); 
        }
        
    }
    
}