<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Home extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        
        // if(!isset($_SESSION['user_logged'])){
        //     $this->session->set_flashdata('error','connecter !!!!');
        //     redirect('auth/login');
        // }

    }
    
 
    function index()
    {
        $data['_view'] = 'home';
        $this->load->view('layouts/main',$data);
        
    }
}
