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
        // Load acount and contact models
        $this->load->model('account_model');
        $this->load->model('contact_model');
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
        $data['contact_array'] = json_encode($this->contact_model->get_contact());
        $data['account_array'] = json_encode($this->account_model->get_acct());
            
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
        
        $data['scripts'] = array('/lib/bootstrap-datepicker/bootstrap-datepicker.js','/journal/default.js','/journal/create_edit.js');
        
        $this->load->view('templates/header', $data);
        $this->load->view('journal/single', $data);
        $this->load->view('templates/footer', $data);
    }
    
    public function json($method = FALSE,$ID = FALSE)
    {
        switch ($method) {
            case 'entry':
                //if($ID !== FALSE){
                    /* TODO now we have a json handshake going on... we can finish this */
                    $jsonOBJ = $this->input->post();
                //}
                break;
            case 'entry_line':
                if($ID !== FALSE){
                    //$jsonOBJ = $this->account_model->get_acct($ID);
                }
                break;
            default:
                $this->output
                    ->set_output('error');
                return;
        }    
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($jsonOBJ));
    }
    
    private $validation_rules = array(
        array(
            'field' => 'date',
            'label' => 'lang:app.date',
            'rules' => 'required'
        ),
        array(
            'field' => 'desc',
            'label' => 'lang:app.desc',
            'rules' => 'required'
        )
    );
}

/* End of file journal.php */
/* Location: ./application/controllers/journal.php */