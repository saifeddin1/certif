<?php
 
class CreatePdf extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        // $this->load->model('Certificat_model');
        // $this->load->model('User_model');
    }

function pdf()
{
    $this->load->helper('pdf_helper');
    /*
        ---- ---- ---- ----
        your code here
        ---- ---- ---- ----
    */
    $this->load->view('pdfreport');
}
}