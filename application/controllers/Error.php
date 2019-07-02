<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Error extends CI_Controller {

	
	function __construct()
    {
        parent::__construct();
		$this->load->database();
        $this->load->library('session');
		/*cache control*/
		$this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); 
    }
	
	/***implicit, redirecționează la pagina de conectare dacă nu a fost încă conectat (ă) de administrator***/
	public function index()
	{
		
	}
	
	function page_missing()
	{
		
        $page_data['page_name']  = 'error_404';
        $page_data['page_title'] = get_phrase('pagina_negasita');
        $this->load->view('backend/index', $page_data);
	}
}

