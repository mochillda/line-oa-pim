<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class RegisterController extends CI_Controller {

	public static $views = array();

	function __construct()
	{
		parent::__construct();
		header('Content-Type: text/html; charset=UTF-8');
		self::$views["URL"]  = "RegisterController"; 

		 #model
        // $this->load->model("RegisterModel");
		$this->load->js("bootbox.min");
        $this->load->js('jquery.maskedinput');
        $this->load->css('custom');
        $this->load->js('custom');
	}
	
	public function index()
	{
		echo 'hello';
        self::$views["URL"]  = "RegisterController"; 
		// $this->load->view('RegisterFormView', self::$views);
	}

	public function saveRegister()
	{
		$post = $this->input->post();
        echo "<pre>"; print_r($post); exit;
	}


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */