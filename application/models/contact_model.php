<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Account_model extends CI_Model
{
    public function tot_acct()
    {
        return $this->db->count_all_results('account');
    }
    /**
     * Get all accounts or accounts by type or all accounts grouped by type
     */
    public function get_acct($value = FALSE)
    {
        if($value === FALSE)
        {
            $query = $this->db->get('account');
            return $query->result();
        }
        elseif($value === 'grouped')
        {
            $acctTypes = $this->get_type();
            
            foreach ($acctTypes as $type)
            {
                $query = $this->db->get_where('account', array('type_id' => $type->id));
                $type->accts = $query->result();
            }
            
            return $acctTypes;
        }
        elseif(is_numeric($value))
        {
            $query = $this->db->get_where('account', array('id' => $value));
            return $query->row();
        }
    }
    
    public function get_type()
    {
        $query = $this->db->get('account_type');
        return $query->result();
    }
    
    public function set_acct($value = FALSE)
    {
        $data = array(
            'label' => $this->input->post('acctLabelInput'),
            'type_id' => $this->input->post('acctTypeSelect')
        );    
        
        if($value === FALSE)
        {
            return $this->db->insert('account',$data);
        }
        elseif(is_numeric($value))
        {
            return $this->db->update('account',$data,array('id'=>$value));
        }
    }
    
    public function delete_acct($value = FALSE)
    {
        if($value !== FALSE)
        {
            return $this->db->delete('account',array('id'=>$value));
        }
    }
    
}

/* End of file account_model.php */
/* Location: ./application/models/account_model.php */