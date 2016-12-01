<?php
ob_start();

include('./navbar_login.php'); 


if(!isset($_SESSION['username'])){
   header("Location:index.php");
exit;  
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "kursa_darbs";

$conn = mysqli_connect($servername, $username, $password, $dbname);

$sel_user = "select * from lietotaji where epasts = '".$_SESSION['username']."' LIMIT 1 ";
$run_user = mysqli_query($conn, $sel_user);
$lauks = mysqli_fetch_assoc($run_user);


if(isset($_POST['submit'])){
    $vards = $_POST['firstname'];
    $uzvards = $_POST['lastname'];
    $epasts = $_POST['email'];
    $parole = $_POST['password'];
    $dzimsanas_datums = $_POST['birthDate'];
    $valsts = $_POST['country'];
    $dzimums = $_POST['sex'];
    $telefons = $_POST['phone'];

    $parole = md5($parole);


    $sql = "UPDATE lietotaji SET vards='$vards', uzvards='$uzvards', epasts='$epasts', parole='$parole', dzimsanas_datums='$dzimsanas_datums', valsts='$valsts', 
            dzimums='$dzimums', telefons='$telefons' WHERE epasts = '".$_SESSION['username']."' LIMIT 1";

        
            $conn->query($sql);
            $conn->close();


       header("Refresh:0");   
       header("Location:profils.php");  
          
        }

  
  



?>

<head>
<link rel="stylesheet" type="text/css" href="./papildus/style.css">
</head>

<div class="container">
            <form class="form-horizontal" role="form" action="edit_profile.php" method="POST" >
                <h2>Labot profilu</h2>
                <div class="form-group">
                    <label for="firstName" class="col-sm-3 control-label">Vārds</label>
                    <div class="col-sm-9">
                        <input type="text" id="firstName" value="<?php echo $lauks['vards'];?>" class="form-control" name="firstname" autofocus>                 
                    </div>
                </div>
                <div class="form-group">
                    <label for="lastName" class="col-sm-3 control-label">Uzvārds</label>
                    <div class="col-sm-9">
                        <input type="text" id="lastName" value="<?php echo $lauks['uzvards'];?>" class="form-control" name="lastname" autofocus>                      
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="col-sm-3 control-label">E-pasts</label>
                    <div class="col-sm-9">
                        <input type="email" id="email" value="<?php echo $lauks['epasts']?>" class="form-control" name="email">
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-sm-3 control-label">Parole</label>
                    <div class="col-sm-9">
                        <input type="password" id="password" value="<?php echo $lauks['parole']?>" class="form-control" name="password">
                    </div>
                </div>
                <div class="form-group">
                    <label for="birthDate" class="col-sm-3 control-label">Dzimšanas datums</label>
                    <div class="col-sm-9">
                        <input type="date" id="birthDate" value="<?php echo $lauks['dzimsanas_datums']?>" class="form-control" name="birthDate">
                    </div>
                </div>
                <div class="form-group">
                    <label for="birthDate" class="col-sm-3 control-label">Telefons</label>
                    <div class="col-sm-9">
                        <input type="text" id="telefons" value="<?php echo $lauks['telefons']?>" class="form-control" name="phone">
                    </div>
                </div>
                <div class="form-group">
                    <label for="country" class="col-sm-3 control-label" >Valsts</label>
                    <div class="col-sm-9">
                        <select id="country" class="form-control" value="<?php echo $lauks['valsts']?>" name="country">
                            <option>Latvija</option>
                            <option>Okupantu zeme</option>
                            <option>Cita</option>
                        </select>
                    </div>
                </div> <!-- /.form-group -->
                <div class="form-group">
                    <label class="control-label col-sm-3">Dzimums</label>
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-sm-4">
                                <label class="radio-inline">
                                    <input type="radio" id="femaleRadio" value="Sieviete" name="sex" <?php 
                                    if ($lauks['dzimums']=='Sieviete') echo 'checked';?>>Sieviete
                                </label>
                            </div>
                            <div class="col-sm-4">
                                <label class="radio-inline">
                                    <input type="radio" id="maleRadio" value="Vīrietis" name="sex" <?php 
                                    if ($lauks['dzimums']=='Vīrietis') echo 'checked';?>>Vīrietis
                                </label>
                            </div>
                            <div class="col-sm-4">
                                <label class="radio-inline">
                                    <input type="radio" id="unknownRadio" value="Anonīms" name="sex" <?php 
                                    if ($lauks['dzimums']=='Anonīms') echo 'checked';?>>Anonīms
                                </label>
                            </div>
                        </div>
                    </div>
                </div> <!-- /.form-group -->
                
      

                <div class="form-group">
                    <div class="col-sm-9 col-sm-offset-3">
                        <button type="submit" class="btn btn-primary btn-block" name="submit">Saglabāt izmaiņas</button>
                    </div>
                </div>
            </form> <!-- /form -->
        </div> <!-- ./container -->