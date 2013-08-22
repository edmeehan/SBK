<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Journal extends CI_Controller
{
    
    public function __construct()
    {
        parent::__construct();
        // Helpers Library Modal
        $this->load->helper(array('form', 'url','language'));
        $this->load->library(array('form_validation','session'));
        $this->load->model('journal_model');
        // Load acount and contact models
        $this->load->model('account_model');
        $this->load->model('contact_model');
        // Builds account type array for dropdown
        
    }
    
    public function index()
    {

        $data['title']   = 'Add new entry';
        $data['current'] = 'journalIndex';
        
        $data['journals'] = $this->journal_model->get_journal();
        
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
            
            $data['journal']->entries = array();
            
            if(!$_POST){
                // populate with 2 new lines
                $temp1 = new stdClass();
                $temp1->id = "newline1";
                $temp2 = new stdClass();
                $temp2->id = "newline2";
                
                array_push($data['journal']->entries,$temp1);
                array_push($data['journal']->entries,$temp2);
                
            }
        }
        else
        {
            // Edit Account
            $data['current']        = 'journalEdit';
            $data['title']          = $this->lang->line('journal.title_edit');
            $data['ID']             = $journalID;
			
			$data['journal']        = $this->journal_model->get_entry($journalID);
        }
        
        // Set the validation rules
        if ($_POST)
        {
                
            foreach($_POST['entry'] as $row)
            {
                
                // check if values are empty and don't run in the validator    
                if( $_POST['entry_account_id'][$row] === '-1'
                    && $_POST['entry_value_debit'][$row]    == ''
                    && $_POST['entry_value_credit'][$row]   == ''
                    && $row !== 'newline1'
                    && $row !== 'newline2'
                )
                {
                    // do not add validation rule
                }
                else
                {

                    // TODO - Create validation
                    $this->form_validation->set_rules('entry_account_id['.$row.']', 'lang:journal.acct', 'required|greater_than[-1]');
                    //$this->form_validation->set_rules('entry_value_debit['.$row.']', 'lang:journal.debit', 'decimal'); 
                    //$this->form_validation->set_rules('entry_value_credit['.$row.']', 'lang:journal.credit', 'decimal');
                    $this->form_validation->set_rules('entry_desc['.$row.']', 'lang:journal.desc', 'trim');
                    
                    $idSubstr = substr($row,0,7);
                    
                    if($idSubstr === 'newline')
                    {
                        $newEntry = NULL;
                        $newEntry->id              = $row;
                        $newEntry->account_id      = $_POST['entry_account_id'][$row];
                        $newEntry->contact_id      = $_POST['entry_contact_id'][$row];
                        $newEntry->description     = $_POST['entry_desc'][$row];
                        $newEntry->value_debit     = $_POST['entry_value_debit'][$row];
                        $newEntry->value_credit    = $_POST['entry_value_credit'][$row];
                        
                        array_push($data['journal']->entries,$newEntry);
                    }
                }
            }
        }
        
        if($this->input->post('record_file')){
            
            $upload['upload_path'] = './uploads/';
            $upload['allowed_types'] = 'pdf|jpg|gif|png';
            //$upload['encrypt_name'] = TRUE;
            
            $this->load->library('upload', $upload);
            
            if(!$this->upload->do_upload('record_file')){
                
            }else{
                
            }
        }
        
        $this->form_validation->set_rules($this->validation_rules);
        
        if ($this->form_validation->run() === FALSE)
        {
            	
            $data['scripts'] = array('/lib/bootstrap-datepicker/bootstrap-datepicker.js','/journal/default.js','/journal/create_edit.js');          
            $this->load->view('templates/header', $data);
            $this->load->view('journal/single', $data);
            $this->load->view('templates/footer', $data);
            
        }
        else
        {
            // Form is valid - let's ROCK!
            if($journalID === FALSE)
            {    
                $this->journal_model->set_journal();
                //$this->session->set_flashdata('success', lang('account.new_success'));
            }
            else
            {
                $this->journal_model->set_journal($journalID);
                //$this->session->set_flashdata('success', lang('account.edit_success'));
            }    
            redirect('journal/');
        }
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
        // journal
        array(
            'field' => 'date',
            'label' => 'lang:app.date',
            'rules' => 'required'
        ),
        array(
            'field' => 'desc',
            'label' => 'lang:app.desc',
            'rules' => ''
        )
    );
}

/* End of file journal.php */
/* Location: ./application/controllers/journal.php */