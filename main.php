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
$coachid = $_GET['id'];
 $sql = "SELECT * FROM certifed where id='$coachid'";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)) {
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
	<div class="inner-container">
		  <div class="top-section">
      <div class="container">
      <div class="header">
        <img src="unnamed.png" alt="">  
      </div>
      <div class="profile">
        <div class="profil-pic">
          <!-- <img src=""> -->
          
        </div>
        <div class="profile-content">
          <div class="designation">
            <div class="coach-name">
              <p><?php echo $row['name']; ?><br><span>The Incredible Coach</span></p>
            </div>
            <div class="coach-name">
              <p style="border-right:none"><?php echo $row['city']; ?><br><span><?php echo $row['country']; ?></span></p>
            </div>
          </div>
          <div class="desc-text">
            <p>This coach will help you transform your life in just 10 weeks, using Arfeen Khan’s proven system The Incredible You! This coach is trained and certified by Arfeen Khan and will take you through the 10 week coaching. To know more about the Incredible You 10 week coaching, <span ><a href="" style="color:#eb0b00;text-decoration: underline;">watch this video.</a></span> If you’re interested in getting coached, click the button below and you will get more details.</p>
            <button class="request-btn">Request Coaching Details</button>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php } ?>

<?php
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
    </script>
    <?php
}else{
  $onlycity = 'All cities';
 $sql = "SELECT * FROM certifed";
    $result = mysqli_query($conn, $sql);
}


$cityname = "SELECT DISTINCT city FROM certifed";
$cityresult = mysqli_query($conn, $cityname);
?>
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
                      <li><a onclick="OnSelectChange(this.id)" id="all">All</a></li>
                    <?php
                }else{
                      ?>
                        <li><a onclick="OnSelectChange(this.id)" id="all" style="color: #c6c6c6">All</a></li>
                      <?php
                }
              ?>
              
              <?php 
              while($cityrow = mysqli_fetch_assoc($cityresult)) {
                if($onlycity == $cityrow['city']){
                        ?>
                          <li ><a onclick="OnSelectChange(this.id)" id="<?php echo $cityrow['city']; ?>" style="color: #1b1919"><?php echo $cityrow['city']; ?></a></li>
                        <?php
                    }else{
                          ?>
                            <li ><a onclick="OnSelectChange(this.id)" id="<?php echo $cityrow['city']; ?>" style="color: #c6c6c6"><?php echo $cityrow['city']; ?></a></li>
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
</div>
<script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3/froogaloop.js"></script>
<script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3/froogaloop.js"></script>
<script type="text/javascript">
// $( "#top-image" ).click(function() {
//   document.getElementById("top-image").style.display = "none";
//   var iframe = document.getElementById('vimeo');

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