<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');	

class Model extends CI_Model 
 {
     public function checkLogin($data){
         return $this->db->get_where('user',$data)->result_array();
     }
     public function addvideolink($data){
    	$this->db->insert('videolink',$data);
    	return $this->db->insert_id();
    }
    
     public function getLastRecord($vid){

    	return $this->db->get_where('videolink',array('id'=>$vid))->result_array();

    }
     public function getAllvidoelinks($contid){
        $this->db->order_by("id", "desc");
    	$getalldatapro=$this->db->query("SELECT * FROM `videolink` WHERE `userId`='$contid'");
 		return $getalldatapro->result();
    }
    
    public function deletevdolnk($id){
        $this->db->where('id',$id);
    	return 	$this->db->delete('videolink');
    }
    public function deleteArticl($id){
        $this->db->where('id',$id);
    	return 	$this->db->delete('Articles');
    }
     
    function getarticlecount($imgname)
 	{
 		$count=$this->db->query("SELECT * FROM `Articles` WHERE `fileName`='$imgname'");
 		return $count->num_rows();
 	} 
 	function insertArticle($imgname,$contid,$dateimg)
 	{
 		$this->db->query("INSERT INTO `Articles`(`id`, `fileName`, `aDate`, `userId`) VALUES ('','$imgname','$dateimg','$contid')");
 	}
 		function getalldataArticle($contid){
 		     $this->db->order_by("id", "desc");
 		$getalldatapro=$this->db->query("SELECT * FROM `Articles` WHERE `userId`='$contid'");
 		return $getalldatapro->result();
 	}
 		function getalldataPbook($contid){
 		     $this->db->order_by("id", "desc");
 		$getalldatapro=$this->db->query("SELECT * FROM `Published_book` WHERE `userId`='$contid'");
 		return $getalldatapro->result();
 	}
 	 public function addpblink($data){
    	$this->db->insert('Published_book',$data);
    	return $this->db->insert_id();
    }
      public function getLastRecordPb($bpid){

    	return $this->db->get_where('Published_book',array('id'=>$bpid))->result_array();

    }
      public function deletepbook($id){
        $this->db->where('id',$id);
    	return 	$this->db->delete('Published_book');
    }
     
      
 }