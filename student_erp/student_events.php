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
              <a href="student_projects.php" class="list-group-item list-group-item-action"> View Projects</a>
              <a href="student_events.php" class="list-group-item list-group-item-action active">
                View Events
            </a>
        
    </div>
    </div> 
      
      
      
<div class="accordion col-10" id="accordionExample">
    
  <div class="card">
    <div class="card-header" id="headingOne">
      <h2 class="mb-0">
        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
          Current Events
        </button>
      </h2>
    </div>
    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body">

      
          
<?php
        include_once 'database.php' ;
        $db = new Database();
        $conn=$db->getConnection();
        $query="SELECT * FROM `event` ";
        
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
                      <th scope="col">From</th>
                      <th scope="col">To</th>
                      <th scope="col">Description</th>
                    </tr>
                  </thead>';
            echo '<tbody>' ;   
                while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                    extract($row);
                    echo '<tr>
                          <th scope="row">'.$event_id.'</th>
                          <td>'.$name.'</td>
                          <td>'.$from_date.'</td>
                          <td>'.$to_date.'</td>
                          <td>'.$descrp.'</td>
                        </tr>';
                }
            echo '</tbody>';
            echo '</table>';    
            }
            else{
                echo '<p class="text-danger"> No Events Currently </p>';
            }
            
            
        }
    else{
        echo '<p class="text-danger"> No Events Currently </p>';
    }
        
      
?>  
      
    
    </div>
    </div>
    </div>
    
</div>
    
    </div>
    </div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" ></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" ></script>    
</body>
</html>    