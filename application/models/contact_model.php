<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact_model extends CI_Model
{

    public function tot_contact()
    {
        return $this->db->count_all_results('contact');
    }

    public function get_contact($value = FALSE)
    {
        if($value === FALSE)
        {
            $query = $this->db->get('contact');
            return $query->result();
        }
        elseif($value === 'grouped')
        {
            $contactTypes = $this->get_type();
            
            foreach ($contactTypes as $type)
            {
                $query = $this->db->get_where('contact', array('type_id' => $type->id));
                $type->contacts = $query->result();
            }
            
            return $contactTypes;
        }
        elseif(is_numeric($value))
        {
            $query = $this->db->get_where('contact', array('id' => $value));
            return $query->row();
        }
    }
    
    public function get_type()
    {
        $query = $this->db->get('contact_type');
        return $query->result();
    }

    public function set_contact($value = FALSE)
    {
        $data = array(
            'label' => $this->input->post('contactLabelInput'),
            'type_id' => $this->input->post('contactTypeSelect')
        );    
        
        if($value === FALSE)
        {
            return $this->db->insert('contact',$data);
        }
        elseif(is_numeric($value))
        {
            return $this->db->update('contact',$data,array('id'=>$value));
        }
    }
    
    public function delete_contact($value = FALSE)
    {
        if($value !== FALSE)
        {
            return $this->db->delete('contact',array('id'=>$value));
        }
    }
 
}

/* End of file contact_model.php */
/* Location: ./application/models/contact_model.php */