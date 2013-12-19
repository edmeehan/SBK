<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Journal extends CI_Controller
{
    
    public function __construct()
    {
        parent::__construct();
        // Helpers Library Modal
        $this->load->helper(array('form', 'url','language'));
        $this->load->library(array('form_validation','session','pagination'));
        $this->load->model('journal_model');
        // Load acount and contact models
        $this->load->model('account_model');
        $this->load->model('contact_model');
        // Builds account type array for dropdown
        
    }
    
    public function index($page = 0)
    {
        //TODO build a config settings page for this stuff
        $paginationConfig = array(   
            'per_page'              => 30,
            'base_url'              => '/journal/page/',
            'total_rows'            => $this->journal_model->total_entry(),
            'num_tag_open'          => '<li>',
            'num_tag_close'         => '</li>',
            'cur_tag_open'          => '<li class="active"><a href="#">',
            'cur_tag_close'         => '</a></li>',
            'prev_tag_open'         => '<li>',
            'prev_tag_close'        => '</li>',
            'next_tag_open'         => '<li>',
            'next_tag_close'        => '</li>',
            //'first_link'            => '<<',
            'first_tag_open'        => '<li>',
            'first_tag_close'       => '</li>',
            //'last_link'             => '>>',
            'last_tag_open'         => '<li>',
            'last_tag_close'        => '</li>'
        );
        
        $data['title']   = 'Add new entry';
        $data['current'] = 'journalIndex';
        
        if(!is_numeric($page)){ $page = 0;}
        
        $data['journals'] = $this->journal_model->get_journal($page,$paginationConfig['per_page']);
        
        // Pagination
        $this->pagination->initialize($paginationConfig);
        $data['pagination'] = $this->pagination->create_links();
        
        $this->load->view('templates/header', $data);
        $this->load->view('journal/index', $data);
        $this->load->view('templates/footer', $data);
    }
    
    public function create_edit($journalID = FALSE)
    {
        $upload['upload_path'] = './uploads/';
        $upload['allowed_types'] = 'pdf|jpg|gif|png';
        $upload['response'] = FALSE;
        $upload['encrypt_name'] = TRUE;
            
        $this->load->library('upload', $upload);
        
        $data['uploadError'] = FALSE;
        $data['contact_array'] = json_encode($this->contact_model->get_contact());
        $data['account_array'] = json_encode($this->account_model->get_acct());
            
        if($journalID === FALSE)
        {
            // Create New Account
            $data['current']        = 'journalCreate';
            $data['title']          = $this->lang->line('journal.title_add');
            $data['journal']        = new stdClass();
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
                        $newEntry = new stdClass();
                        $newEntry->id              = $row;
                        $newEntry->account_id      = $_POST['entry_account_id'][$row];
                        $newEntry->contact_id      = $_POST['entry_contact_id'][$row];
                        $newEntry->description     = $_POST['entry_desc'][$row];
                        $newEntry->value_debit     = empty($_POST['entry_value_debit'][$row]) ? NULL : $_POST['entry_value_debit'][$row];
                        $newEntry->value_credit    = empty($_POST['entry_value_credit'][$row]) ? NULL : $_POST['entry_value_credit'][$row];
                        
                        array_push($data['journal']->entries,$newEntry);
                    }
                }
            }
            
            if (!empty($_FILES['record_file']['name']))
            {
                if ( ! $this->upload->do_upload('record_file'))
                {
                    $data['uploadError'] = $this->upload->display_errors();
                }
                else
                {
                    $upload['response'] = $this->upload->data();
                }
            }
            
        }
        
        $this->form_validation->set_rules($this->validation_rules);
        
        if ($this->form_validation->run() === FALSE || $data['uploadError'])
        {
            	
            $data['scripts'] = array('/lib/bootstrap-datepicker/bootstrap-datepicker.js','/journal/default.js','/journal/create_edit.js');          
            $this->load->view('templates/header', $data);
            $this->load->view('journal/single', $data);
            $this->load->view('templates/footer', $data);
            
        }
        else
        {
            // Form is valid - let's ROCK!
            $this->journal_model->set_journal($journalID,$upload['response']);
            
            if($journalID === FALSE)
            {    
                $this->session->set_flashdata('success', lang('journal.new_success'));
            }
            else
            {
                $this->session->set_flashdata('success', lang('journal.edit_success'));
            }    
            redirect('journal/');
        }
    }
    
    public function delete($journalID = FALSE)
    {
        $this->journal_model->delete_journal($journalID);
        $this->session->set_flashdata('success', lang('journal.delete_success'));
        redirect('journal/');
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