<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // Helpers Library Modal
        $this->load->helper(array('form', 'url','language'));
        $this->load->library(array('form_validation','session'));
        $this->load->model('contact_model');
        // Language files
        $this->lang->load('contact');
        $this->lang->load('form');
        // Builds contact type array for dropdown
        $this->contactTypeSelect = array('' => 'Select contact type');
        if ($contactTypes = $this->contact_model->get_type())
        {
            foreach ($contactTypes as $type)
            {
                $this->contactTypeSelect[$type->id] = $type->label;
            }
        }
    }
        
    public function index()
    {
        // populate the list of contacts
        $data['current']        = 'contactIndex';
        $data['title']          = $this->lang->line('contact.title_index');
        $data['contact']        = $this->contact_model->get_contact('grouped');
            
        $this->load->view('templates/header', $data);
        $this->load->view('contact/index', $data);
        $this->load->view('templates/footer', $data);
    }
    
    public function create_edit($contactID = FALSE)
    {
        // set contact type array to dropdown
        $data['contactTypeSelect'] = $this->contactTypeSelect;
        // check if create or edit mode
        if($contactID === FALSE)
        {
            // Create New Account
            $data['current']        = 'contactCreate';
            $data['title']          = $this->lang->line('contact.title_add');
        }
        else
        {
            // Edit Account
            $data['current']        = 'contactEdit';
            $data['title']          = $this->lang->line('contact.title_edit');
            $data['ID']             = $contactID;
            
            $contactData = $this->contact_model->get_contact($contactID);
  
            $data['contactType']   = $contactData->type_id;
            $data['contactLabel']  = $contactData->label;
            $data['contactID']     = $contactData->id;
        }
        
        // Set the validation rules
        $this->form_validation->set_rules($this->contact_validation_rules);
        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('contact/single', $data);
            $this->load->view('templates/footer', $data);
        }
        else
        {
            if($contactID === FALSE)
            {    
                $this->contact_model->set_contact();
                $this->session->set_flashdata('success', lang('contact.new_success'));
            }
            else
            {
                $this->contact_model->set_contact($contactID);
                $this->session->set_flashdata('success', lang('contact.edit_success'));
            }    
            redirect('contact/');
        }
    }
    
    public function delete($contactID = FALSE)
    {
        $this->contact_model->delete_contact($contactID);
        $this->session->set_flashdata('success', lang('contact.delete_success'));
        redirect('contact/');
    }

    private $contact_validation_rules = array(
        array(
            'field' => 'contactTypeSelect',
            'label' => 'lang:contact.contact_type',
            'rules' => 'required'
        ),
        array(
            'field' => 'contactLabelInput',
            'label' => 'lang:contact.contact_label',
            'rules' => 'required'
        )
    );

}

/* End of file contact.php */
/* Location: ./application/controllers/contact.php */
    