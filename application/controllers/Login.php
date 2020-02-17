<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 8/13/2019
 * Time: 2:10 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('loginmodel');
    }

    function index(){
        $this->load->view('login_view');
    }

    function auth(){
        $username    = $this->input->post('username',TRUE);
        $password = md5($this->input->post('password',TRUE));
        $validate = $this->loginmodel->validate($username,$password);
        if($validate->num_rows() > 0){
            $data  = $validate->row_array();
            $name  = $data['user_name'];
            $sesdata = array(
                'username'  => $name,
                'logged_in' => TRUE
            );
            $this->session->set_userdata($sesdata);
            // access login for admin
            if($level === '1'){
                redirect('dashboard');

                // access login for supervisor
            }elseif($level === '2'){
                redirect('overview');
            }
        }else{
            echo $this->session->set_flashdata('msg','Username or Password is Wrong');
            redirect('login');
        }
    }

    function logout(){
        $this->session->sess_destroy();
        redirect('login');
    }
}