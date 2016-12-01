<?php
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



?>
<head>

</head>

<div class="container">
      <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
   
   
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title"><?php echo $lauks['vards'], ' ', $lauks['uzvards']; ?></h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="<?php echo $lauks['bilde'] ?>" class="img-circle img-responsive"> </div>
                
                
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
                      
                      <tr>
                        <td>Dzimšanas datums:</td>
                        <td><?php echo $lauks['dzimsanas_datums']?></td>
                      </tr>
                      <tr>
                        <td>Dzimums:</td>
                        <td><?php echo $lauks['dzimums']?></td>
                      </tr>
                   
                         <tr>
                             <tr>
                        <td>Valsts:</td>
                        <td><?php echo $lauks['valsts']?></td>
                      </tr>
                      <tr>
                        <td>E-pasts:</td>
                        <td><?php echo $lauks['epasts']?></td>
                      </tr>
                        <tr>
                        <td>Parole:</td>
                        <td><?php echo "*****"?></td>
                      </tr>
                      <tr>
                        <td>Telefona numurs:</td>
                        <td><?php echo $lauks['telefons']?></td>
                           
                      </tr>
                     
                    </tbody>
                  </table>
                  
                </div>
              </div>
            </div>
                 <div class="panel-footer">
                        <a data-original-title="Broadcast Message" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-envelope"></i></a>
                        <span class="pull-right">
                            <a href="edit_profile.php" data-original-title="Edit this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i></a>
                            <a href="delete_profile.php" data-original-title="Remove this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
                        </span>
                    </div>
            
          </div>
        </div>
      </div>
    </div>