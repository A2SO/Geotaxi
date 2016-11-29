<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {


	public function index()
	{       

        $this->load->helper('url');
        $this->load->library(  array('session','ion_auth' ));
        # valida si se encuentra la secion activa para entrar a la primera pantalla del sistema 
        $this->lang->load('auth');
		ob_start();
        if($this->session->userdata('username') == FALSE)
		{
			redirect('auth/login', 'refresh');
		}

    	$this->load->view('guest/head');
    	
    	$this->load->view('guest/nav');
  		
  		$this->load->view('guest/menuA');

    	$this->load->view('welcome_message');

    	$this->load->view('guest/footer');

  	    
	}
}
?>