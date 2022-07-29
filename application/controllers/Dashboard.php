<?php

class Dashboard extends CI_Controller{
    
function index(){ 
   

    $this->load->view('templates/header');
    $this->load->view('v_index');
    $this->load->view('templates/sidebar');
    $this->load->view('templates/footer');
}
    
}