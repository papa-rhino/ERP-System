<html>

<head>
    <title>
        Student ERP
    </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
</head>
<body>

<div class="container-fluid pt-2">
    <?php 
    require_once 'navbar.php' ;
?>
    <div class="row pt-2">
    <div class="col">
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
        <h1 class="display-4">Welcome,Faculties !</h1>
        <p class="lead">This is the student ERP portal, only platform you need for your academic management.</p>
        </div>
    </div>
    </div>
    <div class="col">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
          <div class="form-group">
            <label>Registration ID</label>
            <input name="registration_id" type="text" class="form-control" id="registration_id" aria-describedby="emailHelp" required>
            <small id="emailHelp" class="form-text text-muted"> Never share your details with anyone else.</small>
          </div>
          <div class="form-group">
            <label>Password</label>
            <input name= "password" type="password" class="form-control" id="password" required>
          </div>
          <button type="submit" class="btn btn-primary">Login</button>
        </form>
    
    <?php
// define variables and set to empty values
$id = $password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include_once 'database.php' ;
    $id = test_input($_REQUEST["registration_id"]);
    $password = test_input($_REQUEST["password"]);
    $db = new Database();
    $conn=$db->getConnection();
    $query = 'Select * from teacher where teach_id = " '.$id.' " and password = " '.$password.' " ';
//    echo $query ."\n";
//    echo $id ;
//    echo $password ;
    
    $stmt = $conn->prepare($query);
    if($stmt->execute()){
        echo '<p class=" text-success ">Login Successfull,Redirecting . . .</p>';
        header("Location: teacher_land.php");
        exit ;
    }
    else{
        echo '<p class=" text-danger ">Login Failed, Wrong Registration Id or Password</p>';
    }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>    </div>
    </div>    
 </div>   
    


        
    
    
    
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>