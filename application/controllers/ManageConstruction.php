<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ManageConstruction extends CI_Controller 
{   
    public function __construct()
    {
        parent::__construct();
        $this->load->model('common');
        $this->load->model('constructionModel');
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
    public function add_construction()
    {
        $this->common->check_auth();
        if(!empty($_POST['btn_add_construction']))
        {
            $this->form_validation->set_rules('construction_title','construction_title','required');
            $this->form_validation->set_rules('construction_description','construction_description','required');
            $checkRecord  = $this->common->numberofrecord("c_id","tbl_construction"," WHERE status='1' AND delete_status = '0' AND construction_title='".$this->input->post('construction_title')."'");

            if($checkRecord == 0)
            {
                if($this->form_validation->run())
                {
                    $construction_title             = $this->input->post('construction_title',true);
                    $construction_description       = $this->input->post('construction_description',true);
                    $position                       = $this->input->post('position',true);
                    $slug                           = "";   
                    $add_data=array(
                                    'construction_title'       => $construction_title,
                                    'construction_description' => $construction_description,
                                    'position'              => $position,
                                    'created_on'            => date("Y-m-d H:i:s"),
                                    'status'                => '1',
                                    'slug'                  => $slug
                                );
                    if($this->common->db_add('tbl_construction',$add_data))
                    {
                        $id=$this->db->insert_id(); 
                        $slug = $this->common->create_seo($_POST['construction_title'],$id);
                        $update_array = array('slug' => $slug);
                        $this->common->db_update('tbl_construction',$update_array,'c_id',$id);

                        $this->session->set_flashdata('success','Construction added successfully');  
                        redirect(base_url().'admin/manage-construction');
                    }
                    else
                    {
                        $this->session->set_flashdata('error','Failed to add construction');  
                        redirect(base_url().'admin/add-construction');
                    }
                }
            }
            else
            {
                $this->session->set_flashdata('error','Construction name already exists');  
                redirect(base_url().'admin/add-construction'); 
            }
        }
        else
        {
            $data['title']='Add Construction';
            $data['middle_content']="construction/add_construction";
            $this->load->view('admin/admin-template',$data);
        }
        
    }

    public function manage_construction()
    {   
        $this->common->check_auth(); 
        $data['title']='Manage Construction';
        $data['middle_content']="construction/manage_construction";
        $this->load->view('admin/admin-template',$data);
    }

    public function construction_list()
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
        // $fList = $this->common->fetchdata('*', 'tbl_construction','WHERE delete_status="0"');
        $fList = $this->constructionModel->get_construction_list($_POST);
        $totalRecordwithFilter = $this->constructionModel->get_construction_list_count($_POST);
        $totalRecords          = $totalRecordwithFilter;

        if (!empty($fList))
        {
            $j=1;
            foreach ($fList as $val)
            {  
                $sr_no                      = $j;
                $title                      = (!empty($val['construction_title'])) ? substr($val['construction_title'],0,50).' ...' : ''; 
                $position                   = (!empty($val['position'])) ? $val['position'] : '';

                if($val['status'] == 0)
                {     
                   $status = '<a class="btn btn-sm show-tooltip" href="'.base_url() .'ManageConstruction/change_status/1/' . base64_encode($val['c_id']).'" title="Unlock"><i class="fa fa-lock fa-2x"></i></a>';
                }
                else
                {
                    $status = '<a class="btn btn-sm show-tooltip" href="'.base_url() . 'ManageConstruction/change_status/0/' .base64_encode($val['c_id']).'" title="Lock"> <i class="fa fa-unlock fa-2x"></i></a>';
                }
               


                $edit = '<a class="btn btn-sm btn-info show-tooltip" href="'.base_url().'admin/edit-construction/'.base64_encode($val['c_id']).'" title="Edit"> Edit</a>';
                $delete = '<a class="btn btn-sm btn-danger show-tooltip" href="'.base_url().'ManageConstruction/delete_construction/'.base64_encode($val['c_id']).'" title="Delete" onclick="return confirm(\'Are you sure, you want to delete this construction?\');">Delete</a>';

                $action='<td>
                            '.$edit.'
                            '.$delete.'
                        </td>';

                $j++;   
                $data[] = array(
                    'sr_no'                 => $sr_no,
                    'title'                 => $title,
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
   
    public function edit_construction($c_id=0)
    {       
        $this->common->check_auth();
        $c_id=base64_decode($c_id);
        if(!empty($_POST['btn_edit_construction']))
        {
            $this->form_validation->set_rules('construction_title','construction_title','required');
            $this->form_validation->set_rules('construction_description','construction_description','required');
            $checkRecord  = $this->common->numberofrecord("c_id","tbl_construction"," WHERE status='1' AND delete_status = '0' AND construction_title='".$this->input->post('construction_title')."' AND c_id!='".$c_id."'");

            if($checkRecord == 0)
            {
                if($this->form_validation->run())
                {
                    $construction_title        = $this->input->post('construction_title',true);
                    $construction_description  = $this->input->post('construction_description',true);
                    $slug               = $this->common->create_seo($title,$c_id); 
                    $position           = $this->input->post('position',true);
                  
                    $add_data=array(
                                    'construction_title'        => $construction_title,
                                    'construction_description'  => $construction_description,
                                    'position'                  => $position,
                                    'created_on'                => date("Y-m-d H:i:s"),
                                    'status'                    => '1',
                                    'slug'                      => $slug
                                );

                    if($this->common->db_update('tbl_construction',$add_data,'c_id',$c_id)) 
                    {
                        
                        $this->session->set_flashdata('success','Data updated successfully');  
                        redirect(base_url().'admin/manage-construction'); 
                       
                    }else{
                        $this->session->set_flashdata('error','Something went wrong!');  
                        redirect(base_url().'admin/manage-construction'); 
                    }
                    
                } 
            }
            else               
            {
                $this->session->set_flashdata('error','Construction name already exists');  
                redirect(base_url().'admin/edit-construction/'.base64_encode($c_id)); 
            }
        }
        $data['detail']=$this->common->fetchsingledata('*','tbl_construction',' WHERE c_id='.$c_id);

        $data['title']='Edit Construction';
        $data['middle_content']="construction/edit_construction";
        $this->load->view('admin/admin-template',$data);
    }

    public function change_status($stat=0,$constr_id=0)
    {
        $status=$stat;
        $c_id=base64_decode($constr_id);
        $valid_page=$this->common->numberofrecord('*','tbl_construction',' WHERE c_id='.$c_id);
        if($valid_page>0)
        {
            $update_stat=array('status'=>$status);
            if($this->common->db_update('tbl_construction',$update_stat,'c_id',$c_id))
            {
                // $getCatgeory = $this->common->fetchdata("c_id,cat_type","tbl_category"," WHERE constr_id='".$c_id."'");
                // if(count($getCatgeory)>0)
                // {
                //     foreach ($getCatgeory as $cat) 
                //     {
                //         if($this->common->db_update('tbl_category',array('status'=>$status),'constr_id',$c_id)){
                //             $this->common->db_update('tbl_series',array('status'=>$status),'cac_id',$cat['c_id']);
                //             $this->common->db_update('tbl_model_size',array('status'=>$status),'cac_id',$cat['c_id']);
                //         }
                //     }
                // }
                // $this->common->db_update('tbl_product',array('status'=>$status),'constr_id',$c_id);
                // for work
                // $this->common->db_update('tbl_work',array('status'=>$status),'constr_id',$c_id);


                $this->session->set_flashdata('success','Status changed successfully!');
                redirect(base_url().'admin/manage-construction');  
            }
        }
        else
        {
            $this->session->set_flashdata('error','Construction does not exist!');
        }
    }

    public function delete_construction($c_id=0)
    {
        $c_id=base64_decode($c_id);
        $valid_size=$this->common->fetchsingledata('*','tbl_construction',' WHERE c_id='.$c_id);
        if(!empty($valid_size))
        {
            if($this->common->db_update('tbl_construction',array('delete_status'=>'1'),'c_id',$c_id))
            {
               // $getCatgeory = $this->common->fetchdata("c_id,cat_type","tbl_category"," WHERE constr_id='".$c_id."'");
               //  if(count($getCatgeory)>0)
               //  {
               //      foreach ($getCatgeory as $cat) 
               //      {
               //          if($this->common->db_update('tbl_category',array('delete_status'=>'1'),'constr_id',$c_id)){
               //              $this->common->db_update('tbl_series',array('delete_status'=>'1'),'cac_id',$cat['c_id']);
               //              $this->common->db_update('tbl_model_size',array('delete_status'=>'1'),'cac_id',$cat['c_id']);
               //          }
               //      }
               //  }
               //  $this->common->db_update('tbl_product',array('delete_status'=>'1'),'constr_id',$c_id);
               //  // for work
               //  $this->common->db_update('tbl_work',array('delete_status'=>'1'),'constr_id',$c_id);

                $this->session->set_flashdata('success','Construction deleted successfully!');
                redirect(base_url().'admin/manage-construction');  
            }
        }
        else
        {
            $this->session->set_flashdata('error','Doesnot exist!');
        }
    }
    
}