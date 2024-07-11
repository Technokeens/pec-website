<?php

class HomeAdminModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getValueStore($key)
    {
        $query = $this->db->query("SELECT value FROM value_store WHERE thekey = '$key'");
        $img = $query->row_array();
        if(!empty($img['value'])){
            return $img['value'];
        }else{
            return "";
        }
        
    }

}

?>