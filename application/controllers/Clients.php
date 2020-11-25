<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clients extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('clients_model');
        $this->load->helper('form');
        $this->load->library('session');

        
        $sess = $this->session->userdata('logged');
		$this->logged_user = $sess;
    }

    public function index()
    {
       
        if (!$this->logged_user) {
            redirect(site_url('clients/login'));
        }
        //print_r($this->logged_user);
        return $this->dashboard();
    }

    public function dashboard($menu = 'home')
    {
        if (!$this->logged_user) {
            redirect(site_url('clients/login'));
        }
        
        switch($menu){
            case 'home':
                return $this->dashboardhome();
                break;
            case 'sites':
                return $this->dashboardsites();
                break;
            case 'users':
                return $this->dashboardusers();
                break;
            case 'settings':
                return $this->dashboardsettings();
                break;
            default:
                return $this->dashboardhome();
        }
    }

    public function dashboardhome()
    {
        $data = array(
            'logo' => site_url('assets/img/eyes.png'),
            'title' => 'Duauth - Dashboard',
            'styles' => array(
                site_url('assets/css/main.css'),
                site_url('assets/css/dashboard.css')
            ),
            'menu' => array(
                'home' => ' active',
                'sites' => '',
                'users' => '',
                'settings' => '',
            ),
            'userdata' => $this->logged_user,
        );
        $this->load->view('head', $data);
        $this->load->view('clients/navbar');
        $this->load->view('clients/dashboard-head');
        $this->load->view('clients/dashpages/home', $data);
        $this->load->view('clients/dashboard-tail');
        $this->load->view('tail');
    }

    public function dashboardusers()
    {
        $this->load->helper('form');
        $this->load->model('sites_model');
        $sitios = $this->sites_model->get_sites_as_assoc( $this->logged_user['id']);
        $users_per_site = $this->sites_model->get_users_per_site($this->logged_user['id']);

        $data = array(
            'logo' => site_url('assets/img/eyes.png'),
            'title' => 'Duauth - Dashboard',
            'styles' => array(
                site_url('assets/css/main.css'),
                site_url('assets/css/dashboard.css')
            ),
            'menu' => array(
                'home' => '',
                'sites' => '',
                'users' => ' active',
                'settings' => '',
            ),
            'userdata' => $this->logged_user,
            'sites' => $sitios,
            'userlist' => $users_per_site
        );
        $this->load->view('head', $data);
        $this->load->view('clients/navbar');
        $this->load->view('clients/dashboard-head');
        $this->load->view('clients/dashpages/users', $data);
        $this->load->view('clients/dashboard-tail');
        $this->load->view('tail');
    }

    public function dashboardsettings()
    {
        $data = array(
            'logo' => site_url('assets/img/eyes.png'),
            'title' => 'Duauth - Dashboard',
            'styles' => array(
                site_url('assets/css/main.css'),
                site_url('assets/css/dashboard.css')
            ),
            'menu' => array(
                'home' => '',
                'sites' => '',
                'users' => '',
                'settings' => ' active',
            ),
            'userdata' => $this->logged_user,
        );
        $this->load->view('head', $data);
        $this->load->view('clients/navbar');
        $this->load->view('clients/dashboard-head');
        $this->load->view('clients/dashpages/settings', $data);
        $this->load->view('clients/dashboard-tail');
        $this->load->view('tail');
    }

    public function dashboardsites(){
        $this->load->model('sites_model');
        $sitios = $this->sites_model->get_all( $this->logged_user['id'] ) ;
        $data = array(
            'logo' => site_url('assets/img/eyes.png'),
            'title' => 'Duauth - Dashboard',
            'styles' => array(
                site_url('assets/css/main.css'),
                site_url('assets/css/dashboard.css')
            ),
            'menu' => array(
                'home' => '',
                'sites' => ' active',
                'users' => '',
                'settings' => '',
            ),
            'userdata' => $this->logged_user,
            'sites' => $sitios
        );
        $this->load->view('head', $data);
        $this->load->view('clients/navbar');
        $this->load->view('clients/dashboard-head');
        $this->load->view('clients/dashpages/sites', $data);
        $this->load->view('clients/dashboard-tail');
        $this->load->view('tail');

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
                'pass' => password_hash($this->input->post('pass'), PASSWORD_DEFAULT),
                'name' => $this->input->post('name'),
            );
            $succ = $this->clients_model->new($client_data);
            if ($succ) {
                $login = $this->clients_model->get($client_data['mail'], 'mail');
                $this->session->set_userdata('logged', $login);
                return redirect(site_url('clients'));
            }
        }else{
            $data = array(
                'logo' => site_url('assets/img/eyes.png'),
                'title' => 'Registro Duauth',
                'styles' => array(
                    site_url('assets/css/main.css')
                )
            );
            $this->load->view('head', $data);
            $this->load->view('landing/navbar');
            $this->load->view('clients/register-form');
            $this->load->view('footer');
            $this->load->view('tail');
        }

    }

    public function login()
    {
        if ( isset($this->logged_user) ) { 
            redirect(site_url('clients')); 
        }

        $this->load->library('form_validation');
        
        $this->form_validation->set_rules(
            'mail', 
            'Correo electrónico',
            'trim|required'
        );
        $this->form_validation->set_rules(
            'pass', 
            'Contraseña', 
            'trim|required'
        ); 

        $data = array(
            'logo' => site_url('assets/img/eyes.png'),
            'title' => 'Duauth - Iniciar sesión',
            'styles' => array(
                site_url('assets/css/main.css')
            )
        );

        if ($this->form_validation->run()) {
            $mail = $this->input->post('mail');
            $pass = $this->input->post('pass');
            if ($login = $this->clients_model->get_login($mail, $pass)) {
                $this->session->set_userdata('logged', $login);
                return redirect(site_url('clients'));
            }else{
                $data['login_error'] = array('desc' => 'Los datos introducidos son incorrectos');
            }
        }

        $this->load->view('head', $data);
        $this->load->view('landing/navbar');
        $this->load->view('clients/login-form', $data);
        $this->load->view('footer');
        $this->load->view('tail', $data);
    }
    
    public function logout() {
		$this->session->sess_destroy();
		return redirect(site_url('clients/login'));
    }
    
    public function sitessignup(){
        $this->load->model('sites_model');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('url', 'URL del sitio', 'valid_url|is_unique[sites.url]');
        $this->form_validation->set_rules('sitename', 'Nombre del sitio', 'trim|required');

        if ($this->form_validation->run()) {
            $site_data = array(
                'client_id' => $this->logged_user['id'],
                'name' => $this->input->post('sitename'),
                'url' => $this->input->post('url'),
                'status'=> 5
            );
            $succ = $this->sites_model->new($site_data);  
        }
        return redirect(site_url('clients/dashboard/sites'));
    }

    public function add_user(){
        $this->load->model('user_models');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('username', 'Nombre de usuario', 'trim|required');
        $this->form_validation->set_rules('site', 'Nombre del sitio', 'required');

        if ($this->form_validation->run()) {
            $user_data = array(
                'site_id' => $this->input->post('site'),
                'username' => $this->input->post('username')
            );
            $succ = $this->user_models->new($user_data);  
        }
        return redirect(site_url('clients/dashboard/users'));
    }


    
}
