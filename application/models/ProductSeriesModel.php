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

class ProductSeriesModel extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function get_series_list($post)
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
                tbl_product_series.*,
                tbl_construction.construction_title,
            ');
        $this->db->join('tbl_construction', 'tbl_construction.c_id = tbl_product_series.construction_id', 'left');
        $this->db->where('tbl_product_series.delete_status', "0");
        $this->db->order_by('tbl_product_series.ps_id', 'desc');
        $query = $this->db->get('tbl_product_series');
        return $query->result_array();
    }
    public function get_series_list_count($post)
    {
        
        if (!empty($post) ) {
            $this->getFilter($post);
        }
        $this->db->select('
                tbl_product_series.*,
                tbl_construction.construction_title,
            ');
        $this->db->join('tbl_construction', 'tbl_construction.c_id = tbl_product_series.construction_id', 'left');
        $this->db->where('tbl_product_series.delete_status', "0");
        $this->db->order_by('tbl_product_series.ps_id', 'desc');
        $query = $this->db->get('tbl_product_series');
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

        if($columnName == "status"){
            $this->db->order_by('tbl_product_series.status',$columnSortOrder);
        }else if($columnName == "construction_title"){
             $this->db->order_by('tbl_construction.construction_title',$columnSortOrder);
        }
        else if($columnName == "title")
        {
            $this->db->order_by('tbl_product_series.title',$columnSortOrder);
        }
        else{
            $this->db->order_by('tbl_product_series.ps_id',$columnSortOrder);
        }

        if ($post['search']['value']!=""){
            $searchValue = $post['search']['value'];
            $searchQuery ="(tbl_product_series.title LIKE '%".$searchValue."%' OR tbl_construction.construction_title LIKE '%".$searchValue."%' OR tbl_product_series.status LIKE '%".$searchValue."%')";
            $this->db->where($searchQuery);
        }
    }

}
?>