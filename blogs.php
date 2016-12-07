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



$lietotajs = "SELECT ID FROM lietotaji Where epasts = '".$_SESSION['username']."' LIMIT 1 ";
    mysqli_query($conn, $lietotajs);
    $run_user = mysqli_query($conn, $lietotajs);
    $lauks = mysqli_fetch_assoc($run_user);

    $lietot_id = $lauks['ID'];


if(isset($_POST['addcomment'])){
    $virsraksts = $_POST['virsraksts'];
    $teksts = $_POST['teksts'];



    
    $sql = "INSERT INTO komentari VALUES (NULL, '$virsraksts', '$teksts', '$lietot_id')";

        
            $conn->query($sql);
            $conn->close();

 

       header("Refresh:0");   

          
        }


    if(isset($_GET['delcomment'])){
            $delete="DELETE FROM komentari WHERE ID={$_GET['delcomment']} LIMIT 1";

         mysqli_query($conn, $delete);
    };

    
//     if(isset($_GET['editcomment'])){
//            $delete="UPDATE komentari SET nosaukums='$nosaukums', teksts='$teksts' WHERE ID={$_GET['editcomment']} LIMIT 1";
//
//         mysqli_query($conn, $delete);
//    };




   
 


?>

<div class="container">
  <div class="page-header">
    <h1 id="timeline">Timeline</h1>
  </div>




  <ul class="timeline">

<li class="timeline">
 <div class="timeline-badge success"><i class="glyphicon glyphicon-edit" id="glyphicon"></i></div>
      <div class="timeline-panel">
      <form method="POST" action="blogs.php">
   <div class="form-group">
    <label for="comment">Virsraksts:</label>
    <input type="text" class="form-control" id="comment" name="virsraksts"></textarea>
   </div>
   <div class="form-group">
    <label for="comment">Teksts:</label>
    <textarea class="form-control" rows="5" id="comment" name="teksts"></textarea>
   </div>
   <span class="pull-right">
   <button type="submit" class="btn btn-sm btn-warning" name="addcomment"><i class="glyphicon glyphicon-ok"></i>
   </span>
   </form>
   </div>
  </li>

<?php 
 $komentars = "SELECT * FROM komentari Where lietotajs = '$lietot_id' ORDER by ID DESC";
    $jee = mysqli_query($conn, $komentars);
while ($kom = mysqli_fetch_assoc($jee)){ $ID = $kom['ID']; echo ' 
    <li '?><?php if ($kom['ID']%2==0) echo 'class="timeline-inverted"'; else echo 'class="timeline"';?><?php echo ' ID="' . $kom['ID'] . '">
      <div class="timeline-badge success"><i class="glyphicon glyphicon-thumbs-up" id="glyphicon"></i></div>
      <div class="timeline-panel">
      <form method="GET" action="blogs.php">
        <div class="timeline-heading">
          <h4 class="timeline-title">' . $kom['nosaukums'] . '</h4>
        </div>
        <div class="timeline-body">
          <p>' . $kom['teksts'] . '</p>
        </div>
        <span class="pull-right">
                            <button type="button" class="btn btn-sm btn-warning"  data-toggle="modal" data-target="#myModal"><i class="glyphicon glyphicon-edit"></i></button>
                            <a href="blogs.php?delcomment=' . $ID . '" data-original-title="Remove this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
        </span>
        </form>
      </div>
    </li>

    '; } ?>

  </ul>
</div>




<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Labot komentāru:</h4>
      </div>
      <form method="POST" action="blogs.php">
      <div class="modal-body">
      <div class="form-group">
    <label for="comment">Virsraksts:</label>
    <input type="text" class="form-control"  name="editvirsraksts" value="<?php echo $kom['nosaukums']?>"></textarea>
   </div>
   <div class="form-group">
    <label for="comment">Teksts:</label>
    <textarea class="form-control" rows="5"  name="editteksts" value="<?php echo $kom['teksts']?>"></textarea>
   </div>
   </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Aizvērt</button>
        <button type="submit" class="btn btn-primary" name="editcomment" ><?php echo '<a href="blogs.php?editcomment=' . $ID . '" data-original-title="EDIT" data-toggle="tooltip" type="button" class="btn btn-sm btn-danger">Labot</a> ';?></button>
        
      </div>
    </div>
    </form>

  </div>
</div>
