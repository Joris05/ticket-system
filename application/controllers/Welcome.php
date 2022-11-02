<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->check_isvalidated();
	}

	private function check_isvalidated()
	{
		if ($this->session->userdata('ticket')) {
			redirect('dashboard');
		}
	}

	public function index()
	{
		// echo md5("admin123");
		$this->load->view('pages/login');
	}
}
