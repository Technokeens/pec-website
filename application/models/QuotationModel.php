<?php

/* * ***
 * Version: V1.0.1
 *
 * Description of Setting model
 *
 * @author Technokeens Team
 *
 * @email  info@technokeens.com
 *
 * *** */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class QuotationModel extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function get_quotation_list($post)
    {
        $start = $post['start'];
        $limit = $post['length'];
        
        if ($limit !== null && $start !== null && $limit !== "-1") 
        {
            $this->db->limit($limit, $start);
        }
        if (!empty($post) ) {
            $this->getFilter($post);
        }
        $this->db->select('
                tbl_quotation.*,
            ');
        $this->db->order_by('tbl_quotation.id', 'desc');
        $query = $this->db->get('tbl_quotation');
        return $query->result_array();
    }
    public function get_quotation_list_count($post)
    {
        
        if (!empty($post) ) {
            $this->getFilter($post);
        }
        $this->db->select('
                tbl_quotation.*,
            ');
        $this->db->order_by('tbl_quotation.id', 'desc');
        $query = $this->db->get('tbl_quotation');
        $result = $query->result_array();
        if($result){
            return count($result);
        }else{
            return "0";
        }
    }


    private function getFilter($post)
    {
        $columnIndex     =   $post['order'][0]['column']; // Column index
        $columnName      =   $post['columns'][$columnIndex]['data']; // Column name
        $columnSortOrder =   $post['order'][0]['dir'];

        if($columnName == "name"){
            $this->db->order_by('tbl_quotation.name',$columnSortOrder);
        }
        else if($columnName == "message"){
            $this->db->order_by('tbl_quotation.message',$columnSortOrder);
        }
        else if($columnName == "email"){
            $this->db->order_by('tbl_quotation.email',$columnSortOrder);
        }
        else if($columnName == "created_on")
        {
            $this->db->order_by('tbl_quotation.created_on',$columnSortOrder);
        }
        else{
            $this->db->order_by('tbl_quotation.id',$columnSortOrder);
        }

        if ($post['search']['value']!=""){
            $searchValue = $post['search']['value'];
            $searchQuery ="(tbl_quotation.name LIKE '%".$searchValue."%' OR tbl_quotation.message LIKE '%".$searchValue."%' OR tbl_quotation.email LIKE '%".$searchValue."%' OR tbl_quotation.created_on LIKE '%".$searchValue."%')";
            $this->db->where($searchQuery);
        }
    }

}
?>