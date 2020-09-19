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
                
              <a href="student_land.php" class="list-group-item list-group-item-action">
                View Attendance
              </a>
              <a href="student_marks.php" class="list-group-item list-group-item-action">
                  View Marks
                </a>
              <a href="student_projects.php" class="list-group-item list-group-item-action active"> View Projects</a>
              <a href="student_events.php" class="list-group-item list-group-item-action">
                View Events
            </a>
        
    </div>
    </div> 
      
      
<div class="accordion col-10" id="accordionExample">
  
<div class="card">
    <div class="card-header" id="headingFour">
      <h2 class="mb-0">
        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
         Projects
        </button>
      </h2>
    </div>

    <div id="collapseFour" class="collapse show" aria-labelledby="headingFour" data-parent="#accordionExample">
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
$id = $opr= "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include_once 'database.php' ;
    $db = new Database();
    $conn=$db->getConnection();
    
    $opr = $_REQUEST["opr"] ;
    
   
    
  
    if($opr=="view"){
        $id=test_input($_REQUEST["id"]);
        
        
        $query="SELECT * FROM `project` WHERE `leader_id`= ? ";
        
        $stmt=$conn->prepare($query); 
        
        $stmt->bindParam(1,$id);
        
        
        //echo $query ;
        if($stmt->execute()){
            $num = $stmt->rowCount();
            if($num>0){
            echo '<table class="table table-bordered">
                  <thead>
                    <tr>
                      <th scope="col">Project ID</th>
                      <th scope="col">Leader ID</th>
                      <th scope="col">Name</th>
                      <th scope="col">Deadline</th>
                      <th scope="col">Description</th>
                      <th scope="col">Status</th>
                      
                    </tr>
                  </thead>';
            echo '<tbody>' ;   
                while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                    extract($row);
                    echo '<tr>
                          <th scope="row">'.$project_id.'</th>
                          <td>'.$leader_id.'</td>
                          <td>'.$name.'</td>
                          <td>'.$deadline.'</td>
                          <td>'.$descrp.'</td>
                          <td>'.$status.'</td>
                          
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