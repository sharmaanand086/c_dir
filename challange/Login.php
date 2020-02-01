<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function index(){
         $data['username'] = $this->input->post('email',true);
		$data['password'] = $this->input->post('password',true);
		if(!empty($data['username']) && !empty($data['password'])){
		    $userlogin = $this->Model->checkLogin($data);
		    //var_dump($userlogin);
		    if(count($userlogin) == 1){
		        $forSession =  array('id' =>$userlogin[0]['id'],
				'username' => $userlogin[0]['username'],
				'fname' => $userlogin[0]['name'],
				  );
				//var_dump($forSession);
				$this->session->set_userdata($forSession);
				if($this->session->userdata('id')){
					redirect('Login/challenges');
				}else{
				     
				   ?> <script>window.location.href="http://arfeenkhan.com/actionhub/welcome/userdashboard"; </script> <?php
				//	echo'session not created'; 
				}
		    }else{
		         ?> <script>window.location.href="http://arfeenkhan.com/actionhub/welcome/userdashboard"; </script> <?php
		       
		    }
		}else{
		    ?> <script>window.location.href="http://arfeenkhan.com/actionhub/welcome/userdashboard"; </script> <?php
		    
		}
    }
    
    public function challenges(){
        	if($this->session->userdata('id')){
        	    $uid = $this->session->userdata('id');
        	     $data['allvidoelinks']=	$this->Model->getAllvidoelinks($uid);
        	     $data['getallArticle']=$this->Model->getalldataArticle($uid);
        	     $data['getallpbook']=$this->Model->getalldataPbook($uid);
        	      $data['getallSmedia']=$this->SocialModel->getalldatasocMedia($uid);
        	      $data['datablogs']=$this->BlogsModel->getalldatablogs($uid);
        	       $data['dataftalks']=$this->FreetalksModel->getalldataFreetalks($uid);
        	      $data['datasndbook']=$this->SndbookModel->getalldatasndbook($uid);
        	      $data['dataonech']=$this->OnechModel->getalldataonech($uid);
        	      $data['audio']=$this->AudioModel->getalldataaudio($uid);
        	       $data['threemonth']=$this->ThreemonthStructureModel->getalldataThreemonthStructure($uid);
                $this->load->view('header/header');
        		$this->load->view('header/css');
        		$this->load->view('header/navbar');
        		$this->load->view('challenges',$data);
        		$this->load->view('header/footer');
         		$this->load->view('header/htmlclose');
 		}else{
 		      ?> <script>window.location.href="http://arfeenkhan.com/actionhub/welcome/userdashboard"; </script> <?php
		        
		}
    }
     
    public function addvideolink(){
    if($this->session->userdata('id')){
        if(!$this->input->is_ajax_request()){
	 		//echo "redirec to other url";
	 		$this->session->set_flashdata('error','plase call the ajax request');
	 		redirect('Login/challenges');
	 	}
	 	else
	 	{
	 	    $data['link'] = $this->input->post('videolink',true);
		 	$data['vDate']= date('Y-m-d h:i:sa');
		 	$data['userId']= $this->session->userdata('id');
		 	$result = $this->Model->addvideolink($data);
            if(is_integer($result)){
                $lastrecord = $this->Model->getLastRecord($result);

		 		if(count($lastrecord) === 1){
		 		    $anotherarr['id'] = $lastrecord[0]['id'];
		 			$anotherarr['link'] = $lastrecord[0]['link'];
		 			$anotherarr['vDate'] = $lastrecord[0]['vDate'];
		 			echo json_encode($anotherarr);
		 			//echo json_encode($lastrecord);
		 		}else{
		 		    //	echo "not working";
		 		    	$this->session->set_flashdata('error','Can not add now.');
		 		}
            }else{
	 		    //	echo "failed";
	 				$this->session->set_flashdata('error','Not Added Your data');
		 	}
	 	    
	 	}
    }else{
 		      ?> <script>window.location.href="http://arfeenkhan.com/actionhub/welcome/userdashboard"; </script> <?php
		        
		}
    }
    

    public function uploadarticle(){
        	$contid=$this->session->userdata('id');
			if($_FILES["file"]["name"] != '')
				{
					 $imgname = $_FILES["file"]["name"];
					 date_default_timezone_set("Asia/Kolkata");
					 $dateimg=date("Y-m-d H:i");

					 $countimage=$this->Model->getarticlecount($imgname);
					  
					 if($countimage == 0)
					 {
					 	$this->Model->insertArticle($imgname,$contid,$dateimg);
					 //	  $path = realpath(APPPATH.'../assets/images/articles');
					 	$location = APPPATH.'../assets/images/articles/'.$imgname; 
					 	//echo $location;
				 		move_uploaded_file($_FILES["file"]["tmp_name"], $location);
				 		echo "0";
					 }
					 else{
					 	echo "1";
					 }
				}
    }
    
 
    public function deletevdolnk(){
        if(!$this->input->is_ajax_request())
	 	{
	 		//echo "redirec to other url";
	 		$this->session->set_flashdata('error','plase call the ajax request');
	 		redirect('Login/challenges');
	 	}
	 	else
	 	{
	 		$id = $this->input->post('text',true);

			 	if( !empty($id))
			 	{ 
			 		$id=$this->encryption->decrypt($id);
			 		 $successdeleted = $this->Model->deletevdolnk($id);
			 		 if($successdeleted){
			 		 	echo TRUE;
			 		 	//echo "successfully deleted";
			 		 }else{
			 		 	echo "we can not delete right now";
			 		 }
			 	}
			 	else
			 	{ 
			 			//echo "not workind ....";
			 	}
		 	}
    }
    
    public function deleteArticle(){
        if(!$this->input->is_ajax_request())
	 	{
	 		//echo "redirec to other url";
	 		$this->session->set_flashdata('error','plase call the ajax request');
	 		redirect('Login/challenges');
	 	}
	 	else
	 	{
	 		$id = $this->input->post('text',true);

			 	if( !empty($id))
			 	{ 
			 		$id=$this->encryption->decrypt($id);
			 		 $successdeleted1 = $this->Model->deleteArticl($id);
			 		 if($successdeleted1){
			 		 	echo TRUE;
			 		 	//echo "successfully deleted";
			 		 }else{
			 		 	echo "we can not delete right now";
			 		 }
			 	}
			 	else
			 	{ 
			 			//echo "not workind ....";
			 	}
		 	}
    }
    
    public function uploadsocMedia(){
        	$contid=$this->session->userdata('id');
			if($_FILES["file"]["name"] != '')
				{
					 $imgname = $_FILES["file"]["name"];
					 date_default_timezone_set("Asia/Kolkata");
					 $dateimg=date("Y-m-d H:i");

					 $countimage=$this->Model->getsocMediacount($imgname);
					  
					 if($countimage == 0)
					 {
					 	$this->Model->insertsocMedia($imgname,$contid,$dateimg);
					 //	  $path = realpath(APPPATH.'../assets/images/articles');
					 	$location = APPPATH.'../assets/images/SocialMedia/'.$imgname; 
					 	//echo $location;
				 		move_uploaded_file($_FILES["file"]["tmp_name"], $location);
				 		echo "0";
					 }
					 else{
					 	echo "1";
					 }
				}
    }
    
      public function deletesocMedia(){
        if(!$this->input->is_ajax_request())
	 	{
	 		//echo "redirec to other url";
	 		$this->session->set_flashdata('error','plase call the ajax request');
	 		redirect('Login/challenges');
	 	}
	 	else
	 	{
	 		$id = $this->input->post('text',true);

			 	if( !empty($id))
			 	{ 
			 		$id=$this->encryption->decrypt($id);
			 		 $successdeleted1 = $this->Model->deleteArticl($id);
			 		 if($successdeleted1){
			 		 	echo TRUE;
			 		 	//echo "successfully deleted";
			 		 }else{
			 		 	echo "we can not delete right now";
			 		 }
			 	}
			 	else
			 	{ 
			 			//echo "not workind ....";
			 	}
		 	}
    }
    
    public function logout(){
		if($this->session->userdata('id')){
			$this->session->set_userdata('id','');
			
			  ?> <script>window.location.href="http://arfeenkhan.com/actionhub/welcome/userdashboard"; </script> <?php
		
		}else{
		  ?> <script>window.location.href="http://arfeenkhan.com/actionhub/welcome/userdashboard"; </script> <?php
			
		}
	}

    
}

?>