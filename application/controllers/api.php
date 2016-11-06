<?php
/**
 * Created by PhpStorm.
 * User: Nikhil
 * Date: 05-11-2016
 * Time: 23:53
 */

class API extends CI_Controller{

    public function __construct(){
        parent::__construct();
    }

    private function _require_login(){

        if($this->session->userdata('user_id')==false){
            $this->output->set_output(json_encode(array('result'=>0,'error'=>'You are not authorized')));
            return false;
        }

    }

    public function login(){
        $login=$this->input->post('login');
        $password=hash('sha256',$this->input->post('password').SALT);

        $this->load->model('user_model');
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

    public function register(){
        $this->output->set_content_type('application/json');

        $this->form_validation->set_rules('login','Username','required|min_length[5]|is_unique[user.login]');
        $this->form_validation->set_rules('email','Email','required|valid_email|is_unique[user.email]');
        $this->form_validation->set_rules('password','Password','required|min_length[5]|matches[confirm_password]');
        $this->form_validation->set_rules('confirm_password','Confirm Password','required');


        if($this->form_validation->run()==FALSE){

            $this->output->set_output(json_encode(array('result'=>0,'error'=>$this->form_validation->error_array())));
            return false ;
        }

        $login=$this->input->post('login');
        $email=$this->input->post('email');
        $password=$this->input->post('password');
        $confirm_password=$this->input->post('confirm_password');

        $this->load->model('user_model');
        $data=array('login'=>$login,'email'=>$email,'password'=>hash('sha256',$password.SALT));
        $result=$this->user_model->insert($data);

        if($result>0){
            $data=array('user_id'=>$result);
            $this->session->set_userdata($data);
            $this->output->set_content_type('application/json');
            $this->output->set_output(json_encode(array('result'=>1)));
            return false;

        }
        $this->output->set_output(json_encode(array('result'=>0,'error'=>'User not created')));

    }

    public function get_todo(){
        $this->_require_login();
        $this->load->model('todo_model');
        $result=$this->todo_model->get($this->session->userdata('user_id'));
        print_r($result);

    }

    public function create_todo(){
        $this->_require_login();

        $this->form_validation->set_rules('content','Content','required|max_length[255]');

        if($this->form_validation->run()==false){
            $this->output->set_output(json_encode(array('result'=>0,'error'=>$this->form_validation->error_array())));
            return false ;
        }

        $this->load->model('todo_model');
        $data=array('content'=>$this->input->post('content'),'user_id'=>$this->session->userdata('user_id'));
        $result=$this->todo_model->insert($data);

        if($result>0){
            $this->output->set_output(json_encode(array('result'=>1)));
            return false;
        }
        $this->output->set_output(json_encode(array('result'=>0,'error'=>'Not able to insert your data')));
    }

    public function update_todo(){
        $this->_require_login();
        $todo_id=$this->input->post('todo_id');

    }

    public function delete_todo(){
        $this->_require_login();
        $todo_id=$this->input->post('todo_id');
    }

    public function create_note(){
        $this->_require_login();

    }

    public function update_note(){
        $this->_require_login();
        $note_id=$this->input->post('note_id');
    }

    public function delete_note(){
        $this->_require_login();
        $note_id=$this->input->post('note_id');
    }
}