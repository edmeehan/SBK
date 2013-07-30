<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Account_model extends CI_Model
{
    public function tot_acct()
    {
        return $this->db->count_all_results('account');
    }
    /**
     * Get all accounts or accounts by type or all accounts grouped by type
     *
     * @author Yorick Peterse - PyroCMS Dev Team
     * @access public
     * @return mixed
     */
    public function get_acct($typeID = FALSE)
    {
        if($typeID === FALSE)
        {
            $query = $this->db->get('account');
            return $query->result();
        }
        elseif($typeID === TRUE)
        {
            $acctTypes = $this->get_type();
            
            foreach ($acctTypes as $type)
            {
                $query = $this->db->get_where('account', array('type_id' => $type->id));
                $type->accts = $query->result();
            }
            
            return $acctTypes;
        }
    }
    
    public function get_type()
    {
        $query = $this->db->get('account_type');
        return $query->result();
    }
    
    public function add_acct($data)
    {
        
    }
    
    public function edit_acct($data,$acctID)
    {
        
    }
    
    public function delete_acct($acctID)
    {
        
    }
    
}

/* End of file account_model.php */
/* Location: ./application/models/account_model.php */