<?php

class Test extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('user_model');
    }

    public function get(){
        $result= $this->user_model->get("2");
        print_r($result);
    }



    public function insert(){
        $data=array('login'=>'nikhilnar123','password'=>'nikhil','email'=>'nikhil1234.nar@amdocs.com');

        echo $this->user_model->insert($data);
    }

    public function update(){
        $data=array('login'=>'nikhil');
        echo $this->user_model->update($data,1);
    }

    public function delete(){
       echo $this->user_model->delete(8);
    }
}

?>