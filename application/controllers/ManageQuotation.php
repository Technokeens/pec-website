<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ManageQuotation extends CI_Controller 
{   
    public function __construct()
    {
        parent::__construct();
        $this->load->model('common');
        $this->load->model('quotationModel');
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

   
    
    public function manage_quotation()
    {   
        $this->common->check_auth(); 
        $data['title']='Manage Quotation';
        $data['middle_content']="quotation/manage_quotation";
        $this->load->view('admin/admin-template',$data);
        
    }

    public function quotation_list()
    {
        $this->common->check_auth();
        $sr_no              = "";
        $name          = "";
        $message       = "";
        $email       = "";
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
        // $fList = $this->common->fetchdata('*', 'tbl_quotation','WHERE delete_status="0"');
        $fList = $this->quotationModel->get_quotation_list($_POST);
        $totalRecordwithFilter = $this->quotationModel->get_quotation_list_count($_POST);
        $totalRecords          = $totalRecordwithFilter;

        if (!empty($fList))
        {
            $j=1;
            foreach ($fList as $val)
            {  
                $sr_no              = $j;
                $name               = (!empty($val['name'])) ? ucfirst($val['name']) : ''; 
                $message  = (!empty($val['message'])) ? $val['message'] : ''; 
                $email       = (!empty($val['email'])) ? $val['email'] : ''; 
                $created_on         = (!empty($val['created_on'])) ? date('Y-m-d',strtotime($val['created_on'])) : '';

                $view = '<a class="btn btn-sm btn-info show-tooltip" href="'.base_url().'admin/view-quotation/'.base64_encode($val['id']).'" title="View"> View</a>';

                $action='<td>
                            '.$view.'
                        </td>';

                $j++;   
                $data[] = array(
                    'sr_no'                 => $sr_no,
                    'name'             => $name,
                    'email'            => $email,
                    'message'          => $message, 
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

    public function view_quotation($id=0)
    {   
        $this->common->check_auth(); 
        $id=base64_decode($id);
        $data['detail']=$this->common->fetchsingledata('*','tbl_quotation',' WHERE id='.$id);
        $data['title']='View quotation';
        $data['middle_content']="quotation/view_quotation";
        $this->load->view('admin/admin-template',$data);
        
    }

    public function delete_quotation($id=0)
    {
        $id=base64_decode($id);
        
        if($this->common->db_delete('tbl_quotation','id',$id))
        {
            $this->session->set_flashdata('success','quotation deleted successfully!');
            redirect(base_url().'admin/manage-quotation');  
        }else
        {
            $this->session->set_flashdata('error','Try again');
            redirect('admin/manage-quotation'); 
        }
        
    }
    
}