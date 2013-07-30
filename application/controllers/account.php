<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Account extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('account_model');
    }
        
    public function index()
    {
        $data['title']          = 'Account Manager';
        $data['current']        = 'accountIndex';
        $data['acct']       = $this->account_model->get_acct(TRUE);
            
        $this->load->view('templates/header', $data);
        $this->load->view('account/index', $data);
        $this->load->view('templates/footer', $data);
    }
    
    public function create()
    {
        $data['title']          = 'Create Account';
        $data['current']        = 'accountCreate';
        
        $this->load->view('templates/header', $data);
        $this->load->view('account/single', $data);
        $this->load->view('templates/footer', $data);
    }
}

/* End of file account.php */
/* Location: ./application/controllers/account.php */
    