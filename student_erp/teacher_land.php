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
              <a href="teacher_land.php" class="list-group-item list-group-item-action active">
                Upload Attendance
              </a>
              <a href="teacher_marks.php" class="list-group-item list-group-item-action">
                  Upload Marks
                </a>
              <a href="teacher_projects.php" class="list-group-item list-group-item-action">Projects</a>
              <a href="teacher_events.php" class="list-group-item list-group-item-action">
                Events
            </a>
            
        
    </div>
    </div> 
      
      
<div class="accordion col-10" id="accordionExample">
  <div class="card">
    <div class="card-header" id="headingOne">
      <h2 class="mb-0">
        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
          Add Attendance
        </button>
      </h2>
    </div>
    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body">
        <form action="<?php $_SERVER["PHP_SELF"] ?>" method="post">
            
            <div class="form-group">
            <input name="opr" type="hidden" class="form-control" value="add">
            </div>
          <div class="form-group">
            <label >Registration Id</label>
            <input name="id" type="text" class="form-control" aria-describedby="emailHelp" required>
          </div>
          <div class="form-group">
            <label>Date</label>
            <input name="date" type="date" class="form-control" >
          </div>
          <div class="form-group">
            <label>Status</label>
            <input name="status" type="text" class="form-control" >
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
          Update Attendance
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
            <label >Registration Id</label>
            <input name="id" type="text" class="form-control" aria-describedby="emailHelp" required>
          </div>
          <div class="form-group">
            <label>Date</label>
            <input name="date" type="date" class="form-control" >
          </div>
          <div class="form-group">
            <label>Status</label>
            <input name="status" type="text" class="form-control" >
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
         View Attendance
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
            <label >Registration Id</label>
            <input name="id" type="text" class="form-control" aria-describedby="emailHelp" required>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div> 

      
<?php
$id = $date = $stat = $opr= "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include_once 'database.php' ;
    $db = new Database();
    $conn=$db->getConnection();
    
    $opr = $_REQUEST["opr"] ;
    
    //echo $opr ;
    if($opr=="add"){
        $id=test_input($_REQUEST["id"]);
        
//        $a = explode('-',$_REQUEST["date"]);
//        $new_date = $a[2].'-'.$a[1].'-'.$a[0];
        
        $date=test_input($_REQUEST["date"]);
        $stat=test_input($_REQUEST["status"]);
        
//        echo "Hellooo";
//        echo $id."\n";
//        //echo $new_date."\n";
//        echo $date;
//        echo $stat;
        
        
        $query="INSERT INTO `attendance` (`reg_id`, `date`, `status`) VALUES (?,?,?)";
        $stmt=$conn->prepare($query); 
        $stmt->bindParam(1,$id);
        $stmt->bindParam(2,$date);
        $stmt->bindParam(3,$stat);
        if($stmt->execute()){
            echo '<p class="text-success"> Operation Successfull </p>';
        }
        else{
            echo '<p class="text-danger"> Operation Failed </p>';
        }
    }
    if($opr=="update"){
        $id=test_input($_REQUEST["id"]);
        $date=test_input($_REQUEST["date"]);
        $stat=test_input($_REQUEST["status"]);
        
        
        $query="UPDATE `attendance` SET  `date` = ?, `status` = ? WHERE `reg_id`= ?  ";
        
        $stmt=$conn->prepare($query); 
        
        $stmt->bindParam(1,$date);
        $stmt->bindParam(2,$stat);
        $stmt->bindParam(3,$id);
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
        
        
        $query="SELECT * FROM `attendance` WHERE `reg_id`= ?  ";
        
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
                      <th scope="col">Date</th>
                      <th scope="col">Status</th>
                    </tr>
                  </thead>';
            echo '<tbody>' ;   
                while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                    extract($row);
                    echo '<tr>
                          <th scope="row">'.$reg_id.'</th>
                          <td>'.$date.'</td>
                          <td>'.$status.'</td>
                        </tr    >';
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