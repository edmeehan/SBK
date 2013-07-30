<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Report extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
        
    public function index()
    {
        $data['title']   = 'Reports';
        $data['current'] = 'reportIndex';
            
        $this->load->view('templates/header', $data);
        $this->load->view('report/index', $data);
        $this->load->view('templates/footer', $data);
    }
}

/* End of file account.php */
/* Location: ./application/controllers/account.php */
    