<?php 
 
class Auth extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');


        }

    function register(){
        if(isset($_POST) && count($_POST) > 0) {
            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
 
            if($this->form_validation->run() == TRUE){
                $params = array(
					'usertype' => $this->input->post('usertype'),
					'matricule' => $this->input->post('matricule'),
					'cin' => $this->input->post('cin'),
					'nom' => $this->input->post('nom'),
					'prenom' => $this->input->post('prenom'),
					'username' => $this->input->post('username'),
					'password' => sha1($this->input->post('password')),
                    'adress' => $this->input->post('adress'),
					'num_etab_sec' => $this->input->post('num_etab_sec'),
					'cod_category' => $this->input->post('cod_category'),
					'cod_tva' => $this->input->post('cod_tva'),
                    'added_by' => (isset($_SESSION['user']['userid'])?$_SESSION['user']['userid']:1),
                    'date_created' => date('Y-m-d'),
                );

                $user_id = $this->User_model->add_user($params);
                $this->session->set_flashdata("success","Votre compte a été bien crée. Vous pouvez vous connecter.");
                redirect('auth/login');
            }


        }
        if(isset($_SESSION['user_logged'])){
            redirect('dashboard');
        }
        $data['_view'] = 'register';
        $this->load->view('layouts/main', $data);
    }

    function login(){
        if(isset($_POST) && count($_POST) > 0) {
            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');

            if($this->form_validation->run() == TRUE){
                $username = $this->input->post('username');
                $password = sha1($this->input->post('password'));
                $user = $this->User_model->verify_user($username, $password);
                if($user){
                    $this->session->set_flashdata("success","Vous etes connecté(e).");
                    $_SESSION['user_logged'] = TRUE;
                    $_SESSION['user'] = $user;
                    redirect('dashboard');

                }else{
                    $this->session->set_flashdata("error","Pas de compte.");
                    redirect('auth/login');

                }
            }
        
        }
        if(isset($_SESSION['user_logged'])){
            redirect('dashboard');
        }
        $data['_view'] = 'login';
        $this->load->view('layouts/main', $data);
    }

    function logout() 
    {
        $this->session->sess_destroy();
        redirect('auth/login', "refresh");

    }
}