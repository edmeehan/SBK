<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Account extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // Helpers Library Modal
        $this->load->helper(array('form', 'url','language'));
        $this->load->library(array('form_validation','session'));
        $this->load->model('account_model');        
    }
        
    public function index()
    {
        // populate the list of accounts
        $data['current']        = 'accountIndex';
        $data['title']          = $this->lang->line('account.title_index');
        $data['acct']           = $this->account_model->get_acct('grouped');
            
        $this->load->view('templates/header', $data);
        $this->load->view('account/index', $data);
        $this->load->view('templates/footer', $data);
    }
    
    public function create_edit($acctID = FALSE)
    {
        // Builds account type array for dropdown
        $this->acctTypeSelect = array('' => 'Select account type');
        if ($acctTypes = $this->account_model->get_type())
        {
            foreach ($acctTypes as $type)
            {
                $this->acctTypeSelect[$type->id] = $type->label;
            }
        }
        // set account type array to dropdown
        $data['acctTypeSelect'] = $this->acctTypeSelect;
        // check if create or edit mode
        if($acctID === FALSE)
        {
            // Create New Account
            $data['current']        = 'accountCreate';
            $data['title']          = $this->lang->line('account.title_add');
        }
        else
        {
            // Edit Account
            $data['current']        = 'accountEdit';
            $data['title']          = $this->lang->line('account.title_edit');
            $data['ID']             = $acctID;
            
            $acctData = $this->account_model->get_acct($acctID);
  
            $data['acctType']   = $acctData->type_id;
            $data['acctLabel']  = $acctData->label;
            $data['acctID']     = $acctData->id;
        }
        
        // Set the validation rules
        $this->form_validation->set_rules($this->account_validation_rules);
        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('account/single', $data);
            $this->load->view('templates/footer', $data);
        }
        else
        {
            if($acctID === FALSE)
            {    
                $this->account_model->set_acct();
                $this->session->set_flashdata('success', lang('account.new_success'));
            }
            else
            {
                $this->account_model->set_acct($acctID);
                $this->session->set_flashdata('success', lang('account.edit_success'));
            }    
            redirect('account/');
        }
    }
    
    public function delete($acctID = FALSE)
    {
        $this->account_model->delete_acct($acctID);
        $this->session->set_flashdata('success', lang('account.delete_success'));
        redirect('account/');
    }
    
    public function json($method = FALSE,$ID = FALSE)
    {
        switch ($method) {
            case 'account':
                if($ID !== FALSE){
                    $jsonOBJ = $this->account_model->get_acct($ID);
                }
                break;
            case 'accounts':
                $jsonOBJ = $this->account_model->get_acct();
                break;
            case 'accounts_grouped':
                $jsonOBJ = $this->account_model->get_acct('grouped');
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
    
    private $account_validation_rules = array(
        array(
            'field' => 'acctTypeSelect',
            'label' => 'lang:account.acct_type',
            'rules' => 'required'
        ),
        array(
            'field' => 'acctLabelInput',
            'label' => 'lang:account.acct_label',
            'rules' => 'required'
        )
    );
}

/* End of file account.php */
/* Location: ./application/controllers/account.php */
    