<?php
 $servername = "localhost";
$username = "root";
$password = "anand@123";
$dbname = "certification";
$onlycity;
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
if(isset($_POST['selectcity']))
{

    $city1= $_POST['selectcity'];
    if($city1 == 'all')
    {
      $onlycity = 'All cities';
        $sql = "SELECT * FROM certifed";
    $result = mysqli_query($conn, $sql);
    }else{
      $onlycity =$city1;
        $sql = "SELECT * FROM certifed WHERE city = '$city1'";
    $result = mysqli_query($conn, $sql);
    }
    ?>
    <script>
        window.location.hash ='user';
        $('html,body').animate({
        scrollTop: $(".coach-selection").offset().top},
        'slow');
    </script>
    <?php
}else{
 $sql = "SELECT * FROM certifed";
    $result = mysqli_query($conn, $sql);
    $onlycity = 'All cities';
}


$cityname = "SELECT DISTINCT city FROM certifed";
$cityresult = mysqli_query($conn, $cityname);
?>
<!Doctype html>
<html lang="en">
<head>
  <title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/responsive.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="wrapper">
	<div class="main-top">
		<div class="container">
			<div class="header2">
 				<img src="unnamed.png" alt="">	
 			</div>
 			<p class="title">The awesome community<br>
				of the incredible coaches<br>
				across the world!
 			</p>
 			<p class="sub-text">Search the incredible coaches, across the world, who are trained by Arfeen Khan to help you transform your life, not by motivating you, but by helping you actually produce real results through the 10 week coaching program, The Incredible You!</p>
 			<p class="auto">Arfeen khan</p>
		</div>
	</div>
	<div class="main-section">
		<div class="container">
			<div class="main-box">
				<p class="all-heading"><span style="color:#eebb5e">Over 1000</span> Certified Incredible <br>
coaches, and counting.</p>
				<p class="sub-desc">Arfeen Khan, with his experience of over 25 years, has created and perfected a system that holds the power to change your life, quite literally! This is the same system he has used with his elite clients and celebrities to help them achieve breakthroughs and transformations in their life. He has brought this incredible system for the masses in the most simplest form. He has created a clan of Mastermind Coaches, which he has trained himself and certified them to deliver his system of transformation called the Incredible You! Every coach certified by Arfeen Khan is listed here. Scroll to see Arfeen’s Mastermind Coaches.</p>
				<div class="video-sec">
				<p class="all-heading">What is incredible you?</p>
				<div class="video">
					<div class="system_video">
						<div id="top-image"></div>
						<iframe id="vimeo" src="https://player.vimeo.com/video/331768283?title=0&amp;byline=0&amp;portrait=0&amp;api=1"  frameborder="0" webkitallowfullscreen="" mozallowfullscreen="" allowfullscreen="" allow="autoplay"></iframe>
					</div>
				</div>
			</div>
			</div>
		</div>
	</div>
</div>
<div class="second-section">
    <div class="container">
      <div class="coach-selection">
        <div class="coach-location">
          <p>Show coaches in all</p>
          <div class="dropdown">
            <button class="select-drop btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">All countries
            <span class="caret"></span></button>
            <ul class="dropdown-menu">
              <li><a>India</a></li>
            </ul>
          </div>

          <div class="dropdown">
            <button class="select-drop btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"><?php
            echo $onlycity;?>
            <span class="caret"></span></button>
            <ul class="dropdown-menu">
              <?php
                if($onlycity == "All cities"){
                    ?>
                      <li style="cursor: pointer;"><a onclick="OnSelectChange(this.id)" id="all">All</a></li>
                    <?php
                }else{
                      ?>
                        <li style="cursor: pointer;"><a onclick="OnSelectChange(this.id)" id="all" style="color: #c6c6c6">All</a></li>
                      <?php
                }
              ?>
              
              <?php 
              while($cityrow = mysqli_fetch_assoc($cityresult)) {
                if($onlycity == $cityrow['city']){
                        ?>
                          <li style="cursor: pointer;"><a onclick="OnSelectChange(this.id)" id="<?php echo $cityrow['city']; ?>" style="color: #1b1919"><?php echo $cityrow['city']; ?></a></li>
                        <?php
                    }else{
                          ?>
                            <li style="cursor: pointer;"><a onclick="OnSelectChange(this.id)" id="<?php echo $cityrow['city']; ?>" style="color: #c6c6c6"><?php echo $cityrow['city']; ?></a></li>
                          <?php
                  }
                ?>
                      
                <?php
              }
              ?>
            </ul>
          </div>
          <form action="" id="myForm" method="post" name="serachform">
            <input type="hidden" name="selectcity" id="hideenvalue">
          </form>
        </div>
        <div class="coach-search">
          <div class="search-container">
              <button type="submit"><i class="fa fa-search"></i></button>
              <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Click here to search a coach by name" name="search">    
          </div>
        </div>
      </div>
      <div class="coach-details" id="myUL">

        <?php
                $a=1;
                while($row = mysqli_fetch_assoc($result)) {
                ?>
          <div class="row data_row newrow <?php echo $row['city']; ?>" id="">
            <div class="col-md-4"><?php echo $a; ?>.&nbsp;&nbsp;<span class="abc"><?php echo $row['name']; ?></span></div>
              <div class="col-md-4"><?php echo $row['city']; ?></div>
              <div class="col-md-4 text-right"><a href="main.php?id=<?php echo $row['id']; ?>"> More details</a></div>
            </div>
    <?php $a++; } ?>
          </div>
        </div>
  </div>
</div>
<script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3/froogaloop.js"></script>
<script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3/froogaloop.js"></script>
<script type="text/javascript">
$( "#top-image" ).click(function() {
  document.getElementById("top-image").style.display = "none";
  var iframe = document.getElementById('vimeo');
$f == Froogaloop
    var player = $f(iframe);
    player.api("play");
});

    function OnSelectChange(abc){
      //alert(abc);
      document.getElementById("hideenvalue").value=abc;
        document.getElementById("myForm").submit();
        
         
    }

  function myFunction() {
      var input, filter, ul, li, a, i, txtValue;
      input = document.getElementById("myInput");
      filter = input.value.toUpperCase();
      ul = document.getElementById("myUL");
      li = ul.getElementsByClassName("newrow");
      for (i = 0; i < li.length; i++) {
          a = li[i].getElementsByClassName("abc")[0];
          txtValue = a.textContent || a.innerText;
          if (txtValue.toUpperCase().indexOf(filter) > -1) {
              li[i].style.display = "";
          } else {
              li[i].style.display = "none";
          }
      }
  }

</script>
</body>
</html>