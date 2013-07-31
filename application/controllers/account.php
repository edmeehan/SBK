<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Account extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        
        $this->load->helper(array('form', 'url','language'));
        $this->load->library(array('form_validation','session'));
        $this->load->model('account_model');
        
        $this->lang->load('account');
        $this->lang->load('form');
        
        $this->acctTypeSelect = array('' => 'Select account type');
        if ($acctTypes = $this->account_model->get_type())
        {
            foreach ($acctTypes as $type)
            {
                $this->acctTypeSelect[$type->id] = $type->label;
            }
        }
    }
        
    public function index()
    {
        
        $data['current']        = 'accountIndex';
        $data['title']          = $this->lang->line('account.title_index');
        $data['acct']           = $this->account_model->get_acct('grouped');
            
        $this->load->view('templates/header', $data);
        $this->load->view('account/index', $data);
        $this->load->view('templates/footer', $data);
    }
    
    public function create_edit($acctID = FALSE)
    {
        $data['acctTypeSelect'] = $this->acctTypeSelect;
        
        if($acctID === FALSE)
        {
            $data['current']        = 'accountCreate';
            $data['title']          = $this->lang->line('account.title_add');
        }
        else
        {
            $data['current']        = 'accountEdit';
            $data['title']          = $this->lang->line('account.title_edit');
            
            $acctData = $this->account_model->get_acct($acctID);
            /*
            $data['acctType']   = $acctData => 'type_id';
            $data['acctLabel']  = $acctData => 'label';
            $data['acctID']     = $acctData->'id';
             */
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
            $this->account_model->set_acct();
            $this->session->set_flashdata('success', lang('account.new_success'));
            redirect('account/');
        }

    }
    
    public function delete($acctID = FALSE)
    {
        
    }
    /**
     * Validation rules for creating a new account
     *
     * @var array
     * @access private
     */
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
    