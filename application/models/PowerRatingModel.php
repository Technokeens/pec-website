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

class PowerRatingModel extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function get_power_rating_list($post)
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
                tbl_power_rating.*,
            ');
        $this->db->where('tbl_power_rating.delete_status', "0");
        $this->db->order_by('tbl_power_rating.pr_id', 'desc');
        $query = $this->db->get('tbl_power_rating');
        return $query->result_array();
    }
    public function get_power_rating_list_count($post)
    {
        
        if (!empty($post) ) {
            $this->getFilter($post);
        }
        $this->db->select('
                tbl_power_rating.*,
            ');
        $this->db->where('tbl_power_rating.delete_status', "0");
        $this->db->order_by('tbl_power_rating.pr_id', 'desc');
        $query = $this->db->get('tbl_power_rating');
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
            $this->db->order_by('tbl_power_rating.status',$columnSortOrder);
        }else if($columnName == "position"){
             $this->db->order_by('tbl_power_rating.position',$columnSortOrder);
        }
        else if($columnName == "power_rating")
        {
            $this->db->order_by('tbl_power_rating.power_rating',$columnSortOrder);
        }
        else{
            $this->db->order_by('tbl_power_rating.pr_id',$columnSortOrder);
        }

        if ($post['search']['value']!=""){
            $searchValue = $post['search']['value'];
            $searchQuery ="(tbl_power_rating.power_rating LIKE '%".$searchValue."%' OR   tbl_power_rating.status LIKE '%".$searchValue."%')";
            $this->db->where($searchQuery);
        }
    }

}
?>