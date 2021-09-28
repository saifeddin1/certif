<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class History extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('History_model');
        $this->load->model('Certificat_model');
        $this->load->model('User_model');
        $this->load->model('Montant_item_model');
        $this->load->model('Label_model');

        if(!isset($_SESSION['user_logged'])){
            $this->session->set_flashdata('error','connecter !!!!');
            redirect('auth/login');
        }

    } 

    /*
     * Listing of certificats
     */
    function index()
    {
         
    }

    function pdf($id_history)
    {
        $this->load->helper('pdf_helper');
        $data['history'] = $this->History_model->get_history($id_history);
        $data['certificat'] = $this->Certificat_model->get_certificat($data['history']['certif_id']);
        $data['items'] =  $this->Certificat_model->get_certif_labels($data['history']['certif_id']);
        $data['total_brut'] = 0;
        $data['total_net'] = 0;
        $data['total_retenue'] = 0;
        foreach($data['items'] as $item){
            $data['total_brut'] += $item['montant_brut'];
            $data['total_net'] += $item['retenue'];
            $data['total_retenue'] += $item['montant_net'];
        }
        $data['labels'] = $this->Label_model->get_all_labels();
        $data['user'] = $_SESSION['user'];
        $data['benificiare'] = $this->History_model->get_benificiare($data['certificat']['idcertif']);
        $this->load->view('pdfreport', $data);
    }

    function detail($idcertif)
    {
       
    }

    /*
     * Adding a new certificat
     */
    function add()
    {   
        {   
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
                    'certif_id' => $this->input->post('certif_id'),
                );
                
                // $params['user_id'] = $this->Certificat_model->get_certif_user($params['certif_id'])['userid'];
                $params['user_id'] = $_SESSION['user']['userid'];

                $history_id = $this->History_model->add_history(array('user_id'=>$params['user_id'], 
                                                                        'certif_id'=>$params['certif_id'], 
                                                                        'beneficiary_id'=>$this->input->post('ben_id'), 
                                                                        'date_rempli'=>date('Y-m-d H:i:s')));
                
                $counter = $_POST['counter'];
                for($i=0;$i<=$counter;$i++){

                    $params2 = array(
                        'montant_brut' => $this->input->post('montant_brut'.$i),
                        'retenue' => $this->input->post('retenue'.$i),
                        'montant_net' => $this->input->post('montant_net'.$i),
                        'label_id' => $this->input->post('label_id'.$i),
                        'history_id'=>$history_id,
                    );
                    $montant_item_id = $this->Montant_item_model->add_montant_item($params2);

                }

                redirect('/');
            }
            else
            {            
                $data['users'] = $this->User_model->get_all_users();
                // $data['certificats'] = $this->Certificat_model->get_all_certificats();
                $data['certificats'] = $this->History_model->get_available_certifs();
                $data['benificiares'] = $this->User_model->get_benificiares();

                $data['_view'] = 'history/add';
                $this->load->view('layouts/main',$data);
            }
        }   
    }  

    /*
     * Editing a certificat
     */
    function edit($id_history)
    {   
 
    } 

    /*
     * Deleting certificat
     */
    function remove($id_history)
    {
        $hitory = $this->History_model->get_history($id_history);
         // check if the certificat exists before trying to delete it
        if(isset($hitory['id_history']))
        {
             $this->History_model->delete_history($id_history);
            
            redirect('/');
        }
        else
            show_error('The certificat you are trying to delete does not exist.');
    }
    }
    

