<?php

class User extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('user_model');
    }

    public function get(){
        print_r($this->user_model->get());
    }

    public function login(){
        $login=$this->input->post('login');
        $password=hash('sha256',$this->input->post('password').SALT);
        $data=array('login'=>$login,'password'=>$password);
        $result=$this->user_model->get($data);



        if(sizeof($result)>0){
            $data=array('user_id'=>$result[0]->user_id);
            $this->session->set_userdata($data);
            $this->output->set_content_type('application/json');
            $this->output->set_output(json_encode(array('result'=>1)));
            return false;

        }

            $this->output->set_output(json_encode(array('result'=>0)));


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