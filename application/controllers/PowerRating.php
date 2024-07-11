<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class PowerRating extends CI_Controller 
{   
    public function __construct()
    {
        parent::__construct();
        $this->load->model('common');
        $this->load->model('powerRatingModel');
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
    public function add_power_rating()
    {
        $this->common->check_auth();
        if(!empty($_POST['btn_add_powerrating']))
        {
            $this->form_validation->set_rules('power_rating','power_rating','required');
            // $this->form_validation->set_rules('unit','unit','required');
            
            if($this->form_validation->run())
            {
                $power_rating   = $this->input->post('power_rating',true);
                // $unit           = $this->input->post('unit',true);
                $position       = $this->input->post('position',true);
                $slug           = "";   
                $add_data=array(
                                'power_rating'          => $power_rating,
                                'unit'                  => "",
                                'position'              => $position,
                                'created_on'            => date("Y-m-d H:i:s"),
                                'status'                => '1',
                            );
                if($this->common->db_add('tbl_power_rating',$add_data))
                {
                    $id=$this->db->insert_id(); 

                    $this->session->set_flashdata('success','Power rating added successfully');  
                    redirect(base_url().'admin/manage-power-rating');
                }
                else
                {
                    $this->session->set_flashdata('error','failed to add power rating');  
                    redirect(base_url().'admin/add-manage-power-rating');
                }
            }
            
        }
        else
        {
            $data['title']='Add Power rating';
            $data['middle_content']="power_rating/add_power_rating";
            $this->load->view('admin/admin-template',$data);
        }
        
    }

    public function manage_power_rating()
    {   
        $this->common->check_auth(); 
        $data['title']='Manage Power rating';
        $data['middle_content']="power_rating/manage_power_rating";
        $this->load->view('admin/admin-template',$data);
    }

    public function power_rating_list()
    {
        $this->common->check_auth();
        $sr_no              = "";
        $power_rating              = "";
        $unit           = "";
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
        // $fList = $this->common->fetchdata('*', 'tbl_power_rating','WHERE delete_status="0"');
        $fList = $this->powerRatingModel->get_power_rating_list($_POST);
        $totalRecordwithFilter = $this->powerRatingModel->get_power_rating_list_count($_POST);
        $totalRecords          = $totalRecordwithFilter;

        if (!empty($fList))
        {
            $j=1;
            foreach ($fList as $val)
            {  
                $sr_no          = $j;
                $power_rating   = (!empty($val['power_rating'])) ? $val['power_rating'] : ''; 

                if($val['status'] == 0)
                {     
                   $status = '<a class="btn btn-sm show-tooltip" href="'.base_url() .'powerRating/change_status/1/' . base64_encode($val['pr_id']).'" title="Unlock"><i class="fa fa-lock fa-2x"></i></a>';
                }
                else
                {
                    $status = '<a class="btn btn-sm show-tooltip" href="'.base_url() . 'powerRating/change_status/0/' .base64_encode($val['pr_id']).'" title="Lock"> <i class="fa fa-unlock fa-2x"></i></a>';
                }
               


                $edit = '<a class="btn btn-sm btn-info show-tooltip" href="'.base_url().'admin/edit-power-rating/'.base64_encode($val['pr_id']).'" title="Edit"> Edit</a>';
                $delete = '<a class="btn btn-sm btn-danger show-tooltip" href="'.base_url().'powerRating/delete_power_rating/'.base64_encode($val['pr_id']).'" title="Delete" onclick="return confirm(\'Are you sure, you want to delete this power rating?\');">Delete</a>';

                $action='<td>
                            '.$edit.'
                            '.$delete.'
                        </td>';

                $j++;   
                $data[] = array(
                    'sr_no'                 => $sr_no,
                    'power_rating'          => $power_rating,
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
   
    public function edit_power_rating($pr_id=0)
    {       
        $this->common->check_auth();
        $pr_id=base64_decode($pr_id);
        if(!empty($_POST['btn_edit_power_rating']))
        {
            $this->form_validation->set_rules('power_rating','power_rating','required');
            // $this->form_validation->set_rules('unit','unit','required');
            
            if($this->form_validation->run())
            {
                $power_rating        = $this->input->post('power_rating',true);
                // $unit  = $this->input->post('unit',true);
                $position           = $this->input->post('position',true);
              
                $add_data=array(
                                'power_rating'              => $power_rating,
                                'unit'                      => "",
                                'position'                  => $position,
                                'created_on'                => date("Y-m-d H:i:s"),
                                'status'                    => '1',
                            );

                if($this->common->db_update('tbl_power_rating',$add_data,'pr_id',$pr_id)) 
                {
                    $this->session->set_flashdata('success','Data updated successfully');  
                    redirect(base_url().'admin/manage-power-rating'); 
                   
                }else{
                    $this->session->set_flashdata('error','Something went wrong!');  
                    redirect(base_url().'admin/manage-power-rating'); 
                }
                
            } 
            
        }
        $data['detail']=$this->common->fetchsingledata('*','tbl_power_rating',' WHERE pr_id='.$pr_id);

        $data['title']='Edit Power Rating';
        $data['middle_content']="power_rating/edit_power_rating";
        $this->load->view('admin/admin-template',$data);
    }

    public function change_status($stat=0,$constr_id=0)
    {
        $status=$stat;
        $pr_id=base64_decode($constr_id);
        $valid_page=$this->common->numberofrecord('*','tbl_power_rating',' WHERE pr_id='.$pr_id);
        if($valid_page>0)
        {
            $update_stat=array('status'=>$status);
            if($this->common->db_update('tbl_power_rating',$update_stat,'pr_id',$pr_id))
            {
                // $getCatgeory = $this->common->fetchdata("pr_id,cat_type","tbl_category"," WHERE constr_id='".$pr_id."'");
                // if(count($getCatgeory)>0)
                // {
                //     foreach ($getCatgeory as $cat) 
                //     {
                //         if($this->common->db_update('tbl_category',array('status'=>$status),'constr_id',$pr_id)){
                //             $this->common->db_update('tbl_series',array('status'=>$status),'capr_id',$cat['pr_id']);
                //             $this->common->db_update('tbl_model_size',array('status'=>$status),'capr_id',$cat['pr_id']);
                //         }
                //     }
                // }
                // $this->common->db_update('tbl_product',array('status'=>$status),'constr_id',$pr_id);
                // for work
                // $this->common->db_update('tbl_work',array('status'=>$status),'constr_id',$pr_id);


                $this->session->set_flashdata('success','Status changed successfully!');
                redirect(base_url().'admin/manage-power-rating');  
            }
        }
        else
        {
            $this->session->set_flashdata('error','Power rating does not exist!');
        }
    }

    public function delete_power_rating($pr_id=0)
    {
        $pr_id=base64_decode($pr_id);
        $valid_size=$this->common->fetchsingledata('*','tbl_power_rating',' WHERE pr_id='.$pr_id);
        if(!empty($valid_size))
        {
            if($this->common->db_update('tbl_power_rating',array('delete_status'=>'1'),'pr_id',$pr_id))
            {
               // $getCatgeory = $this->common->fetchdata("pr_id,cat_type","tbl_category"," WHERE constr_id='".$pr_id."'");
               //  if(count($getCatgeory)>0)
               //  {
               //      foreach ($getCatgeory as $cat) 
               //      {
               //          if($this->common->db_update('tbl_category',array('delete_status'=>'1'),'constr_id',$pr_id)){
               //              $this->common->db_update('tbl_series',array('delete_status'=>'1'),'capr_id',$cat['pr_id']);
               //              $this->common->db_update('tbl_model_size',array('delete_status'=>'1'),'capr_id',$cat['pr_id']);
               //          }
               //      }
               //  }
               //  $this->common->db_update('tbl_product',array('delete_status'=>'1'),'constr_id',$pr_id);
               //  // for work
               //  $this->common->db_update('tbl_work',array('delete_status'=>'1'),'constr_id',$pr_id);

                $this->session->set_flashdata('success','Power rating deleted successfully!');
                redirect(base_url().'admin/manage-power-rating');  
            }
        }
        else
        {
            $this->session->set_flashdata('error','Doesnot exist!');
        }
    }
    
}