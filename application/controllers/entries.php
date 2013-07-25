<?php

class Entries extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        
        $this->load->library('lessphp' );

        try
        {
            $this->lessphp->checkedCompile(BASEPATH.'../library/bootstrap/less/bootstrap.less',BASEPATH.'../css/style.css');
            $this->lessphp->checkedCompile(BASEPATH.'../library/bootstrap/less/responsive.less',BASEPATH.'../css/responsive.css');
        }
        catch (exception $e)
        {
            echo "fatal error: " . $e->getMessage();
        }
        
    }
    
    public function index()
    {

        $data['title'] = 'Add new entry';
        
        //$this->lessphp->checkedCompile(BASEPATH.'../library/bootstrap/bootstrap.less',BASEPATH.'../css/style.css');
        
        $this->load->view('templates/header', $data);
        $this->load->view('entries/index', $data);
        $this->load->view('templates/footer', $data);
    }
    
    public function create()
    {

        $data['title'] = 'Add new entry';
        
        //$this->lessphp->checkedCompile(BASEPATH.'../library/bootstrap/bootstrap.less',BASEPATH.'../css/style.css');
        
        $this->load->view('templates/header', $data);
        $this->load->view('entries/entry', $data);
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
        
        //$this->lessphp->checkedCompile(BASEPATH.'../library/bootstrap/bootstrap.less',BASEPATH.'../css/style.css');
        
        $this->load->view('templates/header', $data);
        $this->load->view('entries/entry', $data);
        $this->load->view('templates/footer', $data);
    }
}