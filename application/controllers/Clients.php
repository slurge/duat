<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clients extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('clients_model');

        $this->load->helper('form');
    }

    public function index()
    {
        return $this->signup();
    }

    public function signup()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('mail', 'Correo electrónico', 'trim|required|valid_email|is_unique[Clients.mail]');
        $this->form_validation->set_rules('mail2', 'Confirmación de correo electrónico', 'trim|required|matches[mail]');
        $this->form_validation->set_rules('pass', 'Contraseña', 'trim|required|min_length[8]');
        $this->form_validation->set_rules('pass2', 'Confirmación de contraseña', 'trim|required|matches[pass]');
        $this->form_validation->set_rules('name', 'Nombre', 'trim|required');
        //$this->form_validation->set_rules('policyagree', 'Privacidad', 'required');

        $this->form_validation->set_message('is_unique', 'Este correo electrónico ya esta existe en el sistema');
        $this->form_validation->set_message('required', 'Este campo es requerido');
        $this->form_validation->set_message('min_length', 'Elija una contraseña de 8 caracteres por lo menos');
        $this->form_validation->set_message('matches', 'Este campo no coincide');

        $this->form_validation->set_error_delimiters('<div class="invalid-field">', '</div>');

        if ($this->form_validation->run()) {
            $client_data = array(
                'mail' => $this->input->post('mail'),
                'pass' => $this->input->post('pass'),
                'name' => $this->input->post('name')
            );
            $aber = $this->clients_model->new($client_data);
            print_r($aber);
        }else{
            $data = array(
                'logo' => site_url('assets/img/eyes.png'),
                'title' => 'Registro Duauth',
                'styles' => array(
                    site_url('assets/css/main.css')
                )
            );
            $this->load->view('landing/head', $data);
            $this->load->view('landing/navbar');
            $this->load->view('clients/register-form');
            $this->load->view('landing/footer');
            $this->load->view('landing/tail');
        }

    }
    
    
}
