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
        return($this->aber());
    }

    public function aber()
    {

        $ua = 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.198 Safari/537.36';
        $parser = Parser::create();
        $result = $parser->parse($ua);

        //https://github.com/ua-parser/uap-php
        
        /* echo $result->ua->toString();
        echo $result->os->toString();
        echo $result->device->family; */
        print_r($result);


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
            $response = $this->usarcurl($datos_raw_json);
            /*$response = 'no';*/ 
        }
        $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode(array('response' => $response)))->_display(); 
        die();
    }

    public function validatoken($tokenajax){
        $token_user_bueno = hash('sha256', '0');
        $sal = 'aber';
        if($token_user_bueno == $tokenajax){
            return true;
        }else{
            return false;
        }
    }

    public function usarcurl($data){
        $url = 'http://localhost:8000/aber';
        $ch = curl_init($url);
        $datanew = array(
            'site' => '0',
            'user' => '0',
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
        else
        {
            echo 'Operación completada sin errores';
        }

        //close cURL resource
        curl_close($ch);
        return $result;
    }

}
