<div class="main-container">
	<div class="top-header">
		<div class="header">
			<img src="https://www.arfeenkhan.com/stfaction/assets/user/images/logo.png" style="width:200px;">
	        <div class="myname dropdown">
	         <p class="frhvr"><?php echo $this->session->userdata('fname'); ?> <span class="caret down"></span></p>
	            <div class="dropdown-content">
	             <a href="<?php echo site_url('Login/logout'); ?>" style=" ">Logout</a><br>
	             <a href="" style=""> </a>
	           </div>
	        </div>
	    </div>
	    <h2>STF CHALLENGE</h2>
	</div>
    <div class="main-section">
    	<div class="container">
    		<div class="assignment">
    			<div class="video">
		    		<h3 class="title">Videos (40 Videos)</h3>
		    		<p class="desc">Upload your articles below</p>
		    		<div class="add-link" id="add-video">
		    			<input type="text" name="videolink" id="videolink" placeholder="Add Your video link here">
		    			<button id="video"  type="submit" name="submit"   class="mysubmit">ADD</button>
		    			<div  class="feedback" id="deletefade"></div>
		    			<div  class="feedbacksucccess" id="successfade"></div>
		    		</div>
		    	</div>
		    	<div class="assignment-remove">
		    	    <div class="article-display">
						<ol id="listProg3" >
						    <?php  foreach ($allvidoelinks as $vdolnk): ?>
						  <li class="mb-4 newclass" id="articl<?php echo $vdolnk->id;  ?>">
						  	<div class=" f-w-500 font-20px article-details">
						  		<p><?php echo $vdolnk->link;  ?></p>
						  		<h6><?php echo date("jS F, Y H:i", strtotime($vdolnk->vDate));  ?></h6>
						  	</div>
						  	<a href="javascript:void(0)" data-text="<?php  echo $this->encryption->encrypt($vdolnk->id);  ?>" data-id="<?php echo  $vdolnk->id; ?>" class="deletevdolnk">
						  	<img class="wrong" src="<?php echo base_url('assets/images/wrong.png'); ?>">
						  	</a>
						  
						  </li>
						  <?php endforeach; ?>
						</ol> 
						
					</div>
		    	</div>
	    	</div>

	    	<div class="assignment">
	    		<h3 class="title">Articles (10 Articles)</h3>
	    		 <p class="desc">Upload your articles below</p> 
	    		<div class="add-link">
					  <span id="filename">Add Doc, Docx, Pdf File here</span>
					  <label for="file-upload">Browse<input type="file" name="userfile"  id="file-upload"></label>
					  <div class="feedbackarticle" id="deletefadearticle"></div>
					  <div class="feedbackupload" id="uploadfadearticle"></div>
					   <div class="feedbacksuccess" id="successfadearticle"></div>
					<div class="article-display">
						<ol id="listProg3" >
						    <?php  foreach ($getallArticle as $atrcl): ?>
						  <li class="mb-4 newclass" id="articl<?php echo $atrcl->id;  ?>">
						  	<div class=" f-w-500 font-20px article-details">
						  		<p><?php echo $atrcl->fileName;  ?></p>
						  		<h6><?php echo date("jS F, Y H:i", strtotime($atrcl->aDate));  ?></h6>
						  	</div>
						  	<a href="javascript:void(0)" data-text="<?php  echo $this->encryption->encrypt($atrcl->id);  ?>" data-id="<?php echo  $atrcl->id; ?>" class="delarticle">
						  	<img class="wrong" src="<?php echo base_url('assets/images/wrong.png'); ?>">
						  	</a>
						  
						  </li>
						  <?php endforeach; ?>
						</ol> 
						
					</div>
	    		</div>
	    	</div>

	    	<div class="assignment">
	    		<h3 class="title">Published book  (online)</h3>
	    		 <p class="desc">Paste your link below online published book</p> 
	    		<div class="add-link" id="Pbook">
	    			<input type="text"  name="Pbooklink" id="Pbooklink" placeholder="Add your online published book link here">
	    			<button id="Pbook"  type="submit" name="submit" class="myPbooklink" >ADD</button>
	    				<div  class="feedback" id="deletefade1"></div>
		    			<div  class="feedbacksucccess" id="successfade1"></div>
	    		</div>
	    		<div class="assignment-remove">
	    		   
	    		  <div class="article-display">
						<ol id="listProg3" >
						    <?php  foreach ($getallpbook as $pbook): ?>
						  <li class="mb-4 newclass" id="articl<?php echo $pbook->id;  ?>">
						  	<div class=" f-w-500 font-20px article-details">
						  		<p><?php echo $pbook->pb_link;  ?></p>
						  		<h6><?php echo date("jS F, Y H:i", strtotime($pbook->pbDate));  ?></h6>
						  	</div>
						  	<a href="javascript:void(0)" data-text="<?php  echo $this->encryption->encrypt($pbook->id);  ?>" data-id="<?php echo  $pbook->id; ?>" class="deletepbook">
						  	<img class="wrong" src="<?php echo base_url('assets/images/wrong.png'); ?>">
						  	</a>
						  
						  </li>
						  <?php endforeach; ?>
						</ol> 
						
					</div>
		    	</div>
	    	</div>

	    	<div class="assignment">
	    		<h3 class="title">Social media</h3>
	    		 <p class="desc">50 Tweets, 50 Instagram and 50 Facebook post upload document of post</p> 
	    		<div class="add-link">
	    			<!--<input type="text" placeholder="upload document of 50 Tweets, 50 Instagram and 50 Facebook post (Format: png , doc , jpeg , pdf)">-->
	    			<!--<button>ADD</button>-->
	    			 <span class="imagerr_sm"></span>
	    		        <span class="imagsuccess_sm"></span>
					  <span id="filename">Add Doc, Docx, Pdf, Png, Jpeg File here</span>
					  <label for="file-upload15">Browse<input type="file" name="userfile15"  class="upload_socialMedia" id="file-upload15"></label>
	    			 <div class="feedbackarticle" id="deletefadeSM"></div>
					  <div class="feedbackupload" id="uploadfadeSM"></div>
					   <div class="feedbacksuccess" id="successfadeSM"></div>
					<div class="article-display">
						<ol id="listProg4" >
						    <?php  foreach ($getallSmedia as $Smedia): ?>
						  <li class="mb-4 newclass" id="SM<?php echo $Smedia->id;  ?>">
						  	<div class=" f-w-500 font-20px article-details">
						  		<p><?php echo $Smedia->fileName;  ?></p>
						  		<h6><?php echo date("jS F, Y H:i", strtotime($Smedia->SmDate));  ?></h6>
						  	</div>
						  	<a href="javascript:void(0)" data-text="<?php  echo $this->encryption->encrypt($Smedia->id);  ?>" data-id="<?php echo  $Smedia->id; ?>" class="delSoMedia">
						  	<img class="wrong" src="<?php echo base_url('assets/images/wrong.png'); ?>">
						  	</a>
						  
						  </li>
						  <?php endforeach; ?>
						</ol> 
						
					</div>
	    		</div>
	    	</div>

	    	<div class="assignment">
	    		<h3 class="title">Audio's (10 Audio's )</h3>
	    		 <p class="desc">upload your audio file below</p> 
	    		<div class="add-link">
	    			<!--<input type="text" placeholder="upload your audio file here(Format: mp4)">-->
	    			<!--<button>ADD</button>-->
	    			<span class="imagerr_sm"></span>
	    		        <span class="imagsuccess_sm"></span>
					  <span id="filename">Add MP4 File here</span>
					  <label for="file-upload16">Browse<input type="file" name="userfile16"  class="upload_socialMedia" id="file-upload16"></label>
					  <div class="feedbackarticle" id="deletefadeAF"></div>
					  <div class="feedbackupload" id="uploadfadeAF"></div>
					   <div class="feedbacksuccess" id="successfadeAF"></div>
					<div class="article-display">
						<ol id="listProg4" >
						    <?php  foreach ($audio as $audio2): ?>
						  <li class="mb-4 newclass" id="AF<?php echo $audio2->id;  ?>">
						  	<div class=" f-w-500 font-20px article-details">
						  		<p><?php echo $audio2->fileName;  ?></p>
						  		<h6><?php echo date("jS F, Y H:i", strtotime($audio2->aDate));  ?></h6>
						  	</div>
						  	<a href="javascript:void(0)" data-text="<?php  echo $this->encryption->encrypt($audio2->id);  ?>" data-id="<?php echo  $audio2->id; ?>" class="delAudioFile">
						  	<img class="wrong" src="<?php echo base_url('assets/images/wrong.png'); ?>">
						  	</a>
						  
						  </li>
						  <?php endforeach; ?>
						</ol> 
						
					</div>
	    		</div>
	    	</div>

	    	<div class="assignment">
	    		<h3 class="title">3 month structure</h3>
	    		 <p class="desc">Upload your file below</p> 
	    		<div class="add-link">
	    			<!--<input type="text" placeholder="Upload your file(Format: doc , pdf)">-->
	    			<!--<button>ADD</button>-->
	    				<span class="imagerr_sm"></span>
	    		        <span class="imagsuccess_sm"></span>
					  <span id="filename">Add Doc, Docx, Pdf File here</span>
					  <label for="file-upload17">Browse<input type="file" name="userfile17"  class="upload_socialMedia" id="file-upload17"></label>
					  
	    		        <div class="feedbackarticle" id="deletefadeTMS"></div>
					  <div class="feedbackupload" id="uploadfadeTMS"></div>
					   <div class="feedbacksuccess" id="successfadeTMS"></div>
					<div class="article-display">
						<ol id="listProg4" >
						    <?php  foreach ($threemonth as $threemonths): ?>
						  <li class="mb-4 newclass" id="THMS<?php echo $threemonths->id;  ?>">
						  	<div class=" f-w-500 font-20px article-details">
						  		<p><?php echo $threemonths->fileName;  ?></p>
						  		<h6><?php echo date("jS F, Y H:i", strtotime($threemonths->tmsDate));  ?></h6>
						  	</div>
						  	<a href="javascript:void(0)" data-text="<?php  echo $this->encryption->encrypt($threemonths->id);  ?>" data-id="<?php echo  $threemonths->id; ?>" class="threemonthsstructure">
						  	<img class="wrong" src="<?php echo base_url('assets/images/wrong.png'); ?>">
						  	</a>
						  
						  </li>
						  <?php endforeach; ?>
						</ol> 
						
					</div>
	    		</div>
	    	</div>

	    	<div class="assignment">
	    		<h3 class="title">1 day preview structure</h3>
	    		 <p class="desc">Upload your file below</p> 
	    		<div class="add-link">
	    			<span class="imagerr"></span>
	    		        <spam class="imagsuccess"></spam>
					  <span id="filename">Add Doc, Docx, Pdf File here</span>
					  <label for="file-upload14">Browse<input type="file" name="userfile14"  id="file-upload14"></label>
					  <div class="feedbackarticle" id="deletefadeODPS"></div>
					  <div class="feedbackupload" id="uploadfadeODPS"></div>
					   <div class="feedbacksuccess" id="successfadeODPS"></div>
					<div class="article-display">
						<ol id="listProg3" >
						    <?php  foreach ($dataonech as $atrcl14): ?>
						  <li class="mb-4 newclass" id="ODPS<?php echo $atrcl14->id;  ?>">
						  	<div class=" f-w-500 font-20px article-details">
						  		<p><?php echo $atrcl14->fileName;  ?></p>
						  		<h6><?php echo date("jS F, Y H:i", strtotime($atrcl14->odpsDate));  ?></h6>
						  	</div>
						  	<a href="javascript:void(0)" data-text="<?php  echo $this->encryption->encrypt($atrcl14->id);  ?>" data-id="<?php echo  $atrcl14->id; ?>" class="delODPS">
						  	<img class="wrong" src="<?php echo base_url('assets/images/wrong.png'); ?>">
						  	</a>
						  
						  </li>
						  <?php endforeach; ?>
						</ol> 
						
					</div>
	    		</div>
	    	</div>

	    	<div class="assignment">
	    		<h3 class="title">2nd Book first chapter</h3>
	    		 <p class="desc">Upload your file below</p> 
	    		<div class="add-link">
	    			<span class="imagerr"></span>
	    		        <spam class="imagsuccess"></spam>
					  <span id="filename">Add Doc, Docx, Pdf File here</span>
					  <label for="file-upload13">Browse<input type="file" name="userfile13"  id="file-upload13"></label>
					  <div class="feedbackarticle" id="deletefadeSBFC"></div>
					  <div class="feedbackupload" id="uploadfadeSBFC"></div>
					   <div class="feedbacksuccess" id="successfadeSBFC"></div>
					<div class="article-display">
						<ol id="listProg3" >
						    <?php  foreach ($datasndbook as $atrcl13): ?>
						  <li class="mb-4 newclass" id="SBFC<?php echo $atrcl13->id;  ?>">
						  	<div class=" f-w-500 font-20px article-details">
						  		<p><?php echo $atrcl13->fileName;  ?></p>
						  		<h6><?php echo date("jS F, Y H:i", strtotime($atrcl13->sbfcDate));  ?></h6>
						  	</div>
						  	<a href="javascript:void(0)" data-text="<?php  echo $this->encryption->encrypt($atrcl13->id);  ?>" data-id="<?php echo  $atrcl13->id; ?>" class="delSBFC">
						  	<img class="wrong" src="<?php echo base_url('assets/images/wrong.png'); ?>">
						  	</a>
						  
						  </li>
						  <?php endforeach; ?>
						</ol> 
						
					</div>
	    		</div>
	    	</div>


	    		<div class="assignment">
	    		<h3 class="title">Blogs (10 blogs)</h3>
	    		 <p class="desc">Upload your file below</p> 
	    		<div class="add-link">
	    			<span class="imagerr"></span>
	    		        <spam class="imagsuccess"></spam>
					  <span id="filename">Add Doc, Docx, Pdf File here</span>
					  <label for="file-upload12">Browse<input type="file" name="userfile12"  id="file-upload12"></label>
					  <div class="feedbackarticle" id="deletefadeBlog"></div>
					  <div class="feedbackupload" id="uploadfadeBlog"></div>
					   <div class="feedbacksuccess" id="successfadeBlog"></div>
					<div class="article-display">
						<ol id="listProg3" >
						    <?php  foreach ($datablogs as $atrcl12): ?>
						  <li class="mb-4 newclass" id="Blog<?php echo $atrcl12->id;  ?>">
						  	<div class=" f-w-500 font-20px article-details">
						  		<p><?php echo $atrcl12->fileName;  ?></p>
						  		<h6><?php echo date("jS F, Y H:i", strtotime($atrcl12->bDate));  ?></h6>
						  	</div>
						  	<a href="javascript:void(0)" data-text="<?php  echo $this->encryption->encrypt($atrcl12->id);  ?>" data-id="<?php echo  $atrcl12->id; ?>" class="delBlog">
						  	<img class="wrong" src="<?php echo base_url('assets/images/wrong.png'); ?>">
						  	</a>
						  
						  </li>
						  <?php endforeach; ?>
						</ol> 
						
					</div>
	    		</div>
	    	</div>
	    	<div class="assignment">
	    		<h3 class="title">Free Talks</h3>
	    		 <p class="desc">Upload your file below</p> 
	    		<div class="add-link">
	    			<span class="imagerr"></span>
	    		        <spam class="imagsuccess"></spam>
					  <span id="filename">Add Doc, Docx, Pdf File here</span>
					  <label for="file-upload123">Browse<input type="file" name="userfile123"  id="file-upload123"></label>
					  <div class="feedbackarticle" id="deletefadeftalk"></div>
					  <div class="feedbackupload" id="uploadfadeftalk"></div>
					   <div class="feedbacksuccess" id="successfadeftalk"></div>
					<div class="article-display">
						<ol id="listProg3" >
						    <?php  foreach ($dataftalks as $atrcl123): ?>
						  <li class="mb-4 newclass" id="ftalks<?php echo $atrcl123->id;  ?>">
						  	<div class=" f-w-500 font-20px article-details">
						  		<p><?php echo $atrcl123->fileName;  ?></p>
						  		<h6><?php echo date("jS F, Y H:i", strtotime($atrcl123->ftDate));  ?></h6>
						  	</div>
						  	<a href="javascript:void(0)" data-text="<?php  echo $this->encryption->encrypt($atrcl123->id);  ?>" data-id="<?php echo  $atrcl123->id; ?>" class="delftalks">
						  	<img class="wrong" src="<?php echo base_url('assets/images/wrong.png'); ?>">
						  	</a>
						  
						  </li>
						  <?php endforeach; ?>
						</ol> 
						
					</div>
	    		</div>
	    	</div>
	    	
	    	<!--<div style="text-align: center;"><button class="sub-btn">Submit</button></div>-->
    	</div>
    </div>
</div>
 