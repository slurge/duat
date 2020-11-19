<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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

}
