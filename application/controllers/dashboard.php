<?php
/**
 * Created by PhpStorm.
 * User: Nikhil
 * Date: 04-11-2016
 * Time: 15:35
 */

class Dashboard extends CI_Controller{

    public function __construct(){
        parent::__construct();
        if(!($this->session->userdata('user_id'))){
            $this->logout();

        }
    }

    public function index(){
        $this->load->view("dashboard/inc/header_view");
        $this->load->view("dashboard/dashboard_view");
        $this->load->view("dashboard/inc/footer_view");
    }

    public function logout(){
        $this->session->sess_destroy();
        redirect("/");
    }
}

?>