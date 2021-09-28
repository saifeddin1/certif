<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Certificat extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Certificat_model');
        $this->load->model('User_model');
        $this->load->model('Label_model');
        $this->load->model('History_model');

        if(!isset($_SESSION['user_logged'])){
            $this->session->set_flashdata('error','connecter !!!!');
            redirect('user/login');
        }

    } 

    /*
     * Listing of certificats
     */
    function index()
    {
        $data['certificats'] = $this->Certificat_model->get_all_certificats();

        $data['_view'] = 'certificat/index';
        $this->load->view('layouts/main',$data);
    }

    function pdf($idcertif)
    {
        $this->load->helper('pdf_helper');
        $data['certificat'] = $this->Certificat_model->get_certificat($idcertif);
        $data['items'] =  $this->Certificat_model->get_certif_labels($idcertif);
        $data['labels'] = $this->Label_model->get_all_labels();
        $data['user'] = $this->User_model->get_user($data['certificat']['user_id']);
        $data['benificiare'] = $this->User_model->get_benificiare($data['user']['userid']);
        $this->load->view('pdfreport', $data);
    }

    function detail($idcertif)
    {
        $data['certificat'] = $this->Certificat_model->get_certificat($idcertif);
        $data['items'] =  $this->Certificat_model->get_certif_labels($idcertif);

        $data['total_brut'] = 0;
        $data['total_net'] = 0;
        $data['total_retenue'] = 0;
        foreach($data['items'] as $item){
            $data['total_brut'] += $item['montant_brut'];
            $data['total_net'] += $item['retenue'];
            $data['total_retenue'] += $item['montant_net'];
        }
        $data['labels'] = $this->Certificat_model->get_certificate_labels($idcertif);
        
        $data['user'] = $this->Certificat_model->get_certif_user($idcertif);
        $data['benificiare'] = $this->User_model->get_benificiare($data['certificat']['user_id']);
        $data['benificiares'] = $this->User_model->get_benificiares();
        // $data['history_id'] = $this->History_model->get_certif_history($idcertif)['id_history'];

        $data['_view'] = 'certificat/detail';
        $this->load->view('layouts/main',$data);
    }

    function get_labels($idcertif)
    {
        $labels = $this->Certificat_model->get_certificate_labels($idcertif);
        
        return $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode(array(
                    'items' => $labels,
             )));
    }

    /*
     * Adding a new certificat
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'title' => $this->input->post('titre'),
				'dateeffectuee' => $this->input->post('dateeffectuee'),
				'periode' => $this->input->post('periode'),
				'user_id' => $this->input->post('user_id'),
            );
            
            $certificat_id = $this->Certificat_model->add_certificat($params);

            $count = $_POST['count'];
            for($i=0;$i<=$count;$i++){

                $params2 = array(
                    'label_text' =>$this->input->post('label_text'.$i),
                    'certif_id' => $certificat_id
                );
                    $labeil_id = $this->Label_model->add_label($params2);

                }
            
             // $history_id = $this->History_model->add_history(array('user_id'=>$params['user_id'], 
            //                                                         'certif_id'=>$certificat_id, 
            //                                                         'date_rempli'=>date('Y-m-d H:i:s')));
            
            redirect('/');
        }
        else
        {          
            $data['benificiares'] = $this->User_model->get_benificiares();
  
            $data['users'] = $this->User_model->get_all_users();

            $data['_view'] = 'certificat/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a certificat
     */
    function edit($idcertif)
    {   
        // check if the certificat exists before trying to edit it
        $data['certificat'] = $this->Certificat_model->get_certificat($idcertif);
        
        if(isset($data['certificat']['idcertif']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'title' => $this->input->post('titre'),
					'dateeffectuee' => $this->input->post('dateeffectuee'),
					'periode' => $this->input->post('periode'),
					'user_id' => $this->input->post('user_id'),
                );
                $history_id = $this->History_model->get_certif_history($idcertif)['id_history'];

                $this->Certificat_model->update_certificat($idcertif,$params);     
                
                $this->History_model->update_history($history_id, array('user_id'=>$params['user_id'], 
                                                                    'certif_id'=>$certificat_id, 
                                                                    'date_rempli'=>date('Y-m-d H:i:s')));       
                redirect('/');
            }
            else
            {
                $data['benificiares'] = $this->User_model->get_benificiares();

                $data['users'] = $this->User_model->get_all_users();

                $data['_view'] = 'certificat/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The certificat you are trying to edit does not exist.');
    } 

    /*
     * Deleting certificat
     */
    function remove($idcertif)
    {
        $certificat = $this->Certificat_model->get_certificat($idcertif);
        $history_id = $this->History_model->get_certif_history($idcertif)['id_history'];
        // check if the certificat exists before trying to delete it
        if(isset($certificat['idcertif']))
        {
            $this->Certificat_model->delete_certificat($idcertif);
            $this->History_model->delete_history($history_id);
            
            redirect('/');
        }
        else
            show_error('The certificat you are trying to delete does not exist.');
    }
    
}
