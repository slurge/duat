<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lib extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('jso');
    }

    public function index()
    {
        return($this->aber());
    }
    
    public function aber()
    {
        $js = <<< EOT
console.log("aber");
EOT;
        $this->jso->loadCode($js);

        $obf = $this->jso->Obfuscate();
        echo '<script>'.$obf.'</script>';
        //echo $obf;
        

    }

}
