<?php

class Crud_model extends CI_Model{
    public function usersData(){
       $sql = $this->db->get('users');
       return $sql->result();
    }

    public function insertData($data){
        $this->db->insert('users', $data);
    }

    // public function num_rows($id){
    //     $num = $this->db->where('id',$id)
    //              ->get();
    //              return $num->result();
    // }

    public function deleteUserData($id){
        $this->db->where('id',$id);
        $query =$this->db->delete('users');
        if ($query) {
            # code...
            return true;
        } else {
            # code...
            return false;
        }
        
    }
    public function editUserData($id){
        $this -> db ->where('id',$id);
        $query =$this->db->get('users');
        if ($query) {
            # code...
            return $query->row();
        }
    }

    public function updateData($data, $id){
        $this->db->where('id',$id);
        $query = $this->db->update('users',$data);
        if ($query) {
            # code...
            return true;
        }else{
            return false;
        }
    }
}
