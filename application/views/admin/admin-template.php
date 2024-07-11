<?php
	$this->load->view('admin/header',$title);
	$this->load->view('admin/sidebar');
	$this->load->view('admin/'.$middle_content);
	$this->load->view('admin/footer');
?>