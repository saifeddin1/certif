<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class User_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get user by userid
     */
    function get_user($userid)
    {
        return $this->db->get_where('users',array('userid'=>$userid))->row_array();
    }
    
    /*
     * Get all users
     */
    function get_all_users()
    {
        $this->db->order_by('userid', 'desc');
        return $this->db->get('users')->result_array();
    }

    function get_benificiares($user_id)
    {
        $this->db->order_by('userid', 'desc');
        $this->db->where('is_benificiare =', TRUE);
        $this->db->where('added_by =', $user_id);
        return $this->db->get('users')->result_array();
    }
        
    /*
     * function to add new user
     */
    function add_user($params)
    {
        $this->db->insert('users',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update user
     */
    function update_user($userid,$params)
    {
        $this->db->where('userid',$userid);
        return $this->db->update('users',$params);
    }
    
    /*
     * function to delete user
     */
    function delete_user($userid)
    {
        return $this->db->delete('users',array('userid'=>$userid));
    }

    function verify_user($username, $password)
    {
        $this->db->select('userid, usertype, username, matricule, cin, nom,prenom, adress, num_etab_sec, cod_category, cod_tva, is_benificiare, date_created');
        $this->db->from('users');
        $this->db->where(array('username'=>$username, 'password'=>$password));
        return $this->db->get()->row_array();

    }
}
