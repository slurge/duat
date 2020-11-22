<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Header('Access-Control-Allow-Origin: *'); 
Header('Access-Control-Allow-Headers: *'); 
Header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE');

use UAParser\Parser;

class Api extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        echo 'v1.0';
    }

    public function aberapi()
    {
        $datos_raw_json = json_decode($this->input->raw_input_stream, true);
        /*$datos_raw_json = array(
            'cadencia'=> [12,244,7578],
                'agent' => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.198 Safari/537.36',
                'token' => '1',
                 'user' => 'juan'
        );*/
        $response = 'token incorrecto';
        if($this->validatoken($datos_raw_json['token'])){
            $response = $this->calc($datos_raw_json);
            /*$response = 'no';*/ 
        }
        $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode(array('response' => $response)))->_display(); 
        die();
    }

    public function validatoken($tokenajax){
        $token_user_bueno = hash('sha256', '1');
        $sal = 'aber';
        return $token_user_bueno == $tokenajax;
    }

    public function calc($data)
    {
        $this->load->model('user_models');
        $this->load->model('datasets_model');
        $this->load->model('meta');
        $user = $this->user_models->find_user($data['token'],$data['user']);
        //$count = $this->datasets_model->data_count($id_user);
        $data['user'] = $user['id'];
        /*if($count<30 || $count%30 == 0){
            return $this->usarcurl($data, 'fit');

        }else{
            return $this->usarcurl($data, 'predict');
        }*/
        if($user['mode'] == $this->meta->id('fit')){
            return $this->usarcurl($data, 'fit');
        }else{
            return $this->usarcurl($data, 'predict');
        }
    }

    public function usarcurl($data, $metodo){
        $this->load->model('sites_model');
        $sitio = $this->sites_model->get($data['token'],'token');
        $url = 'http://localhost:8000/'.$metodo;
        $ch = curl_init($url);
        $datanew = array(
            'site' => $sitio['id'],
            'user' => $data['user'],
            'cadence' => $data['cadencia'],
            'agent' => $data['agent']
        );

        $payload = json_encode($datanew);
        //attach encoded JSON string to the POST fields
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

        //set the content type to application/json
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));

        //return response instead of outputting
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        //execute the POST request
        $result = curl_exec($ch);

        if($result  === false)
        {
            $result = 'Curl error: ' . curl_error($ch);
        }

        //close cURL resource
        curl_close($ch);
        return $result;
    }
    
    
}
