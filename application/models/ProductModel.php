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

class ProductModel extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function get_product_list($post)
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
                tbl_product.*,
                tbl_power_rating.power_rating as power_rate,
                tbl_product.power_rating as power_id,
                tbl_product_series.title as series_name,
            ');
        $this->db->join('tbl_product_series', 'tbl_product_series.ps_id = tbl_product.series_id', 'left');
        // $this->db->join('tbl_application', 'tbl_application.t_id = tbl_product.application_id', 'left');
        // $this->db->join('tbl_power_rating', 'tbl_power_rating.pr_id = tbl_product.power_rating', 'left');
        $this->db->join('tbl_power_rating', 'find_in_set(tbl_product.power_rating,tbl_power_rating.pr_id)<> 0', 'left');
        $this->db->where('tbl_product.delete_status', "0");
        $this->db->order_by('tbl_product.p_id', 'desc');
        $query = $this->db->get('tbl_product');
        return $query->result_array();
    }
    public function get_product_list_count($post)
    {
        
        if (!empty($post) ) {
            $this->getFilter($post);
        }
        $this->db->select('
                tbl_product.*,
                tbl_power_rating.power_rating as power_rate,
                tbl_product.power_rating as power_id,
                tbl_product_series.title as series_name
            ');
        $this->db->join('tbl_product_series', 'tbl_product_series.ps_id = tbl_product.series_id', 'left');
        // $this->db->join('tbl_application', 'tbl_application.t_id = tbl_product.application_id', 'left');
        // $this->db->join('tbl_power_rating', 'tbl_power_rating.pr_id = tbl_product.power_rating', 'left');
        $this->db->join('tbl_power_rating', 'find_in_set(tbl_product.power_rating,tbl_power_rating.pr_id)<> 0', 'left');
        $this->db->where('tbl_product.delete_status', "0");
        $this->db->order_by('tbl_product.p_id', 'desc');
        $query = $this->db->get('tbl_product');
        $result = $query->result_array();
        if($result){
            return count($result);
        }else{
            return "0";
        }
    }

    /*ARCHIVE LIST START*/
    public function get_archive_product_list($post)
    {
        $start = $post['start'];
        $limit = $post['length'];
        
        if (!empty($post) ) {
            $this->getFilter($post);
        }

        $this->db->select('
                tbl_product.*,
                tbl_power_rating.power_rating as power_rate,
                tbl_product.power_rating as power_id,
                tbl_product_series.title as series_name,
            ');
        $this->db->join('tbl_product_series', 'tbl_product_series.ps_id = tbl_product.series_id', 'left');
        // $this->db->join('tbl_application', 'tbl_application.t_id = tbl_product.application_id', 'left');
        // $this->db->join('tbl_power_rating', 'tbl_power_rating.pr_id = tbl_product.power_rating', 'left');
        $this->db->join('tbl_power_rating', 'find_in_set(tbl_product.power_rating,tbl_power_rating.pr_id)<> 0', 'left');
        $this->db->where('tbl_product.delete_status', "1");
        $this->db->order_by('tbl_product.p_id', 'desc');
        $query = $this->db->get('tbl_product');

        return $query->result_array();
    }
    public function get_archive_product_list_count($post)
    {
        
        if (!empty($post) ) {
            $this->getFilter($post);
        }
        $this->db->select('
                tbl_product.*,
                tbl_power_rating.power_rating as power_rate,
                tbl_product.power_rating as power_id,
                tbl_product_series.title as series_name,
            ');
        $this->db->join('tbl_product_series', 'tbl_product_series.ps_id = tbl_product.series_id', 'left');
        // $this->db->join('tbl_application', 'tbl_application.t_id = tbl_product.application_id', 'left');
        // $this->db->join('tbl_power_rating', 'tbl_power_rating.pr_id = tbl_product.power_rating', 'left');
        $this->db->join('tbl_power_rating', 'find_in_set(tbl_product.power_rating,tbl_power_rating.pr_id)<> 0', 'left');
        $this->db->where('tbl_product.delete_status', "1");
        $this->db->order_by('tbl_product.p_id', 'desc');
        $query = $this->db->get('tbl_product');
        $result = $query->result_array();
        if($result){
            return count($result);
        }else{
            return "0";
        }
    }
    /*ARCHIVE LIST END*/

    private function getFilter($post)
    {
        $columnIndex     =   $post['order'][0]['column']; // Column index
        $columnName      =   $post['columns'][$columnIndex]['data']; // Column name
        $columnSortOrder =   $post['order'][0]['dir'];

        if($columnName == "status"){
            $this->db->order_by('tbl_product.status',$columnSortOrder);
        }
        else if($columnName == "product_name"){
            $this->db->order_by('tbl_product.product_name',$columnSortOrder);
        }
        else if($columnName == "power_rating")
        {
            $this->db->order_by('tbl_power_rating.power_rating',$columnSortOrder);
        }
        else if($columnName == "series_name")
        {
            $this->db->order_by('tbl_product_series.title',$columnSortOrder);
        }
        else{
            $this->db->order_by('tbl_product.p_id',$columnSortOrder);
        }

        if ($post['search']['value']!=""){
            $searchValue = $post['search']['value'];
            $searchQuery ="(tbl_product.product_name LIKE '%".$searchValue."%' OR tbl_power_rating.power_rating LIKE '%".$searchValue."%' OR tbl_product_series.title LIKE '%".$searchValue."%' OR tbl_product.status LIKE '%".$searchValue."%')";
            $this->db->where($searchQuery);
        }
    }

}
?>