<?php
session_start(); 
mysql_connect('localhost','root','');
mysql_select_db("db_fashionlook");
if(isset($_SESSION['username'])){
  //echo "<script>window.location='admin/index.php'</script>";
}else{

}
?>

<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
  
<!-- Mirrored from getbootstrap.com/examples/signin/ by HTTrack Website Copier/3.x [XR&CO'2013], Sun, 31 Aug 2014 14:51:06 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Signin Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">

  </head>

  <body>

    <div class="container">

      <form class="form-signin" role="form" action="login.php" method="post">
        <h2 class="form-signin-heading">Please sign in</h2>
        <input type="text" name="username" class="form-control" placeholder="Username" required autofocus>
        <input type="password" class="form-control" placeholder="Password" name="password" required>
        
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="login">Sign in</button>
      </form>

    </div> <!-- /container -->
  </body>

<!-- Mirrored from getbootstrap.com/examples/signin/ by HTTrack Website Copier/3.x [XR&CO'2013], Sun, 31 Aug 2014 14:51:06 GMT -->
</html>
<?php 
function cekLogin(){

  $statement =sprintf("SELECT * FROM users WHERE username = '%s' AND password = '%s'",
$_POST['username'],
md5($_POST['password'])
   );
  $query = mysql_query($statement);
  $data = mysql_fetch_array($query);
  $jml = mysql_num_rows($query);

  if($jml == 1){
    $_SESSION['username'] = $data['username'];
    echo "<script>window.location='admin/index.php'</script>";
  }else{
    echo "<script>alert('Username atau password salah!')</script>";
  }

}
if(isset($_POST['login'])){
  cekLogin();
  } 
  
?>
