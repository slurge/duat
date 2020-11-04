<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct()
    {
        parent::__construct();
        $this->load->helper('url_helper');
    }

	public function index()
	{
		$data = array(
			'logo' => site_url('assets/img/eyes.png'),
			'title' => 'Duauth Autenticador Inteligente'
		);
		$this->load->view('landing/head', $data);
		$this->load->view('landing/navbar');
		$this->load->view('landing/landing');
		$this->load->view('landing/footer');
		$this->load->view('landing/tail');
	}

	public function privacy()
	{
		$data = array(
			'logo' => site_url('assets/img/eyes.png'),
			'title' => 'Duauth Autenticador Inteligente'
		);
		$this->load->view('landing/head', $data);
		$this->load->view('landing/navbar');
		$this->load->view('landing/privacy');
		$this->load->view('landing/footer');
		$this->load->view('landing/tail');
	}
}
