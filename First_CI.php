<?php
class First_CI extends CI_Controller{
    function __construct(){

		parent::__construct();
        $this->load->helper('url');
    }
    public function index(){
        $this->load->model('first_model');
        $records=$this->first_model->getRecords();
        $this->load->view('first_ci',['records'=>$records]);
    }
    public function add(){
        $data=array(
            "name"=>$_POST['name'],
			"gender"=>$_POST['gender'],
			"religion"=>$_POST['religion'],
     );         
         $this->load->model('first_model');
         if($this->first_model->saveRecord($data)){
             $this->session->set_flashdata('sukses','Record Saved Successfully');
         }else{
             $this->session->set_flashdata('error','Error');
         }
          redirect('first_ci');
}

    public function delete($id){
        $this->load->model('first_model');
        $record=$this->first_model->deleterecord($id);
        $this->session->set_flashdata('sukses', 'Data Berhasil Dihapus');
		redirect('first_ci'); 
    }
    public function update($id){
        $data=array(
			"name"=>$_POST['name'],
			"gender"=>$_POST['gender'],
			"religion"=>$_POST['religion'],
		);
        $this->load->model('first_model');
        $record=$this->first_model->updaterecord($id,$data);
        //$this->session->set_flashdata('sukses', 'Data Berhasil Diubah');
		redirect('first_ci');
    }
}
?>
