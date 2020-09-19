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
        <h1 class="display-4">Welcome,Students !</h1>
        <p class="lead">This is the student ERP portal, only platform you need for your academic management.</p>
        </div>
    </div>
    </div>
    <div class="col">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
          <div class="form-group">
            <label>Registration ID</label>
            <input name="id" type="text" class="form-control" id="registration_id" aria-describedby="emailHelp" required>
          </div>
            <div class="form-group">
            <label>Name</label>
            <input name="name" type="text" class="form-control" id="registration_id" aria-describedby="emailHelp" required>
          </div>
        <div class="form-group">
            <label>Semester</label>
              <select name = "sem" class="custom-select" id="validationCustom04" required>
                <option selected value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
              </select>
          </div>
          <div class="form-group">
             <label>Department</label>
              <select name="dept_id" class="custom-select" id="validationCustom04" required>
                <option selected value="EN101">Computer Science and Engineering</option>
                <option value="EN102">Electrical Communications and Engineering</option>
                <option value="EN103">Electrical and Electronics Engineering</option>
                <option value="EN104">Mechanical Engineering</option>
                <option value="EN105">Information Technology</option>
                <option value="EN106">Civil Engineering</option>
                  
              </select>
          </div>
            <div class="form-group">
            <label>Password</label>
            <input name="pass" type="password" class="form-control" id="registration_id" aria-describedby="emailHelp" required>
          </div>
          <button type="submit" class="btn btn-primary">Sign Up</button>
        </form>
    
    <?php
// define variables and set to empty values
$id = $password = $dept_id = $sem = $name="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //start_session();
    include_once 'database.php' ;
    $id = test_input($_REQUEST["id"]);
    $name = test_input($_REQUEST["name"]);
    $sem = test_input($_REQUEST["sem"]);
    $dept_id = test_input($_REQUEST["dept_id"]);
    $password = test_input($_REQUEST["pass"]);
    
    $db = new Database();
    $conn=$db->getConnection();
    $query = 'INSERT INTO `student`(`reg_id`, `name`, `sem`, `dept_id`, `password`) VALUES (?,?,?,?,?)';
//    echo $query ."\n";
//    echo $id ;
//    echo $password ;
    
    $stmt = $conn->prepare($query);
    $stmt->bindParam(1,$id);
    $stmt->bindParam(2,$name);
    $stmt->bindParam(3,$sem,PDO::PARAM_INT);
    $stmt->bindParam(4,$dept_id);
    $stmt->bindParam(5,$password);
    
    
    
    
    if($stmt->execute()){
        echo '<p class=" text-success ">Login Successfull,Redirecting . . .</p>';
        //$_SESSION["student_id"] = $id ;
        header("Location: student_login.php");
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
?>      </div>
    </div>    
 </div>   
    


        
    
    
    
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>