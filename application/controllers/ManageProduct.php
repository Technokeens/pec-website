<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ManageProduct extends CI_Controller 
{   
    public function __construct()
    {
        parent::__construct();
        $this->load->model('common');
        $this->load->model('productModel');
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
    public function add_product()
    {
        $this->common->check_auth();
        if(!empty($_POST['btn_add_product']))
        {
           
            $this->form_validation->set_rules('product_name','product_name','required');
            $this->form_validation->set_rules('description','description','required');
            $this->form_validation->set_rules('meta_title','meta_title','required');
            $this->form_validation->set_rules('meta_description','meta_description','required');
            $this->form_validation->set_rules('meta_keyword','meta_keyword','required');
            
            if($this->form_validation->run())
            {
                $slug               = "";   
                $application_id = '';
                if(!empty($_POST['application_id'])){
                    $application_id = implode(',', $_POST['application_id']);
                }
                $power_rating = '';
                if(!empty($_POST['power_rating'])){
                    $power_rating = implode(',', $_POST['power_rating']);
                }

                $related_series = '';
                if(!empty($_POST['related_series'])){
                    $related_series = implode(',', $_POST['related_series']);
                }

                $add_data=array(
                    'application_id'    => $application_id,
                    'series_id'         => (!empty($_POST['series_id'])) ? $_POST['series_id'] : '',
                    'product_name'      => (!empty($_POST['product_name'])) ? $_POST['product_name'] : '',
                    'description'       => (!empty($_POST['description'])) ? $_POST['description'] : '',
                    'position'          => (!empty($_POST['position'])) ? $_POST['position'] : '',
                    'termination_type'  => (!empty($_POST['termination_type'])) ? $_POST['termination_type'] : '',
                    'meta_keyword'      => (!empty($_POST['meta_keyword'])) ? $_POST['meta_keyword'] : '',
                    'meta_description'   => (!empty($_POST['meta_description'])) ? $_POST['meta_description'] : '',
                    'meta_title'         => (!empty($_POST['meta_title'])) ? $_POST['meta_title'] : '',
                    // 'power_rating'      => (!empty($_POST['power_rating'])) ? $_POST['power_rating'] : '',
                    'power_rating'    => $power_rating,
                    'min_resistance'    => (!empty($_POST['min_resistance'])) ? $_POST['min_resistance'] : '',
                    'max_resistance'    => (!empty($_POST['max_resistance'])) ? $_POST['max_resistance'] : '',
                    'resistor_tolerance' => (!empty($_POST['resistor_tolerance'])) ? $_POST['resistor_tolerance'] : '',
                    'tcr_ppm_c'             => (!empty($_POST['tcr_ppm_c'])) ? $_POST['tcr_ppm_c'] : '',
                    'dimension_width'       => (!empty($_POST['dimension_width'])) ? $_POST['dimension_width'] : '',
                    'dimension_height'      => (!empty($_POST['dimension_height'])) ? $_POST['dimension_height'] : '',
                    'cross_reference'       => (!empty($_POST['cross_reference'])) ? $_POST['cross_reference'] : '',
                    'related_series'        => $related_series,
                    'created_on'            => date("Y-m-d H:i:s"),
                    'created_on'            => date("Y-m-d H:i:s"),
                    'status'                => '1',
                    'slug'                  => $slug
                );
                //echo "<pre>";print_r($add_data);exit();
                if($this->common->db_add('tbl_product',$add_data))
                {
                    $id=$this->db->insert_id(); 
                    $slug = $this->common->create_seo($_POST['product_name'],$id);
                    $update_array = array('slug' => $slug);
                    $this->common->db_update('tbl_product',$update_array,'p_id',$id);

                    $this->session->set_flashdata('success','Product added successfully');  
                    redirect(base_url().'admin/manage-product');
                }
                else
                {
                    $this->session->set_flashdata('error','Failed to add product');  
                    redirect(base_url().'admin/add-product');
                }
            }
            
           
        }
        else
        {
            $data['applications'] = $this->common->fetchdata("t_id,title","tbl_application"," WHERE status='1' AND delete_status='0'");
            $data['series'] = $this->common->fetchdata("ps_id,title","tbl_product_series"," WHERE status='1' AND delete_status='0'");
            $data['power_ratings_list'] = $this->common->fetchdata("*","tbl_power_rating"," WHERE status='1' AND delete_status='0'");
            

            $data['title']='Add Product';
            $data['middle_content']="product/add_product";
            $this->load->view('admin/admin-template',$data);
        }
        
    }

    public function manage_product()
    {   
        $this->common->check_auth(); 
        $data['title']='Manage Product';
        $data['middle_content']="product/manage_product";
        $this->load->view('admin/admin-template',$data);
        
    }

    public function product_list()
    {
        $this->common->check_auth();
        $sr_no              = "";
        $product_name              = "";
        $series_name        = "";
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
        // $fList = $this->common->fetchdata('*', 'tbl_product','WHERE delete_status="0"');
        $fList = $this->productModel->get_product_list($_POST);
        $totalRecordwithFilter = $this->productModel->get_product_list_count($_POST);
        $totalRecords          = $totalRecordwithFilter;

        if (!empty($fList))
        {
            $j=1;
            foreach ($fList as $val)
            {  
                $power_rating_array = array();
                if(!empty($val['power_id'])){
                   $explode = explode(',', $val['power_id']);
                    foreach ($explode as $key => $value) {
                        $power = $this->common->fetchsingledata('power_rating', 'tbl_power_rating',' WHERE pr_id="'.$value.'"');
                        $power_rating_array[] = $power['power_rating'];
                    }
                }

                $sr_no                      = $j;
                $product_name               = (!empty($val['product_name'])) ? $val['product_name'] : ''; 
                $series_name                = (!empty($val['series_name'])) ? $val['series_name'] : ''; 

                $power_rating               = (!empty($power_rating_array)) ? implode(', ', $power_rating_array) : '';

                if($val['status'] == 0)
                {     
                   $status = '<a class="btn btn-sm show-tooltip" href="'.base_url() .'manageProduct/change_status/1/' . base64_encode($val['p_id']).'" title="Unlock"><i class="fa fa-lock fa-2x"></i></a>';
                }
                else
                {
                    $status = '<a class="btn btn-sm show-tooltip" href="'.base_url() . 'manageProduct/change_status/0/' .base64_encode($val['p_id']).'" title="Lock"> <i class="fa fa-unlock fa-2x"></i></a>';
                }

                $edit = '<a class="btn btn-sm btn-info show-tooltip" href="'.base_url().'admin/edit-product/'.base64_encode($val['p_id']).'" title="Edit"> Edit</a>';
                $delete = '<a class="btn btn-sm btn-danger show-tooltip" href="'.base_url().'manageProduct/delete_product/'.base64_encode($val['p_id']).'" title="Delete" onclick="return confirm(\'Are you sure, you want to delete this product?\');">Delete</a>';

                $action='<td>
                            '.$edit.'
                            '.$delete.'
                        </td>';

                $j++;   
                $data[] = array(
                    'sr_no'                 => $sr_no,
                    'product_name'          => $product_name,
                    'series_name'           => $series_name, 
                    'power_rating'      => $power_rating,
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

    public function manage_archive_product()
    {   
        $this->common->check_auth();  
        $data['title']='Manage Archive Product';
        $data['middle_content']="product/manage_archive_product";
        $this->load->view('admin/admin-template',$data);
    }

    public function product_archive_list()
    {
        $this->common->check_auth();
        $sr_no              = "";
        $product_name       = "";
        $series_name        = "";
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
        // $fList = $this->common->fetchdata('*', 'tbl_product','WHERE delete_status="0"');
        $fList = $this->productModel->get_archive_product_list($_POST);
        $totalRecordwithFilter = $this->productModel->get_archive_product_list_count($_POST);
        $totalRecords          = $totalRecordwithFilter;

        if (!empty($fList))
        {
            $j=1;
            foreach ($fList as $val)
            {  
                $power_rating_array = array();
                if(!empty($val['power_id'])){
                   $explode = explode(',', $val['power_id']);
                    foreach ($explode as $key => $value) {
                        $power = $this->common->fetchsingledata('power_rating', 'tbl_power_rating',' WHERE pr_id="'.$value.'"');
                        $power_rating_array[] = $power['power_rating'];
                    }
                }

                $sr_no                      = $j;
                $product_name               = (!empty($val['product_name'])) ? $val['product_name'] : ''; 
                $series_name                = (!empty($val['series_name'])) ? $val['series_name'] : ''; 
                // $power_rating               = (!empty($val['power_rate'])) ? $val['power_rate'].'W' : '';
                $power_rating               = (!empty($power_rating_array)) ? implode(', ', $power_rating_array) : '';

                $edit = '<a class="btn btn-sm btn-success show-tooltip" href="'.base_url().'manageProduct/move_to_list/'.base64_encode($val['p_id']).'" title="Undo" onclick="return confirm(\'Are you sure, you want to undo this product?\');"> Undo</a>';

                $action='<td>
                            '.$edit.'
                        </td>';

                $j++;   
                $data[] = array(
                    'sr_no'                 => $sr_no,
                    'product_name'          => $product_name,
                    'series_name'           => $series_name, 
                    'power_rating'           => $power_rating,
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

    public function edit_product($p_id=0)
    {       
        $this->common->check_auth();
        $p_id=base64_decode($p_id);
        if(!empty($_POST['btn_edit_product']))
        {
            $this->form_validation->set_rules('product_name','product_name','required');
            $this->form_validation->set_rules('meta_title','meta_title','required');
            $this->form_validation->set_rules('meta_description','meta_description','required');
            $this->form_validation->set_rules('meta_keyword','meta_keyword','required');
            
            if($this->form_validation->run())
            {
                $slug               = $this->common->create_seo($_POST['product_name'],$p_id); 

                $application_id = '';
                if(!empty($_POST['application_id'])){
                    $application_id = implode(',', $_POST['application_id']);
                }

                $power_rating = '';
                if(!empty($_POST['power_rating'])){
                    $power_rating = implode(',', $_POST['power_rating']);
                }

                $related_series = '';
                if(!empty($_POST['related_series'])){
                    $related_series = implode(',', $_POST['related_series']);
                }
              
                $add_data=array(
                    'application_id'    => $application_id,
                    'series_id'         => (!empty($_POST['series_id'])) ? $_POST['series_id'] : '',
                    'product_name'      => (!empty($_POST['product_name'])) ? $_POST['product_name'] : '',
                    'description'       => (!empty($_POST['description'])) ? $_POST['description'] : '',
                    'position'          => (!empty($_POST['position'])) ? $_POST['position'] : '',
                    'termination_type'  => (!empty($_POST['termination_type'])) ? $_POST['termination_type'] : '',
                    'meta_keyword'      => (!empty($_POST['meta_keyword'])) ? $_POST['meta_keyword'] : '',
                    'meta_description'   => (!empty($_POST['meta_description'])) ? $_POST['meta_description'] : '',
                    'meta_title'         => (!empty($_POST['meta_title'])) ? $_POST['meta_title'] : '',
                    // 'power_rating'      => (!empty($_POST['power_rating'])) ? $_POST['power_rating'] : '',
                    'power_rating'    => $power_rating,
                    'min_resistance'    => (!empty($_POST['min_resistance'])) ? $_POST['min_resistance'] : '',
                    'max_resistance'    => (!empty($_POST['max_resistance'])) ? $_POST['max_resistance'] : '',
                    'resistor_tolerance' => (!empty($_POST['resistor_tolerance'])) ? $_POST['resistor_tolerance'] : '',
                    'tcr_ppm_c'             => (!empty($_POST['tcr_ppm_c'])) ? $_POST['tcr_ppm_c'] : '',
                    'dimension_width'       => (!empty($_POST['dimension_width'])) ? $_POST['dimension_width'] : '',
                    'dimension_height'      => (!empty($_POST['dimension_height'])) ? $_POST['dimension_height'] : '',
                    'cross_reference'       => (!empty($_POST['cross_reference'])) ? $_POST['cross_reference'] : '',
                    'related_series'        => $related_series,    
                    'created_on'            => date("Y-m-d H:i:s"),
                    'created_on'            => date("Y-m-d H:i:s"),
                    'status'                => '1',
                    'slug'                  => $slug
                );

                if($this->common->db_update('tbl_product',$add_data,'p_id',$p_id)) 
                {
                    $this->session->set_flashdata('success','Data updated successfully');  
                    redirect(base_url().'admin/manage-product'); 
                }else{
                    $this->session->set_flashdata('error','Something went wrong!');  
                    redirect(base_url().'admin/manage-product'); 
                }
               
            } 
            
        }
        $data['detail']=$this->common->fetchsingledata('*','tbl_product',' WHERE p_id='.$p_id);
        $data['applications'] = $this->common->fetchdata("t_id,title","tbl_application"," WHERE status='1' AND delete_status='0'");
        $data['series'] = $this->common->fetchdata("ps_id,title","tbl_product_series"," WHERE status='1' AND delete_status='0'");
        $data['power_ratings_list'] = $this->common->fetchdata("*","tbl_power_rating"," WHERE status='1' AND delete_status='0'");

        $data['title']='Edit Product';
        $data['middle_content']="product/edit_product";
        $this->load->view('admin/admin-template',$data);
    }

    public function change_status($stat=0,$tech_id=0)
    {
        $status=$stat;
        $p_id=base64_decode($tech_id);
        $valid_page=$this->common->numberofrecord('*','tbl_product',' WHERE p_id='.$p_id);
        if($valid_page>0)
        {
            $update_stat=array('status'=>$status);
            if($this->common->db_update('tbl_product',$update_stat,'p_id',$p_id))
            {
                $this->session->set_flashdata('success','Status changed successfully!');
                redirect(base_url().'admin/manage-product');  
            }
        }
        else
        {
            $this->session->set_flashdata('error','Product does not exist!');
        }
    }

    public function delete_product($p_id=0)
    {
        $p_id=base64_decode($p_id);
        $valid_size=$this->common->fetchsingledata('*','tbl_product',' WHERE p_id='.$p_id);
        if(!empty($valid_size))
        {
            if($this->common->db_update('tbl_product',array('delete_status'=>'1'),'p_id',$p_id))
            {
                $this->session->set_flashdata('success','Product deleted successfully!');
                redirect(base_url().'admin/manage-product');  
            }
        }
        else
        {
            $this->session->set_flashdata('error','Doesnot exist!');
        }
    }

    public function move_to_list($p_id=0)
    {
        $p_id=base64_decode($p_id);
        $valid_size=$this->common->fetchsingledata('*','tbl_product',' WHERE p_id='.$p_id);
        if(!empty($valid_size))
        {
            
            if($this->common->db_update('tbl_product',array('delete_status'=>'0'),'p_id',$p_id))
            {
                $this->session->set_flashdata('success','Product undo successfully!');
                redirect(base_url().'admin/manage-archive-product');  
            }
        }
        else
        {
            $this->session->set_flashdata('error','Doesnot exist!');
        }
    }
}