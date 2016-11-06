<?php


class CRUD_model extends  CI_model{

    public function __construct(){

        parent::__construct();
    }

    public function get($user_id=null){

        $sql="";
        $query="";
        if($user_id==null){
            $sql="select * from USER ";
            $query=$this->db->query($sql);
        }
        else if(is_array($user_id)){
            $sql="select * from user where login=? and password=?";
            $query=$this->db->query($sql,array($user_id['login'],$user_id['password']));
        }
        else{
            $sql="select * from user where user_id=?";
            $query=$this->db->query($sql,array($user_id));
        }

        return $query->result();

    }

    public function insert($data){
        $this->db->insert('user',$data);

        return $this->db->insert_id();
    }

    public function update($data,$id){
        $this->db->where('user_id',$id);
        $this->db->update('user',$data);

        return $this->db->affected_rows();

    }

    public function delete($id){
        $this->db->delete('user',array('user_id'=>$id));
        return $this->db->affected_rows();
    }
}

}

?>