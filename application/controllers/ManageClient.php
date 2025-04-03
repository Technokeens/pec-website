<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ManageClient extends CI_Controller 
{   
    public function __construct()
    {
        parent::__construct();
        $this->load->model('common');
        $this->load->model('clientModel');
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
    public function add_client()
    {
        $this->common->check_auth();
        if(!empty($_POST['btn_client']))
        {
            $title         = $this->input->post('title');
            $add_data = array(
                            'title'             => $title,
                            'created_date'      => date("Y-m-d h:i:s"),
                            'image_alt'     => (!empty($_POST['image_alt'])) ? $_POST['image_alt'] : '',
                        );
            
            if($this->common->db_add('tbl_client',$add_data))
            {
                $id = $this->db->insert_id();
                if($_FILES['file_name']['name']!= '')
                {
                    $array = array(
                    'id' => $id,
                    );

                    $config = array('allowed_types'=>'jpg|jpeg|png|gif',
                            'file_name'=>time().'_'.$id,
                            'upload_path'=>'uploads/client/');
                    
                    $this->upload->initialize($config);
                    
                    if($this->upload->do_upload('file_name'))
                    {
                        $up_data    = $this->upload->data();   
                        $image      = $up_data['file_name'];
                        $update_data=array('image'=>$image);  
                        $this->common->create_thumb('uploads/client/'.$image,'uploads/client/thumb/'.$image,80,50); 
                        
                        if($this->common->db_update('tbl_client',$update_data,'id',$id))
                        {
                            $this->session->set_flashdata('success','Client added successfully!');
                            redirect(base_url().'admin/manage-client'); 
                        }

                    }
                   
                }
                 $this->session->set_flashdata('success','Client added successfully!');
                    redirect(base_url().'admin/manage-client');
               
            }else{
                    $this->session->set_flashdata('error','Try again!');
                    redirect(base_url().'add-clients');
            }
        }
        else
        {
            $data['title']='Add Client';
            $data['middle_content']="client/add_client";
            $this->load->view('admin/admin-template',$data);
        }
        
    }

    public function manage_client()
    {   
        $this->common->check_auth(); 
        $data['title']='Manage Client';
        $data['middle_content']="client/manage_client";
        $this->load->view('admin/admin-template',$data);
        
    }

    public function client_list()
    {
        $this->common->check_auth();
        $sr_no              = "";
        $title              = "";
        $image           = "";
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
        // $fList = $this->common->fetchdata('*', 'tbl_client','WHERE delete_status="0"');
        $fList = $this->clientModel->get_client_list($_POST);
        $totalRecordwithFilter = $this->clientModel->get_client_list_count($_POST);
        $totalRecords          = $totalRecordwithFilter;

        if (!empty($fList))
        {
            $j=1;
            foreach ($fList as $val)
            {  
                $sr_no                      = $j;
                $title                      = (!empty($val['title'])) ? ucfirst($val['title']) : ''; 

                if($val['status'] == 0)
                {     
                   $status = '<a class="btn btn-sm show-tooltip" href="'.base_url() .'ManageClient/change_status/1/' . base64_encode($val['id']).'" title="Unlock"><i class="fa fa-lock fa-2x"></i></a>';
                }
                else
                {
                    $status = '<a class="btn btn-sm show-tooltip" href="'.base_url() . 'ManageClient/change_status/0/' .base64_encode($val['id']).'" title="Lock"> <i class="fa fa-unlock fa-2x"></i></a>';
                }
                if($val['image']!="")
                {
                    $image = '<img style="width:80px" src="'.base_url().'uploads/client/'.$val['image'].'">';
                }else{
                    $image = 'NA';
                }


                $edit = '<a class="btn btn-sm btn-info show-tooltip" href="'.base_url().'admin/edit-client/'.base64_encode($val['id']).'" title="Edit"> Edit</a>';
                $delete = '<a class="btn btn-sm btn-danger show-tooltip" href="'.base_url().'ManageClient/delete_client/'.base64_encode($val['id']).'" title="Delete" onclick="return confirm(\'Are you sure, you want to delete this client?\');">Delete</a>';

                $action='<td>
                            '.$edit.'
                            '.$delete.'
                        </td>';

                $j++;   
                $data[] = array(
                    'sr_no'                 => $sr_no,
                    'title'                 => $title,
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

    public function edit_client($id=0)
    {       
        $this->common->check_auth();
        $id=base64_decode($id);
        if(!empty($_POST['btn_edit_client']))
        {
            $title              = $this->input->post('title');
            $add_data = array(
                            'title'        => $title,
                            'created_date' => date("Y-m-d h:i:s"),
                            'image_alt'     => (!empty($_POST['image_alt'])) ? $_POST['image_alt'] : '',
                        );

            if($this->common->db_update('tbl_client',$add_data,'id',$id))
            {
                if($_FILES['file_name']['name']!= '')
                {
                    $config = array('allowed_types'=>'jpg|jpeg|png|gif',
                            'file_name'=>time().'_'.$_FILES['file_name']['name'],
                            'upload_path'=>'uploads/client/');
                    
                    $this->upload->initialize($config);
                    
                    if($this->upload->do_upload('file_name'))
                    {
                        $up_data    = $this->upload->data();   
                        $image      = $up_data['file_name'];
                        $update_data=array('image'=>$image);  
                        
                        $this->common->create_thumb('uploads/client/'.$image,'uploads/client/thumb/'.$image,80,50); 
                        
                        if($this->common->db_update('tbl_client',$update_data,'id',$id))
                        {
                            $hidden_img     = $this->input->post('hidden_img',true);
                            @unlink('uploads/client/'.$hidden_img);
                            @unlink('uploads/client/thumb/'.$hidden_img);

                            $this->session->set_flashdata('success','Client updated successfully!');
                            redirect(base_url().'admin/manage-client'); 
                        }

                    }
                   
                }
               
                $this->session->set_flashdata('success','Client updated successfully!');
                redirect(base_url().'admin/manage-client'); 
            }else{
                    $this->session->set_flashdata('error','Page doesnot exist!');
                    redirect(base_url().'admin/manage-client');
            }
        }
        $data['detail']=$this->common->fetchsingledata('*','tbl_client',' WHERE id='.$id);

        $data['title']='Edit Client';
        $data['middle_content']="client/edit_client";
        $this->load->view('admin/admin-template',$data);
    }

    public function change_status($stat=0,$tech_id=0)
    {
        $status=$stat;
        $id=base64_decode($tech_id);
        $valid_page=$this->common->numberofrecord('*','tbl_client',' WHERE id='.$id);
        if($valid_page>0)
        {
            $update_stat=array('status'=>$status);
            if($this->common->db_update('tbl_client',$update_stat,'id',$id))
            {
                // $getCatgeory = $this->common->fetchdata("c_id,cat_type","tbl_category"," WHERE tech_id='".$id."'");
                // if(count($getCatgeory)>0)
                // {
                //     foreach ($getCatgeory as $cat) 
                //     {
                //         if($this->common->db_update('tbl_category',array('status'=>$status),'tech_id',$id)){
                //             $this->common->db_update('tbl_series',array('status'=>$status),'caid',$cat['c_id']);
                //             $this->common->db_update('tbl_model_size',array('status'=>$status),'caid',$cat['c_id']);
                //         }
                //     }
                // }
                // $this->common->db_update('tbl_product',array('status'=>$status),'tech_id',$id);
                // for work
                // $this->common->db_update('tbl_work',array('status'=>$status),'tech_id',$id);


                $this->session->set_flashdata('success','Status changed successfully!');
                redirect(base_url().'admin/manage-client');  
            }
        }
        else
        {
            $this->session->set_flashdata('error','Client does not exist!');
        }
    }

    public function delete_client($id=0)
    {
        $id=base64_decode($id);
        
        if($this->common->db_delete('tbl_client','id',$id))
        {
            $this->session->set_flashdata('success','Client deleted successfully!');
            redirect(base_url().'admin/manage-client');  
        }else
        {
            $this->session->set_flashdata('error','Try again');
            redirect('admin/manage-client'); 
        }
        
    }
    
}