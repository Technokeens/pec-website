<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ManageLead extends CI_Controller 
{   
    public function __construct()
    {
        parent::__construct();
        $this->load->model('common');
        $this->load->model('leadModel');
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

   
    
    public function manage_lead()
    {   
        $this->common->check_auth(); 
        $data['title']='Manage lead';
        $data['middle_content']="lead/manage_lead";
        $this->load->view('admin/admin-template',$data);
        
    }

    public function lead_list()
    {
        $this->common->check_auth();
        $sr_no              = "";
        $lead_name          = "";
        $lead_subject       = "";
        $lead_email       = "";
        $created_on         = "";
        $status             = "";
        $action             = "";
        $view               = "";        
        $delete             = "";

        $data = array();
        $draw               = $_POST['draw'];
        $row                = $_POST['start'];
        $rowperpage         = $_POST['length']; // Rows display per testimonial
        $columnIndex        = $_POST['order'][0]['column']; // Column index
        $columnName         = $_POST['columns'][$columnIndex]['data']; // Column name
        $columnSortOrder    = $_POST['order'][0]['dir']; // asc or desc
        $searchValue        = $_POST['search']['value']; // Search value
        // $fList = $this->common->fetchdata('*', 'tbl_leads','WHERE delete_status="0"');
        $fList = $this->leadModel->get_lead_list($_POST);
        $totalRecordwithFilter = $this->leadModel->get_lead_list_count($_POST);
        $totalRecords          = $totalRecordwithFilter;

        if (!empty($fList))
        {
            $j=1;
            foreach ($fList as $val)
            {  
                $sr_no              = $j;
                $lead_name          = (!empty($val['lead_name'])) ? ucfirst($val['lead_name']) : ''; 
                $lead_subject       = (!empty($val['lead_subject'])) ? $val['lead_subject'] : ''; 
                $lead_email       = (!empty($val['lead_email'])) ? $val['lead_email'] : ''; 
                $created_on         = (!empty($val['created_on'])) ? date('Y-m-d',strtotime($val['created_on'])) : '';

                $view = '<a class="btn btn-sm btn-info show-tooltip" href="'.base_url().'admin/view-lead/'.base64_encode($val['l_id']).'" title="View"> View</a>';
                $delete = '<a class="btn btn-sm btn-danger show-tooltip" href="'.base_url().'ManageLead/delete_lead/'.base64_encode($val['l_id']).'" title="Delete" onclick="return confirm(\'Are you sure, you want to delete this lead?\');">Delete</a>';

                $action='<td>
                            '.$view.'
                            '.$delete.'
                        </td>';

                $j++;   
                $data[] = array(
                    'sr_no'                 => $sr_no,
                    'lead_name'             => $lead_name,
                    'lead_email'            => $lead_email,
                    'lead_subject'          => $lead_subject, 
                    'created_on'            => $created_on,
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

    public function view_lead($l_id=0)
    {   
        $this->common->check_auth(); 
        $l_id=base64_decode($l_id);
        $data['detail']=$this->common->fetchsingledata('*','tbl_leads',' WHERE l_id='.$l_id);
        $data['title']='View lead';
        $data['middle_content']="lead/view_lead";
        $this->load->view('admin/admin-template',$data);
        
    }

    public function delete_lead($l_id=0)
    {
        $l_id=base64_decode($l_id);
        
        if($this->common->db_delete('tbl_leads','l_id',$l_id))
        {
            $this->session->set_flashdata('success','Lead deleted successfully!');
            redirect(base_url().'admin/manage-lead');  
        }else
        {
            $this->session->set_flashdata('error','Try again');
            redirect('admin/manage-lead'); 
        }
        
    }
    
}