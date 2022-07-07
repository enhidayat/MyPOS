<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{


	public function index()
	{
		check_not_login();
		// $this->load->view('dashboard'); manual
		$this->template->load('template', 'dashboard');
	}
}
