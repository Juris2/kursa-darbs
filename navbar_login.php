<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "kursa_darbs";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if(isset($_POST['pieslegties'])){

$epasts = mysqli_real_escape_string($conn,$_POST['epasts']);

$parole = mysqli_real_escape_string($conn,$_POST['parole']);
$parole = md5($parole);

$sel_user = "select ID from lietotaji where epasts='$epasts' AND parole='$parole'";

$run_user = mysqli_query($conn, $sel_user);

$check_user = mysqli_num_rows($run_user);

if($check_user>0){

header("location: index.php");

session_start();

$_SESSION['username']= $epasts;



}

else {


echo "<script>alert('Epasts un/vai parole nav pareiza, mēģiniet vēlreiz!')</script>";
}

}



?>




<?php include('./papild.php'); ?>


   <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<body>

<nav class="navbar navbar-static-top navbar-inverse" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">||||</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="index.php">Sākums</a></li>

        <?php 
        session_start();
        if (isset($_SESSION['username']))
        echo '<li><a href="blogs.php">Blogs</a></li>
        <li><a href="forums.php">Forums</a></li>
        <li><a href="serviss.php">Serviss</a></li>
        <li><a href="veikals.php">Veikals</a></li>
      </ul>
      <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Meklēt">
        </div>
        <button type="submit" class="btn btn-default">Meklēt</button>
      </form>

      '
      ?>
      <?php 
        if (isset($_SESSION['username']))
        echo "<ul class='nav navbar-nav navbar-right'>
      <li><p class='navbar-text'>Sveiks, {$_SESSION['username']}</p></li>
         <li class='dropdown'>
         <a href='#' class='dropdown-toggle' data-toggle='dropdown'><span class='caret'></span></a>
          <ul id='loguser' class='dropdown-menu'>
            <li><a href='profils.php'>Profils</a></li>
            <li><a href='#'>Something</a></li>
            <li><a href='#'>Something</a></li>
            <li role='separator' class='divider'></li>
            <li><a href='logout.php'>Atslēgties</a></li>
          </ul>
         </li>
    
        ";
        else
        echo '</ul>
      <ul class="nav navbar-nav navbar-right">
      <li><p class="navbar-text">Jau esi reģistrējies?</p></li>

    <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b>Pieslēgties</b> <span class="caret"></span></a>
      <ul id="login-dp" class="dropdown-menu">
        <li>
           <div class="row">
              <div class="col-md-12">
                Pieslēgties ar
                <div class="social-buttons">
                  <a href="#" class="btn btn-fb"><i class="fa fa-facebook"></i> Facebook</a>
                  <a href="#" class="btn btn-tw"><i class="fa fa-twitter"></i> Twitter</a>
                </div>
                                vai
                 <form class="form" role="form" method="POST" action="./navbar_login.php" accept-charset="UTF-8" id="login-nav">
                    <div class="form-group">
                       <label class="sr-only" for="exampleInputEmail2">Email address</label>
                       <input type="email" class="form-control" id="exampleInputEmail2" placeholder="e-pasts" name="epasts" required>
                    </div>
                    <div class="form-group">
                       <label class="sr-only" for="exampleInputPassword2">Password</label>
                       <input type="password" class="form-control" id="exampleInputPassword2" placeholder="parole" name="parole" required>
                                             <div class="help-block text-right"><a href="">Aizmirsi paroli?</a></div>
                    </div>
                    <div class="form-group">
                       <button type="submit" class="btn btn-primary btn-block" name="pieslegties">Pieslēgties</button>
                    </div>
                    <div class="checkbox">
                       <label>
                       <input type="checkbox"> Atcerēties mani
                       </label>
                    </div>
                 </form>
              </div>
              <div class="bottom text-center">
                <a href="registracija.php"><b>Reģistrācija</b></a>
              </div>
           </div>
        </li>
      
      ';
        
      ?>

      
    
      </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>


</body>


