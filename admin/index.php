<?php
session_start();
mysql_connect('localhost','root','');
mysql_select_db("kredit_fashion111");
if(!isset($_SESSION['username'])){
  echo "Acces denied!";
}else{
  if(isset($_GET['logout'])){
    session_destroy();
    echo "<script>window.location='../index.php'</script>";
  }
?>
<!DOCTYPE html>
<html lang="en">
  
<!-- Mirrored from getbootstrap.com/examples/navbar/ by HTTrack Website Copier/3.x [XR&CO'2013], Sun, 31 Aug 2014 14:51:01 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>CMS fashion App</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/css/navbar-static-top.css" rel="stylesheet">

    
  </head>

  <body>

    

      <!-- Static navbar -->
      <div class="navbar navbar-default navbar-static-top" role="navigation">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="?">Fashion</a>
          </div>
          <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
             
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Data fashion <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="?page=fashion">Input Data</a></li>
                  <li><a href="?page=fashion&show">Show Data</a></li>
                </ul>
              </li>

                
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li><a href="?logout">Logout</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </div>

      <!-- Main component for a primary marketing message or call to action -->
      <div class="jumbotron">
      <?php
      if(isset($_GET['page'])){
        include('contents/'.$_GET['page'].'.php');
      }
      ?>
      </div>

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    
  </body>

<!-- Mirrored from getbootstrap.com/examples/navbar/ by HTTrack Website Copier/3.x [XR&CO'2013], Sun, 31 Aug 2014 14:51:02 GMT -->
</html>
<?php  }?>
