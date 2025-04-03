<?php

class Public_model extends CI_Model
{



    public function __construct()
    {
        parent::__construct();
    }

    public function getSeriesList($limit = null, $start = null,$big_get = null)
    {

        if ($limit !== null && $start !== null) 
        {
            $this->db->limit($limit, $start);
        }
        $this->db->select('
            count(tbl_product.p_id) as product_count,
            tbl_product_series.*,
            tbl_product.p_id,
            tbl_product.status,
            tbl_product.delete_status,
            tbl_product.series_id,
            tbl_power_rating.pr_id,
            tbl_product.power_rating as product_power_rating,
            tbl_product.power_rating as power_ids,
            tbl_product.application_id,
            tbl_product.position,
            tbl_construction.construction_title,
            tbl_product_series.construction_id,
        ');
        
        $this->db->where('tbl_product_series.status', '1');
        $this->db->where('tbl_product_series.delete_status','0');

        $this->db->join('tbl_product_series', 'tbl_product_series.ps_id = tbl_product.series_id', 'left');
        $this->db->join('tbl_power_rating', 'tbl_power_rating.pr_id = tbl_product.power_rating', 'left');
        
        $this->db->join('tbl_construction', 'tbl_construction.c_id = tbl_product_series.construction_id', 'left');
        $this->db->join('tbl_application', 'tbl_application.t_id = tbl_product.application_id', 'left');

        $this->db->where('tbl_product.status', '1');
        $this->db->where('tbl_product.delete_status','0');

        if (!empty($big_get)) 
        {
            $this->getSeriesFilter($big_get);
        } 

        $this->db->order_by('tbl_product_series.position', 'asc');
        $this->db->distinct('tbl_product.series_id');
        $this->db->group_by('tbl_product.series_id');
        $query = $this->db->get('tbl_product');
        // print_r($this->db->last_query());exit;
        return $query->result_array();
    }

    public function getSeriesList_bp($limit = null, $start = null,$big_get = null)
    {

        if ($limit !== null && $start !== null) 
        {
            $this->db->limit($limit, $start);
        }
        $this->db->select('
            count(tbl_product.p_id) as product_count,
            tbl_product_series.*,
            tbl_product.p_id,
            tbl_product.status,
            tbl_product.delete_status,
            tbl_product.series_id,
            tbl_power_rating.pr_id,
            tbl_product.power_rating as product_power_rating,
            tbl_product.power_rating as power_ids,
            tbl_product.application_id,
            tbl_product.position,
            tbl_product_series.construction_id,
        ');
        
        $this->db->where('tbl_product_series.status', '1');
        $this->db->where('tbl_product_series.delete_status','0');

        $this->db->join('tbl_product_series', 'tbl_product_series.ps_id = tbl_product.series_id', 'left');
        $this->db->join('tbl_power_rating', 'tbl_power_rating.pr_id = tbl_product.power_rating', 'left');
        
        $this->db->where('tbl_product.status', '1');
        $this->db->where('tbl_product.delete_status','0');

        if (!empty($big_get)) 
        {
            $this->getSeriesFilter($big_get);
        } 

        $this->db->order_by('tbl_product.position', 'asc');
        $this->db->distinct('tbl_product.series_id');
        $this->db->group_by('tbl_product.series_id');
        $query = $this->db->get('tbl_product');
        // print_r($this->db->last_query());exit;
        return $query->result_array();
    }
    public function seriesCount($big_get=null)
    {
        $this->db->select('
            count(tbl_product.p_id) as product_count,
            tbl_product_series.*
        ');
        
        $this->db->where('tbl_product_series.status', '1');
        $this->db->where('tbl_product_series.delete_status','0');

        $this->db->join('tbl_product_series', 'tbl_product_series.ps_id = tbl_product.series_id', 'left');
        $this->db->join('tbl_power_rating', 'tbl_power_rating.pr_id = tbl_product.power_rating', 'left');
        
        $this->db->join('tbl_construction', 'tbl_construction.c_id = tbl_product_series.construction_id', 'left');
        $this->db->join('tbl_application', 'tbl_application.t_id = tbl_product.application_id', 'left');

        $this->db->where('tbl_product.status', '1');
        $this->db->where('tbl_product.delete_status','0');

        if (!empty($big_get)) 
        {
            $this->getSeriesFilter($big_get);
        } 

        $this->db->order_by('tbl_product_series.position', 'asc');
        $this->db->distinct('tbl_product.series_id');
        $this->db->group_by('tbl_product.series_id');

        return $this->db->count_all_results('tbl_product');
    }

    public function getSeriesFilter($big_get=null)
    {
        
        if (!empty($big_get) && !empty($big_get['power'])) 
        {
            $power = explode(',', $big_get['power']);
            $this->db->group_start();
            foreach ($power as $key => $value) {
                // if($key == 0){
                //     $this->db->where('tbl_product.power_rating', $value);
                // }else{
                //     $this->db->or_where('tbl_product.power_rating', $value);
                // }
                if($key == 0){
                    $this->db->where('find_in_set("'.$value.'", tbl_product.power_rating) <> 0');
                }else{
                    $this->db->or_where('find_in_set("'.$value.'", tbl_product.power_rating) <> 0');
                }
            }
            $this->db->group_end();
        }

        if (!empty($big_get) && !empty($big_get['construction'])) 
        {
            $construction = explode(',', $big_get['construction']);
            $this->db->group_start();
            foreach ($construction as $key => $value) {
                // if($key == 0){
                //     $this->db->where('tbl_product_series.construction_id', $value);
                // }else{
                //     $this->db->or_where('tbl_product_series.construction_id', $value);
                // }
                if($key == 0){
                    $this->db->where('find_in_set("'.$value.'", tbl_product_series.construction_id) <> 0');
                }else{
                    $this->db->or_where('find_in_set("'.$value.'", tbl_product_series.construction_id) <> 0');
                }
            }
            $this->db->group_end();
        }

        if (!empty($big_get) && !empty($big_get['application'])) 
        {
            $this->db->group_start();
            $application = explode(',', $big_get['application']);
            foreach ($application as $akey => $avalue) {
                
                if($akey == 0){
                    $this->db->where('find_in_set("'.$avalue.'", tbl_product.application_id) <> 0');
                }else{
                    $this->db->or_where('find_in_set("'.$avalue.'", tbl_product.application_id) <> 0');
                }
                
            }
            $this->db->group_end();
        }

        if (!empty($big_get) && !empty($big_get['search'])) 
        {
            // if ($post['search']['value']!=""){
                $searchValue = $big_get['search'];
                $searchQuery ="(tbl_product.product_name LIKE '%".$searchValue."%' OR tbl_construction.construction_title LIKE '%".$searchValue."%' OR tbl_product_series.title LIKE '%".$searchValue."%' OR tbl_product.cross_reference LIKE '%".$searchValue."%')";
                $this->db->where($searchQuery);
            // }
        }

        //cross reference search
        if (!empty($big_get) && !empty($big_get['search_cr'])) 
        {
            $searchValue = $big_get['search_cr'];
            $searchQuery ="(tbl_product.cross_reference LIKE '%".$searchValue."%')";
            $this->db->where($searchQuery);
        }

    }


    // public function getSeriesList($limit = null, $start = null,$big_get = null)
    // {
    //     if ($limit !== null && $start !== null) 
    //     {
    //         $this->db->limit($limit, $start);
    //     }
    //     $this->db->select('*');
    //     if (!empty($big_get) || !empty($big_get['cat_id'])) 
    //     {
    //         $this->getFilter($big_get);
    //     } 
    //     $this->db->where('tbl_product_series.status', '1');
    //     $this->db->where('tbl_product_series.delete_status','0');
    //     $this->db->order_by('tbl_product_series.position', 'asc');
    //     $query = $this->db->get('tbl_product_series');
    //     return $query->result_array();
    // }

    // public function seriesCount($big_get=null)
    // {
    //     $this->db->select('*');
    //     if (!empty($big_get) || !empty($big_get['cat_id'])) 
    //     {
    //         $this->getFilter($big_get);
    //     } 
    //     $this->db->where('tbl_product_series.status', '1');
    //     $this->db->where('tbl_product_series.delete_status','0');
    //     $this->db->order_by('tbl_product_series.position', 'asc');

    //     return $this->db->count_all_results('tbl_product_series');
    // }

    private function getFilter($big_get=null){
        print_r($big_get);
    }

    /*PRODUCT TYPE PAGE*/
    public function getSeriesDetail($series_slug=null)
    {
        $this->db->select('
            tbl_product_series.*
        ');
        // $this->db->join('tbl_product_series', 'tbl_product_series.ps_id = tbl_product.series_id', 'left');
        if(!empty($series_slug)){
            $this->db->where('tbl_product_series.slug', $series_slug);
        }
        $this->db->where('tbl_product_series.status', '1');
        $this->db->where('tbl_product_series.delete_status','0');
        $query = $this->db->get('tbl_product_series');
        $result1= $query->row_array();
        return $result1;
    }
    public function getProductList($limit = null, $start = null,$big_get = null,$series_slug=null)
    {
        if ($limit !== null && $start !== null) 
        {
            $this->db->limit($limit, $start);
        }
        $this->db->select('
            tbl_product_series.ps_id,
            tbl_product_series.construction_id,
            tbl_product.product_name,
            tbl_product.p_id,
            tbl_product.slug,
            tbl_product.power_rating,
            tbl_product.min_resistance,
            tbl_product.max_resistance,
            tbl_product.dimension_height,
            tbl_product.dimension_width,
            tbl_power_rating.power_rating as product_power_rating,
            tbl_product.power_rating as power_ids,
            tbl_construction.construction_title,
            tbl_product_series.construction_id,
        ');
        $this->db->join('tbl_product_series', 'tbl_product_series.ps_id = tbl_product.series_id', 'inner');
        $this->db->join('tbl_power_rating', 'tbl_power_rating.pr_id = tbl_product.power_rating', 'inner');

        $this->db->join('tbl_construction', 'tbl_construction.c_id = tbl_product_series.construction_id', 'left');
        // $this->db->join('tbl_construction', 'find_in_set(tbl_construction.c_id,tbl_product_series.construction_id)<> 0', 'inner');

        if(!empty($series_slug)){
            $this->db->where('tbl_product_series.slug', $series_slug);
        }
        $this->db->where('tbl_product.status', '1');
        $this->db->where('tbl_product.delete_status','0');

        if (!empty($big_get)) 
        {
            $this->getSeriesFilter($big_get);
        } 

        $this->db->order_by('tbl_product.position', 'asc');
        $query = $this->db->get('tbl_product');
        // print_r($this->db->last_query());exit;
        return $query->result_array();
    }

    public function productCount($big_get=null,$series_slug=null)
    {
         $this->db->select('
            tbl_product_series.ps_id,
            tbl_product_series.construction_id,
            tbl_product.product_name,
            tbl_product.p_id,
            tbl_product.slug,
            tbl_product.power_rating,
            tbl_product.min_resistance,
            tbl_product.max_resistance,
            tbl_product.dimension_height,
            tbl_product.dimension_width,
            tbl_power_rating.power_rating as product_power_rating,
            tbl_product.power_rating as power_ids,
            tbl_construction.construction_title,
            tbl_product_series.construction_id,
        ');
        $this->db->join('tbl_product_series', 'tbl_product_series.ps_id = tbl_product.series_id', 'inner');
        $this->db->join('tbl_power_rating', 'tbl_power_rating.pr_id = tbl_product.power_rating', 'inner');

        $this->db->join('tbl_construction', 'tbl_construction.c_id = tbl_product_series.construction_id', 'left');

        if(!empty($series_slug)){
            $this->db->where('tbl_product_series.slug', $series_slug);
        }
        $this->db->where('tbl_product.status', '1');
        $this->db->where('tbl_product.delete_status','0');

        if (!empty($big_get)) 
        {
            $this->getSeriesFilter($big_get);
        } 

        $this->db->order_by('tbl_product.position', 'asc');
        // $query = $this->db->get('tbl_product');
        return $this->db->count_all_results('tbl_product');
    }

    public function getProductDetail($product_slug=null)
    {
        $this->db->select('
            tbl_product_series.ps_id,
            tbl_product_series.construction_id,
            tbl_product_series.title,
            tbl_product_series.file_folder,
            tbl_product_series.series_image,
            tbl_product_series.short_description,
            tbl_product_series.slug as series_slug,
            tbl_product.*,
            tbl_power_rating.power_rating as product_power_rating,
            tbl_product.power_rating as power_ids
        ');
        $this->db->join('tbl_product_series', 'tbl_product_series.ps_id = tbl_product.series_id', 'inner');
        $this->db->join('tbl_power_rating', 'tbl_power_rating.pr_id = tbl_product.power_rating', 'inner');
        // $this->db->join('tbl_construction', 'tbl_construction.c_id = tbl_product_series.construction_id', 'inner');
        if(!empty($product_slug)){
            $this->db->where('tbl_product.slug', $product_slug);
        }
        $this->db->where('tbl_product.status', '1');
        $this->db->where('tbl_product.delete_status','0');

        // $this->db->where('tbl_construction.status', '1');
        // $this->db->where('tbl_construction.delete_status','0');

        $this->db->where('tbl_product_series.status', '1');
        $this->db->where('tbl_product_series.delete_status','0');
        
        $query = $this->db->get('tbl_product');
        $result1= $query->row_array();
        return $result1;
    }

    public function application_related_series($application_id)
    {
        $this->db->select('
            count(tbl_product.p_id) as product_count,
            tbl_product_series.*,
            tbl_product.p_id,
            tbl_product.status,
            tbl_product.delete_status,
            tbl_product.series_id,
            tbl_product.power_rating as product_power_rating,
            tbl_product.application_id,
            tbl_product.position,
            tbl_product_series.construction_id,
        ');
        
        $this->db->where('tbl_product_series.status', '1');
        $this->db->where('tbl_product_series.delete_status','0');

        $this->db->join('tbl_product_series', 'tbl_product_series.ps_id = tbl_product.series_id', 'left');
        // $this->db->join('tbl_power_rating', 'tbl_power_rating.pr_id = tbl_product.power_rating', 'left');
        
        $this->db->where('tbl_product.status', '1');
        $this->db->where('tbl_product.delete_status','0');

        if (!empty($application_id)) 
        {
            $this->db->where('find_in_set("'.$application_id.'", tbl_product.application_id) <> 0');
        }

        $this->db->order_by('tbl_product.position', 'asc');
        $this->db->distinct('tbl_product.series_id');
        $this->db->group_by('tbl_product.series_id');
        $query = $this->db->get('tbl_product');
        // print_r($this->db->last_query());exit;
        return $query->result_array();
    }

    public function productCountFilter($name=null,$id=null,$big_get=null){
        $this->db->select('
            count(tbl_product.p_id) as product_count,
            tbl_product_series.*,
            tbl_product.p_id,
            tbl_product.status,
            tbl_product.delete_status,
            tbl_product.series_id,
            tbl_power_rating.pr_id,
            tbl_product.power_rating as product_power_rating,
            tbl_product.application_id,
            tbl_product.position,
            tbl_product_series.construction_id,
        ');
        
        $this->db->where('tbl_product_series.status', '1');
        $this->db->where('tbl_product_series.delete_status','0');

        $this->db->join('tbl_product_series', 'tbl_product_series.ps_id = tbl_product.series_id', 'left');
        $this->db->join('tbl_power_rating', 'tbl_power_rating.pr_id = tbl_product.power_rating', 'left');
        
        $this->db->join('tbl_construction', 'tbl_construction.c_id = tbl_product_series.construction_id', 'left');
        $this->db->join('tbl_application', 'tbl_application.t_id = tbl_product.application_id', 'left');

        if($name == 'application'){
            $this->db->where('find_in_set("'.$id.'", tbl_product.application_id) <> 0');
        }else{
            if (!empty($big_get) && !empty($big_get['application'])) 
            {
                $application = explode(',', $big_get['application']);
                $this->db->group_start();
                foreach ($application as $akey => $avalue) {
                    if($akey == 0){
                        $this->db->where('find_in_set("'.$avalue.'", tbl_product.application_id) <> 0');
                    }else{
                        $this->db->or_where('find_in_set("'.$avalue.'", tbl_product.application_id) <> 0');
                    }
                    
                }
                $this->db->group_end();
            }
        }

        if($name == 'construction'){
            $this->db->where('find_in_set("'.$id.'", tbl_product_series.construction_id) <> 0');
        }else{
            if (!empty($big_get) && !empty($big_get['construction'])) 
            {
                $construction = explode(',', $big_get['construction']);
                $this->db->group_start();
                foreach ($construction as $key => $value) {
                    if($key == 0){
                        $this->db->where('find_in_set("'.$value.'", tbl_product_series.construction_id) <> 0');
                    }else{
                        $this->db->or_where('find_in_set("'.$value.'", tbl_product_series.construction_id) <> 0');
                    }
                    
                }
                $this->db->group_end();
            }
        }

        // if($name == 'construction'){
        //     $this->db->where('tbl_product_series.construction_id',$id);
        // }else{
        //     if (!empty($big_get) && !empty($big_get['construction'])) 
        //     {
        //         $construction = explode(',', $big_get['construction']);
        //         $this->db->group_start();
        //         foreach ($construction as $key => $value) {
        //             if($key == 0){
        //                 $this->db->where('tbl_product_series.construction_id', $value);
        //             }else{
        //                 $this->db->or_where('tbl_product_series.construction_id', $value);
        //             }
                    
        //         }
        //         $this->db->group_end();
        //     }
        // }

        if($name == 'power_rating'){
             // $this->db->where('tbl_product.power_rating',$id);
            $this->db->where('find_in_set("'.$id.'", tbl_product.power_rating) <> 0');
        }else
        {
            if (!empty($big_get) && !empty($big_get['power'])) 
            {
                $power = explode(',', $big_get['power']);
                $this->db->group_start();
                foreach ($power as $key => $value) {
                    // if($key == 0){
                    //     $this->db->where('tbl_product.power_rating', $value);
                    // }else{
                    //     $this->db->or_where('tbl_product.power_rating', $value);
                    // }
                    if($key == 0){
                        $this->db->where('find_in_set("'.$value.'", tbl_product.power_rating) <> 0');
                    }else{
                        $this->db->or_where('find_in_set("'.$value.'", tbl_product.power_rating) <> 0');
                    }
                }
                $this->db->group_end();
            }  
        }
        

        $this->db->where('tbl_product.status', '1');
        $this->db->where('tbl_product.delete_status','0');

        $this->db->order_by('tbl_product.position', 'asc');
        $this->db->distinct('tbl_product.p_id');
        // $this->db->group_by('tbl_product.series_id');
        $query = $this->db->get('tbl_product');
        // print_r($this->db->last_query());exit;
        return $query->row_array();
        // return $this->db->count_all_results('tbl_product');
    }

   

    
}
