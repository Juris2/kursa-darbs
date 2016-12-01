<?php


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "kursa_darbs";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("ERROR:could not connect to the database!!!");
} 

	if(isset($_POST['submit'])){
		$vards = $_POST['firstname'];
		$uzvards = $_POST['lastname'];
		$epasts = $_POST['email'];
		$parole = $_POST['password'];
		$dzimsanas_datums = $_POST['birthDate'];
		$valsts = $_POST['country'];
		$dzimums = $_POST['sex'];

		$parole = md5($parole);


		$sql = "INSERT INTO lietotaji (ID, vards, uzvards, epasts, parole, dzimsanas_datums, valsts, dzimums) VALUES (NULL, '$vards', '$uzvards', '$epasts', '$parole', '$dzimsanas_datums', '$valsts', '$dzimums')";

        if (isset($_POST['rules'])) {
            $conn->query($sql);
            $conn->close();
        } else {
            
          
        }

  
	}

?>




<head>
<link href="libs/css/bootstrap.min.css" rel="stylesheet">
<script src="http://code.jquery.com/jquery-latest.min.js"
        type="text/javascript"></script>
</head>

<body>
<?php include('./navbar_login.php'); ?>
<iframe name="votar" style="display:none;"></iframe>

<div class="container">
            <form class="form-horizontal" role="form" action="registracija.php" method="POST" >
                <h2>Reģistrācija</h2>
                <div class="form-group">
                    <label for="firstName" class="col-sm-3 control-label">Vārds</label>
                    <div class="col-sm-9">
                        <input type="text" id="firstName" placeholder="Vārds" class="form-control" name="firstname" autofocus>                 
                    </div>
                </div>
                <div class="form-group">
                    <label for="lastName" class="col-sm-3 control-label">Uzvārds</label>
                    <div class="col-sm-9">
                        <input type="text" id="lastName" placeholder="Uzvārds" class="form-control" name="lastname" autofocus>                      
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="col-sm-3 control-label">E-pasts</label>
                    <div class="col-sm-9">
                        <input type="email" id="email" placeholder="Email" class="form-control" name="email">
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-sm-3 control-label">Parole</label>
                    <div class="col-sm-9">
                        <input type="password" id="password" placeholder="Password" class="form-control" name="password">
                    </div>
                </div>
                <div class="form-group">
                    <label for="birthDate" class="col-sm-3 control-label">Dzimšanas datums</label>
                    <div class="col-sm-9">
                        <input type="date" id="birthDate" class="form-control" name="birthDate">
                    </div>
                </div>
                <div class="form-group">
                    <label for="country" class="col-sm-3 control-label" >Valsts</label>
                    <div class="col-sm-9">
                        <select id="country" class="form-control" name="country">
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
                                    <input type="radio" id="femaleRadio" value="Sieviete" name="sex">Sieviete
                                </label>
                            </div>
                            <div class="col-sm-4">
                                <label class="radio-inline">
                                    <input type="radio" id="maleRadio" value="Vīrietis" name="sex">Vīrietis
                                </label>
                            </div>
                            <div class="col-sm-4">
                                <label class="radio-inline">
                                    <input type="radio" id="uncknownRadio" value="Anonīms" name="sex" checked>Anonīms
                                </label>
                            </div>
                        </div>
                    </div>
                </div> <!-- /.form-group -->
                
                <div class="form-group">
                    <div class="col-sm-9 col-sm-offset-3">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="rules">Es piekrītu <a href="#">noteikumiem </a>
                            </label>
                        </div>

                    </div>
                    
                </div> <!-- /.form-group -->

                <div class="form-group">
                    <div class="col-sm-12 col-sm-offset-3">
                        
                            <label>
                                <div class="alert alert-danger" role="alert" style="" id="err_log">Pārbaudi vai visi lauki ir aizpildīti!.......</div>
                            </label>
                       

                    </div>
                    
                </div> <!-- /.form-group -->
                
                <div class="form-group">
                    <div class="col-sm-9 col-sm-offset-3">
                        <button type="submit" class="btn btn-primary btn-block" name="submit">Reģistrēties</button>
                    </div>
                </div>
            </form> <!-- /form -->
        </div> <!-- ./container -->
</body>