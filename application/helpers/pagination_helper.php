<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

function seriespagination($url, $rowscount, $per_page, $segment = 2){
    $ci = & get_instance();
    $ci->load->library('pagination');
    $config = array();
    $config['use_page_numbers'] = TRUE;    
    $config['allow_get_array'] = TRUE;
    $config['page_query_string'] = TRUE;
    $config["base_url"] = $url;
    $config["total_rows"] = $rowscount;
    $config["per_page"] = $per_page;
    $config["uri_segment"] = $segment;
    $config['full_tag_open'] = '<ul class="pagination mb-0" id="pagination">';
    $config['full_tag_close'] = '</ul>';
    $config['num_tag_open'] = '<li class="page-item">';
    $config['num_tag_close'] = '</li>';
    $config['cur_tag_open'] = '<li class="page-item"><a class="btn-link px-1 mx-2 btn-link_active">';
    $config['cur_tag_close'] = '</a></li>';
    $config['first_link'] = 'first';
    $config['first_tag_open'] = '<a class="btn-link px-1 mx-2">';
    $config['first_tag_close'] = '</a>';
    $config['last_link'] = 'last';
    $config['anchor_class'] = 'class="btn-link px-1 mx-2"';
    $config['attributes'] = array('class' => 'btn-link px-1 mx-2 pageClass');
    $config['last_tag_close'] = '</a>';
    // $config['next_link'] = '<a href="#" class="btn-link d-inline-flex align-items-center">
    //       <svg width="7" height="11" viewBox="0 0 7 11" xmlns="http://www.w3.org/2000/svg"><use href="#icon_next_sm" /></svg>
    //     </a>';
    // $config['prev_link'] = '<a href="#" class="btn-link d-inline-flex align-items-center">
    //       <svg class="" width="7" height="11" viewBox="0 0 7 11" xmlns="http://www.w3.org/2000/svg"><use href="#icon_prev_sm" /></svg>
    //     </a>
    // ';
    $config['reuse_query_string'] = TRUE;
    $ci->pagination->initialize($config);
    return $ci->pagination->create_links();
}

function paginationProduct($url, $rowscount, $per_page, $segment = 2)
{
    
    $ci = & get_instance();
    $ci->load->library('pagination');

    $config = array();
    $config['use_page_numbers'] = TRUE;    
    $config["base_url"] = $url;
    $config["total_rows"] = $rowscount;
    $config["per_page"] = $per_page;
    $config["uri_segment"] = $segment;
    $config['full_tag_open'] = '<ul class="pagination mb-0">';
    $config['full_tag_close'] = '</ul>';
    $config['num_tag_open'] = '<li class="page-item">';
    $config['num_tag_close'] = '</li>';
    $config['cur_tag_open'] = '<a class="btn-link px-1 mx-2 btn-link_active">';
    $config['cur_tag_close'] = '</a>';
    $config['first_link'] = 'first';
    $config['first_tag_open'] = '<a class="btn-link px-1 mx-2">';
    $config['first_tag_close'] = '</a>';
    $config['last_link'] = 'last';
    $config['anchor_class'] = 'class="number"';
    $config['attributes'] = array('class' => 'pageClass');
    $config['last_tag_close'] = '</a>';
    $config['next_link'] = 'next';
    $config['prev_link'] = 'previous';
    $config['reuse_query_string'] = TRUE;
    $ci->pagination->initialize($config);
    // return $ci->pagination->create_links();
    print($ci->pagination->create_links());
}
