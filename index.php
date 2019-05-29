
<?php
include_once 'include/db_connect.php';
include_once 'include/functions.php';
 
sec_session_start();
 
if (login_check($mysqli) == true) {
    $logged = 'in';
} else {
    $logged = 'out';
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../assets/ico/favicon.ico">

    <title>Fitness Club</title>
    
    <!-- Bootstrap core CSS -->
    <link href="boot/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="boot/css/main.css" rel="stylesheet">
    <link href="http://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css" text="text/css" rel="stylesheet">
    <link href="boot/css/jquery.bxslider.css" rel="stylesheet" />
    <link href="boot/css/jquery-ui-1.10.4.custom.min.css" rel="stylesheet" />
  
  </head>
  <body>

       <?php
            if (isset($_GET['error'])) {
                echo '<p class="error"></p>';
            }
            if(isset($_GET['reg'])) {
              echo '<p class="reg"></p>';
            }
        ?> 


    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="background-color:#696969;border:none">
    <div class="container">
    <a class="navbar-brand" href="#">
          <img src="abc.png">
        </a>
          <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#" style="color:#FFD700;font-size: 20px;"><b>Fitness Club</b></a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active" id="a">
            <a href="#">Home</a></li>
               <?php if (!isset($_SESSION['username'])){echo'<li><a href="packages.php" style="color:white;font-size: 15px">Package</a></li>
              <li><a href="facilities.php" style="color:white;font-size: 15px" >Facilities</a></li>
            <li><a href="about.php" style="color:white;font-size: 15px">About</a></li>
            <li><a href="contact.php" style="color:white;font-size: 15px">Contact</a></li>
           
            ';
            }
            ?>
           <?php
            if(isset($_SESSION['username'])) {
              echo '<li><a href="./profile/i.php">Profile</a></li>
              <li><a href="./workouts">Workouts</a></li></li>';
              if(isset($_SESSION['admin'])) {
                echo '<li><a href="att.php">Attendance</a></li>';
              }
            }
        
            ?>
            <?php if(isset($_SESSION['admin'])) { ?>
               <li><a href="../admin/a.php">Admin Panel</a></li>
            <?php } ?>
          </ul>
    <?php
      if(isset($_SESSION['username']))
      {
          echo '<form class="navbar-form navbar-right" role="form" action="include/logout.php">
          <input type="submit" class="btn btn-success" value="Sign-out">';
      }
     else
       echo '        
          <form class="navbar-form navbar-right" role="form" method="post" action="include/process_login.php">
           <div class="form-group">
              <input type="text" placeholder="Email" class="form-control" name="email">
            </div>
            <div class="form-group">
              <input type="password" placeholder="Password" class="form-control" name="password">
            </div>
            <input type="submit" class="btn btn-success" value="Sign in" onclick="formhash(this.form, this.form.password);">
            <input type="button" class="btn btn-success" value="Register" onclick="document.location.href= ">
           
          </form>
          
          '
    ?>

        </div><!--/.navbar-collapse -->
      </div>
    </div>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <!-- <div  class="jumbotron" style="background-color:#2E8B57"> -->
        <!-- <ul  class="bxslider" style="slideMargin: -5px" >
          <li><img src="img/A.jpg" /></li>
          <li><img src="img/B.jpg" /></li>
          <li><img src="img/C.jpg" /></li>
          <li><img src="img/D.jpg" /></li>
          <li><img src="img/E.jpg" /></li>
          <li><img src="img/F.jpg" /></li>
          <li><img src="img/G.jpg" /></li>
          <li><img src="img/H.jpg" /></li>
        </ul> -->
        <div id="myCarousel" class="carousel slide" data-ride="carousel" style="height:-5px">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
    <li data-target="#myCarousel" data-slide-to="3"></li>
    <li data-target="#myCarousel" data-slide-to="4"></li>
    <li data-target="#myCarousel" data-slide-to="5"></li>
    <li data-target="#myCarousel" data-slide-to="6"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox" style="background: 10px">
    <div class="item active">
      <img src="img/A.jpg" alt="New York">
      <div class="carousel-caption">
        
      </div> 
    </div>

    <div class="item">
      <img src="img/B.jpg" alt="Chicago">
      <div class="carousel-caption">
       
      </div> 
    </div>

     <div class="item">
      <img src="img/C.jpg" alt="Chicago">
      <div class="carousel-caption">
        
      </div> 
    </div>

     <div class="item">
      <img src="img/D.jpg" alt="Chicago">
      <div class="carousel-caption">
        
      </div> 
    </div>

     <div class="item">
      <img src="img/E.jpg" alt="Chicago">
      <div class="carousel-caption">
       
      </div> 
    </div>

    <div class="item">
      <img src="img/F.jpg" alt="Los Angeles">
      <div class="carousel-caption">
        
      </div> 
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
  
</div>


    
    <div class="container text-center">
  <h2>SERVICES</h2>
  <h4>What we offer</h4>
  <br>
  <div class="row">
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-off"  style="color:red;font-size: 50px;"></span>
      <h4>POWER</h4>
    </div>
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-heart" style="color:orange;font-size: 50px;"></span>
      <h4>LOVE</h4>
    </div>
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-wrench"  style="color:green;font-size: 50px;"></span>
      <h4>HARD WORK</h4>
    </div>
   
    <br><br>
     
  </div>



    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script type="text/JavaScript" src="boot/js/sha512.js"></script> 
        <script type="text/JavaScript" src="boot/js/forms.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="boot/js/bootstrap.min.js"></script>
    <SCRIPT TYPE="text/javascript" src="http://code.jquery.com/jquery-1.9.1.js"></SCRIPT>
    <script type="text/javascript" src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
 <SCRIPT src="boot/js/dialog.js" type="text/javascript"></SCRIPT>
 <script src="boot/js/jquery.bxslider.min.js"></script>
  <script type="text/javascript" src="boot/js/slide.js"></script>
  <script src="boot/js/plugins/jquery.fitvids.js"></script>


  </body>
</html>
