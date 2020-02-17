<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 8/13/2019
 * Time: 2:06 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginModel extends CI_Model{
    function validate($username, $password){
        $this->db->where('user_name', $username);
        $this->db->where('password', $password);

        $result = $this->db->get('user',1);
        return $result;
    }
}h