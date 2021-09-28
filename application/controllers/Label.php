<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Label extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Label_model');
        $this->load->model('Certificat_model');
        $this->load->model('Montant_item_model');
 
        if(!isset($_SESSION['user_logged'])){
            $this->session->set_flashdata('error','connecter !!!!');
            redirect('auth/login');
        }

    } 

    /*
     * Listing of labels
     */
    // function index()
    // {
    //     $data['labels'] = $this->Label_model->get_all_labels();
        
    //     $data['_view'] = 'label/index';
    //     $this->load->view('layouts/main',$data);
    // }

    /*
     * Adding a new label
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'label_text' => $this->input->post('label_text'),
				'certif_id' => $this->input->post('certif_id'),
            );
            
            $label_id = $this->Label_model->add_label($params);

            redirect('/');
        }
        else
        {            
            $data['certificats'] = $this->Certificat_model->get_all_certificats();

            $data['_view'] = 'label/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a label
     */
    function edit($id_label)
    {   
        // check if the label exists before trying to edit it
        $data['label'] = $this->Label_model->get_label($id_label); 
        $data['certificat'] = $this->Certificat_model->get_certificat($this->Label_model->get_label($id_label)['certif_id']);

        if(isset($data['label']['id_label']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'label_text' => $this->input->post('label_text'),
					'certif_id' => $this->input->post('certif_id'),
                );

                $this->Label_model->update_label($id_label,$params);    
                $label = $this->Label_model->get_label($id_label);        
                redirect('certificat/detail/'.$label['certif_id']);            }
            else
            {
                $data['certificats'] = $this->Certificat_model->get_all_certificats();

                $data['_view'] = 'label/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The label you are trying to edit does not exist.');
    } 

    /*
     * Deleting label
     */
    function remove($id_label)
    {
        $label = $this->Label_model->get_label($id_label);

        // check if the label exists before trying to delete it
        if(isset($label['id_label']))
        {
            $this->Label_model->delete_label($id_label);
            redirect('certificat/detail/'.$label['certif_id']);
        }
        else
            show_error('The label you are trying to delete does not exist.');
    }
    
}
