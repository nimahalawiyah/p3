<?php
class first_model extends CI_Model{
    public function getRecords(){
        $qry=$this->db->get('profil');
        if($qry->num_rows()>0){
            return $qry->result();
        }
    }
    public function saveRecord($data){
      return $this->db->insert('profil', $data);
    }
    public function updaterecord($id,$data){
        return $this->db->where('id',$id)->update('profil',$data);
    }
    public function deleterecord($id){
        return $this->db->delete('profil',array('id'=>$id));
    }
}
?>
