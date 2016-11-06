<?php
/**
 * Created by PhpStorm.
 * User: Nikhil
 * Date: 04-11-2016
 * Time: 15:06
 */
class Home extends CI_Controller{

    public function index(){

        $this->load->view('home/inc/header_view.php');
        $this->load->view('home/home_view.php');
        $this->load->view('home/inc/footer_view.php');

    }

    public function register(){
        $this->load->view('home/inc/header_view.php');
        $this->load->view('home/register_view.php');
        $this->load->view('home/inc/footer_view.php');
    }


}