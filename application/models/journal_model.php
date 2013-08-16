<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Journal_model extends CI_Model
{
	
 
     
     
     /**
     * Get all entries by journal ID
     */
    public function get_entry($value = FALSE)
    {
        if($value === FALSE)
        {
            
        }
        else
        {
            $query = $this->db->get_where('journal',array('id'=>$value))->row();
            $query->entries = $this->db->get_where('journal_line', array('journal_id' => $value))->result();
			 
			return $query;
        }
    }
    
    /**
     * Get all journal entries
     */
    public function get_journal($value = FALSE)
    {
        $query = $this->db->get('journal');
        return $query->result();
    }
    
    /**
     * Add or Edit journal entry
     */
     
    public function set_journal($value = FALSE)
    {
        $data = array(
            'date'          => $this->input->post('date'),
            'description'   => $this->input->post('desc')
        );
        
        if($value === FALSE)
        {
            $this->db->insert('journal',$data);
            // Get the insert ID
            $query = $this->db->query('SELECT LAST_INSERT_ID()');
            $row = $query->row_array();
            $newID = $row['LAST_INSERT_ID()'];
            // Now insert the entry lines     
            $this->set_journal_entry($newID);

        }
        elseif(is_numeric($value))
        {
            $this->db->update('journal',$data,array('id'=>$value));
            $this->set_journal_entry($value);
        }
    }
    
    public function set_journal_entry($value = FALSE)
    {
        foreach ($this->input->post('entry') as $entry) {
            
            $accID = $this->input->post('entry_account_id');
            $contID = $this->input->post('entry_contact_id');
            $descText = $this->input->post('entry_desc');
            $valueDebit = $this->input->post('entry_value_debit');
            $valueCredit = $this->input->post('entry_value_credit');
            
            $data = array(
                'journal_id' => $value,
                'account_id' => $accID[$entry],
                'contact_id' => $contID[$entry],
                'description' => $descText[$entry],
                'value_debit' => $valueDebit[$entry],
                'value_credit' => $valueCredit[$entry]
            );
            
            if('newline' === substr($entry,0,7))
            {
                $this->db->insert('journal_line',$data);
            }
            else
            {
                $this->db->update('journal_line',$data,array('id'=>$entry));
            }
        }
    }
}

/* End of file journal_model.php */
/* Location: ./application/models/journal_model.php */
	