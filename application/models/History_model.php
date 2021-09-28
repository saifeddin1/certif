<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class History_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get certificat by idcertif
     */
    function get_history($id_history)
    {
        return $this->db->get_where('history',array('id_history'=>$id_history))->row_array();
    }

    function get_certif_history($idcertif)
    {
        $this->db->select('history.id_history');
        $this->db->from('history');
        $this->db->join('certificats', 'history.certif_id = certificats.idcertif', 'left');
        $this->db->where('history.certif_id', $idcertif);

        return $this->db->get()->row_array();
    }
 
   function get_available_certifs()
   {
    $this->db->select('certificats.*');
    $this->db->from('certificats');
    $this->db->join('history', 'certificats.idcertif = history.certif_id', 'left');
    $this->db->where('history.certif_id', NULL);

    return $this->db->get()->result_array();
   }
    
    /*
     * Get all certificats
     */
    function get_all_history()
    {
        $this->db->order_by('id_history', 'desc');
        return $this->db->get('history')->result_array();
    }
        
    /*
     * function to add new history
     */
    function add_history($params)
    {
        $this->db->insert('history',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update history
     */
    function update_history($id_history,$params)
    {
        $this->db->where('id_history',$id_history);
        return $this->db->update('history',$params);
    }
    
    /*
     * function to delete history
     */
    function delete_history($id_history)
    {
        return $this->db->delete('history',array('id_history'=>$id_history));
    }
}
