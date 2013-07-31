<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Journal extends CI_Controller
{
    
    public function __construct()
    {
        parent::__construct();
        // Helpers Library Modal
        $this->load->helper(array('form', 'url','language'));
        $this->load->library(array('form_validation','session'));
        //$this->load->model('journal_model');

        // Builds account type array for dropdown
        
    }
    
    public function index()
    {

        $data['title']   = 'Add new entry';
        $data['current'] = 'journalIndex';
        
        $this->load->view('templates/header', $data);
        $this->load->view('journal/index', $data);
        $this->load->view('templates/footer', $data);
    }
    
    public function create_edit($journalID = FALSE)
    {
            
        if($journalID === FALSE)
        {
            // Create New Account
            $data['current']        = 'journalCreate';
            $data['title']          = $this->lang->line('journal.title_add');
        }
        else
        {
            // Edit Account
            $data['current']        = 'journalEdit';
            $data['title']          = $this->lang->line('journal.title_edit');
            $data['ID']             = $journalID;
        }
        
        $this->load->view('templates/header', $data);
        $this->load->view('journal/single', $data);
        $this->load->view('templates/footer', $data);
    }
    
}

/* End of file journal.php */
/* Location: ./application/controllers/journal.php */