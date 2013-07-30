<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Journal extends CI_Controller
{
    
    public function __construct()
    {
        parent::__construct();
        
        $data['current'] = 'journal';
    }
    
    public function index()
    {

        $data['title']   = 'Add new entry';
        $data['current'] = 'journalIndex';
        
        $this->load->view('templates/header', $data);
        $this->load->view('journal/index', $data);
        $this->load->view('templates/footer', $data);
    }
    
    public function create()
    {

        $data['title'] = 'Add new entry';
        $data['current'] = 'journalNew';
        
        $this->load->view('templates/header', $data);
        $this->load->view('journal/single', $data);
        $this->load->view('templates/footer', $data);
    }
    
    public function edit($entryID)
    {
        if ( $entryID === NULL )
        {
            // Whoops, we don't have a page for that!
            show_404();
        }
        
        $data['title'] = 'Edit entry';
        
        $this->load->view('templates/header', $data);
        $this->load->view('journal/single', $data);
        $this->load->view('templates/footer', $data);
    }
}

/* End of file journal.php */
/* Location: ./application/controllers/journal.php */