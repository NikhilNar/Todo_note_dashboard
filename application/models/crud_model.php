<?php


class CRUD_model extends  CI_model{

    protected $_table=null;
    protected $_primary_key=null;

    public function __construct(){

        parent::__construct();
    }

    public function get($id=null){

        $sql="select * from ".$this->_table;
        $query="";

        if(is_numeric($id)){
            $sql=$sql." where ".$this->session->userdata('user_id')." = '".$id."'";
        }
        else if(is_array($id)){
            $sql=$sql." where ";

            foreach($id as $key=>$value){
                $sql=$sql.$key." = '".$value."'" ;
                $sql=$sql." and ";
            }

            $sql=substr($sql,0,sizeof($sql)-5);
        }

        $query=$this->db->query($sql);
        //$result=array();

        /*foreach($query->result() as $row){
            array_push($result,$row);
        }
        print_r($result);*/


        //return $result;

        return $query->result();
    }

    public function insert($data){
        $this->db->insert($this->_table,$data);

        return $this->db->insert_id();
    }

    public function update($data,$id){
        $this->db->where($this->_primary_key,$id);
        $this->db->update($this->_table,$data);

        return $this->db->affected_rows();

    }

    public function delete($id){
        $this->db->delete($this->_table,array($this->_primary_key=>$id));
        return $this->db->affected_rows();
    }


}

?>