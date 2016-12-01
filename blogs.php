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
    
    $del = "DELETE FROM komentari WHERE ID = {$_GET['delcomment']} ";

       unset($kom); 
            $conn->query($del);
            $conn->close();

 

       header("Refresh:0");   

          
        }

    $komentars = "SELECT * FROM komentari Where lietotajs = '$lietot_id' ORDER by ID DESC";
    mysqli_query($conn, $komentars);
    $jee = mysqli_query($conn, $komentars);
 


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

<?php while ($kom = mysqli_fetch_assoc($jee)){ echo ' 
    <li '?><?php if ($kom['ID']%2==0) echo 'class="timeline-inverted"'; else echo 'class="timeline"';?><?php echo ' name="' . $kom['ID'] . '">
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
                            <button type="submit" class="btn btn-sm btn-warning" name="editcomment"><i class="glyphicon glyphicon-edit"></i>
                            <button type="submit" class="btn btn-sm btn-danger" name="delcomment"><i class="glyphicon glyphicon-remove"></i></a>
        </span>
        </form>
      </div>
    </li>

    '; } ?>

  </ul>
</div>