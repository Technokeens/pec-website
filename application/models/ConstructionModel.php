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

class ConstructionModel extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function get_construction_list($post)
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
                tbl_construction.*,
            ');
        $this->db->where('tbl_construction.delete_status', "0");
        $this->db->order_by('tbl_construction.c_id', 'desc');
        $query = $this->db->get('tbl_construction');
        return $query->result_array();
    }
    public function get_construction_list_count($post)
    {
        
        if (!empty($post) ) {
            $this->getFilter($post);
        }
        $this->db->select('
                tbl_construction.*,
            ');
        $this->db->where('tbl_construction.delete_status', "0");
        $this->db->order_by('tbl_construction.c_id', 'desc');
        $query = $this->db->get('tbl_construction');
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
            $this->db->order_by('tbl_construction.status',$columnSortOrder);
        }else if($columnName == "position"){
             $this->db->order_by('tbl_construction.position',$columnSortOrder);
        }
        else if($columnName == "title")
        {
            $this->db->order_by('tbl_construction.construction_title',$columnSortOrder);
        }
        else{
            $this->db->order_by('tbl_construction.c_id',$columnSortOrder);
        }

        if ($post['search']['value']!=""){
            $searchValue = $post['search']['value'];
            $searchQuery ="(tbl_construction.construction_title LIKE '%".$searchValue."%' OR tbl_construction.position LIKE '%".$searchValue."%' OR tbl_construction.status LIKE '%".$searchValue."%')";
            $this->db->where($searchQuery);
        }
    }

}
?>