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

class ApplicationModel extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function get_application_list($post)
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
                tbl_application.*,
            ');
        $this->db->where('tbl_application.delete_status', "0");
        $this->db->order_by('tbl_application.t_id', 'desc');
        $query = $this->db->get('tbl_application');
        return $query->result_array();
    }
    public function get_application_list_count($post)
    {
        
        if (!empty($post) ) {
            $this->getFilter($post);
        }
        $this->db->select('
                tbl_application.*,
            ');
        $this->db->where('tbl_application.delete_status', "0");
        $this->db->order_by('tbl_application.t_id', 'desc');
        $query = $this->db->get('tbl_application');
        $result = $query->result_array();
        if($result){
            return count($result);
        }else{
            return "0";
        }
    }

    /*ARCHIVE LIST START*/
    public function get_archive_application_list($post)
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
                tbl_application.*,
            ');
        $this->db->where('tbl_application.delete_status', "1");
        $this->db->order_by('tbl_application.t_id', 'desc');
        $query = $this->db->get('tbl_application');
        return $query->result_array();
    }
    public function get_archive_application_list_count($post)
    {
        
        if (!empty($post) ) {
            $this->getFilter($post);
        }
        $this->db->select('
                tbl_application.*,
            ');
        $this->db->where('tbl_application.delete_status', "1");
        $this->db->order_by('tbl_application.t_id', 'desc');
        $query = $this->db->get('tbl_application');
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
            $this->db->order_by('tbl_application.status',$columnSortOrder);
        }else if($columnName == "position"){
             $this->db->order_by('tbl_application.position',$columnSortOrder);
        }
        else if($columnName == "description"){
            $this->db->order_by('tbl_application.description',$columnSortOrder);
        }
        else if($columnName == "title")
        {
            $this->db->order_by('tbl_application.title',$columnSortOrder);
        }
        else if($columnName == "short_description")
        {
            $this->db->order_by('tbl_application.short_description',$columnSortOrder);
        }
        else{
            $this->db->order_by('tbl_application.t_id',$columnSortOrder);
        }

        if ($post['search']['value']!=""){
            $searchValue = $post['search']['value'];
            $searchQuery ="(tbl_application.title LIKE '%".$searchValue."%' OR tbl_application.description LIKE '%".$searchValue."%' OR tbl_application.short_description LIKE '%".$searchValue."%' OR tbl_application.status LIKE '%".$searchValue."%')";
            $this->db->where($searchQuery);
        }
    }

}
?>