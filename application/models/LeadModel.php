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

class LeadModel extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function get_lead_list($post)
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
                tbl_leads.*,
            ');
        $this->db->order_by('tbl_leads.l_id', 'desc');
        $query = $this->db->get('tbl_leads');
        return $query->result_array();
    }
    public function get_lead_list_count($post)
    {
        
        if (!empty($post) ) {
            $this->getFilter($post);
        }
        $this->db->select('
                tbl_leads.*,
            ');
        $this->db->order_by('tbl_leads.l_id', 'desc');
        $query = $this->db->get('tbl_leads');
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

        if($columnName == "lead_name"){
            $this->db->order_by('tbl_leads.lead_name',$columnSortOrder);
        }
        else if($columnName == "lead_subject"){
            $this->db->order_by('tbl_leads.lead_subject',$columnSortOrder);
        }
        else if($columnName == "lead_email"){
            $this->db->order_by('tbl_leads.lead_email',$columnSortOrder);
        }
        else if($columnName == "created_on")
        {
            $this->db->order_by('tbl_leads.created_on',$columnSortOrder);
        }
        else{
            $this->db->order_by('tbl_leads.l_id',$columnSortOrder);
        }

        if ($post['search']['value']!=""){
            $searchValue = $post['search']['value'];
            $searchQuery ="(tbl_leads.lead_name LIKE '%".$searchValue."%' OR tbl_leads.lead_subject LIKE '%".$searchValue."%' OR tbl_leads.lead_email LIKE '%".$searchValue."%' OR tbl_leads.created_on LIKE '%".$searchValue."%')";
            $this->db->where($searchQuery);
        }
    }

}
?>