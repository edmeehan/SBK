<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
        
    public function index()
    {
        $data['title']   = 'Contact Manager';
        $data['current'] = 'contactIndex';
            
        $this->load->view('templates/header', $data);
        $this->load->view('contact/index', $data);
        $this->load->view('templates/footer', $data);
    }
}

/* End of file account.php */
/* Location: ./application/controllers/account.php */
    