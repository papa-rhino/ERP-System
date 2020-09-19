<html>
<head>
    <title>
        Student ERP
    </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
</head>
<body>
<div class="container-fluid pt-2 h-100">
<?php 
    require_once 'navbar.php' ;
?>
    
  <div class="row pt-2 ">
    <div class="col-2 border-right border-secondary">
    <div class="list-group">
              <a href="hod_land.php" class="list-group-item list-group-item-action active">
                Manage Teacher
              </a>
              <a href="hod_manage_event.php" class="list-group-item list-group-item-action">Manage Event</a>
              <a href="hod_manage_attendance.php" class="list-group-item list-group-item-action">Manage Attendance</a>
    </div>
    </div> 
      
<div class="accordion col-10" id="accordionExample">
  <div class="card">
    <div class="card-header" id="headingOne">
      <h2 class="mb-0">
        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
         Delete Teacher
        </button>
      </h2>
    </div>

    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body">
        <form action="<?php $_SERVER["PHP_SELF"] ?>" method="post">
            
            <div class="form-group">
            <input name="opr" type="hidden" class="form-control" value="delete">
            </div>
          <div class="form-group">
            <label >Teacher Id</label>
            <input name="id" type="text" class="form-control" aria-describedby="emailHelp" required>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingTwo">
      <h2 class="mb-0">
        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Update Teacher
        </button>
      </h2>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
      <div class="card-body">
        <form action="<?php $_SERVER["PHP_SELF"] ?>" method="post">
            
            <div class="form-group">
            <input name="opr" type="hidden" class="form-control" value="update">
            </div>
          <div class="form-group">
            <label >Teacher Id</label>
            <input name="id" type="text" class="form-control" aria-describedby="emailHelp" required>
          </div>
          <div class="form-group">
            <label>Name</label>
            <input name="name" type="text" class="form-control" >
          </div>
          <div class="form-group">
            <label>Course ID</label>
            <input name="course_id" type="text" class="form-control" >
          </div>
          <div class="form-group">
            <label>Department</label>
            <input name="dept_id" type="text" class="form-control" >
          </div>
          <div class="form-group">
            <label>Password</label>
            <input name="password" type="text" class="form-control" >
          </div>
          
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingThree">
      <h2 class="mb-0">
        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          Add Teacher
        </button>
      </h2>
    </div>
    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
      <div class="card-body">
        <form action="<?php $_SERVER["PHP_SELF"] ?>" method="post">
            
            <div class="form-group">
            <input name="opr" type="hidden" class="form-control" value="add">
            </div>
          <div class="form-group">
            <label >Teacher Id</label>
            <input name="id" type="text" class="form-control" aria-describedby="emailHelp" required>
          </div>
          <div class="form-group">
            <label>Name</label>
            <input name="name" type="text" class="form-control" >
          </div>
          <div class="form-group">
            <label>Course ID</label>
            <input name="course_id" type="text" class="form-control" >
          </div>
          <div class="form-group">
            <label>Department</label>
            <input name="dept_id" type="text" class="form-control" >
          </div>
          <div class="form-group">
            <label>Password</label>
            <input name="password" type="text" class="form-control" >
          </div>
          
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
<div class="card">
    <div class="card-header" id="headingFour">
      <h2 class="mb-0">
        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
         View Teacher
        </button>
      </h2>
    </div>

    <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
      <div class="card-body">
        <form action="<?php $_SERVER["PHP_SELF"] ?>" method="post">
            
            <div class="form-group">
            <input name="opr" type="hidden" class="form-control" value="view">
            </div>
          <div class="form-group">
            <label >Teacher Id</label>
            <input name="id" type="text" class="form-control" aria-describedby="emailHelp" required>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div> 

      
<?php
$id = $password = $name = $dept_id = $course_id=$opr="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include_once 'database.php' ;
    $db = new Database();
    $conn=$db->getConnection();
    
    $opr = $_REQUEST["opr"] ;
    
    //echo $opr ;
    if($opr=="add"){
        $id=test_input($_REQUEST["id"]);
        $name=test_input($_REQUEST["name"]);
        $dept_id=test_input($_REQUEST["dept_id"]);
        $course_id=test_input($_REQUEST["course_id"]);
        $password=test_input($_REQUEST["password"]);
        
        $query="INSERT INTO `teacher`(`teach_id`, `name`, `course_id`, `dept_id`, `password`) VALUES (?,?,?,?,?)";
        $stmt=$conn->prepare($query); 
        $stmt->bindParam(1,$id);
        $stmt->bindParam(2,$name);
        $stmt->bindParam(3,$course_id);
        $stmt->bindParam(4,$dept_id);
        $stmt->bindParam(5,$password);
        if($stmt->execute()){
            echo '<p class="text-success"> Operation Successfull </p>';
        }
        else{
            echo '<p class="text-danger"> Operation Failed </p>';
        }
    }
    if($opr=="update"){
        $id=test_input($_REQUEST["id"]);
        $name=test_input($_REQUEST["name"]);
        $dept_id=test_input($_REQUEST["dept_id"]);
        $course_id=test_input($_REQUEST["course_id"]);
        $password=test_input($_REQUEST["password"]);
        
        $query="UPDATE `teacher` SET  `name` = ?, `course_id` = ?, `dept_id` = ? , `password` = ? WHERE `teach_id`= ?  ";
        
        $stmt=$conn->prepare($query); 
        
        $stmt->bindParam(1,$name);
        $stmt->bindParam(2,$course_id);
        $stmt->bindParam(3,$dept_id);
        $stmt->bindParam(4,$password);
        $stmt->bindParam(5,$id);
        //echo $query ;
        if($stmt->execute()){
            echo '<p class="text-success"> Operation Successfull </p>';
        }
        else{
            echo '<p class="text-danger"> Operation Failed </p>';
        }
    }
    
  if($opr=="delete"){
        $id=test_input($_REQUEST["id"]);
        
        
        $query="DELETE FROM `teacher` WHERE `teach_id`= ?  ";
        
        $stmt=$conn->prepare($query); 
        
        $stmt->bindParam(1,$id);
        //echo $query ;
        if($stmt->execute()){
            echo '<p class="text-success"> Operation Successfull </p>';
        }
        else{
            echo '<p class="text-danger"> Operation Failed </p>';
        }
    }
    if($opr=="view"){
        $id=test_input($_REQUEST["id"]);
        
        
        $query="SELECT * FROM `teacher` WHERE `teach_id`= ?  ";
        
        $stmt=$conn->prepare($query); 
        
        $stmt->bindParam(1,$id);
        //echo $query ;
        if($stmt->execute()){
            $num = $stmt->rowCount();
            if($num>0){
            echo '<table class="table table-bordered">
                  <thead>
                    <tr>
                      <th scope="col">ID</th>
                      <th scope="col">Name</th>
                      <th scope="col">Course ID</th>
                      <th scope="col">Department ID</th>
                    </tr>
                  </thead>';
            echo '<tbody>' ;   
                while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                    extract($row);
                    echo '<tr>
                          <th scope="row">'.$teach_id.'</th>
                          <td>'.$name.'</td>
                          <td>'.$course_id.'</td>
                          <td>'.$dept_id.'</td>
                        </tr>';
                }
            echo '</tbody>';
            echo '</table>';    
            }
            
            
        }
        else{
            echo '<p class="text-danger"> Operation Failed </p>';
        }
    }
    
}
    
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}    
      
?>  
      
    
    </div>
    </div>
    </div>
      
    
    
    
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" ></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" ></script>    
</body>
</html>    