<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Api_line_model extends CI_Model {
    public function __construct(){
        parent::__construct();
        header("Content-type:application/json; charset=UTF-8");
    }      
}
?>
