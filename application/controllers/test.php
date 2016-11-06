<?php

class User extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('user_model');
    }

    public function get(){
        print_r($this->user_model->get());
    }



    public function insert(){
        $data=array('login'=>'nikhilnar','password'=>'nikhil','email'=>'nikhil.nar@amdocs.com');

        echo $this->user_model->insert($data);
    }

    public function update(){
        $data=array('login'=>'nikhil');
        echo $this->user_model->update($data,1);
    }

    public function delete(){
       echo $this->user_model->delete(3);
    }
}

?>