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

class EventModel extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function get_event_list($post)
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
                tbl_event.*,
            ');
        // $this->db->where('tbl_event.delete_status', "0");
        $this->db->order_by('tbl_event.e_id', 'desc');
        $query = $this->db->get('tbl_event');
        return $query->result_array();
    }
    public function get_event_list_count($post)
    {
        
        if (!empty($post) ) {
            $this->getFilter($post);
        }
        $this->db->select('
                tbl_event.*,
            ');
        // $this->db->where('tbl_event.delete_status', "0");
        $this->db->order_by('tbl_event.e_id', 'desc');
        $query = $this->db->get('tbl_event');
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
            $this->db->order_by('tbl_event.status',$columnSortOrder);
        }
        else if($columnName == "description"){
            $this->db->order_by('tbl_event.description',$columnSortOrder);
        }
        else if($columnName == "title")
        {
            $this->db->order_by('tbl_event.title',$columnSortOrder);
        }
        else{
            $this->db->order_by('tbl_event.e_id',$columnSortOrder);
        }

        if ($post['search']['value']!=""){
            $searchValue = $post['search']['value'];
            $searchQuery ="(tbl_event.title LIKE '%".$searchValue."%' OR tbl_event.description LIKE '%".$searchValue."%' OR tbl_event.status LIKE '%".$searchValue."%')";
            $this->db->where($searchQuery);
        }
    }

}
?>