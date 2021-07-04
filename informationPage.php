<!DOCTYPE html>
<html>

<head>
<title>Robot Control</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0"> 

<style>
    <?php include 'style.css'; ?>
    </style>
<script src="script.js"></script>
</head>

<body>
    <div id = myDiv>
        <h1 id = myText>Robot Information</h1>
    </div>
          <?php
          
    
          $servername = "localhost";
          $username = "root";
          $password = "";
          $dbname = "robot";
          
          $conn = new mysqli($servername, $username, $password,$dbname);
          if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
          }
          $turned = "SELECT * FROM powering WHERE id=(SELECT max(id) FROM powering)";
          $lastMotors = "SELECT * FROM motors WHERE id=(SELECT max(id) FROM motors)";
          $moving = "SELECT * FROM base WHERE id = (SELECT max(id) FROM base)";
          $resultMotors = $conn->query($lastMotors);
          $resultTurned = $conn->query($turned);
          $resultMoving = $conn->query($moving);
          $rowTurned = $resultTurned->fetch_assoc();
          $rowMoving = $resultMoving->fetch_assoc();
         

          if ($resultMotors->num_rows > 0) {
            $row = $resultMotors->fetch_assoc();
            echo "<div class =informationDiv>" ; 
            echo "<p class = informationP> Motor1:  ".$row['Motor1']."</p>";
            echo "<p class = informationP> Motor2:  ".$row['Motor2']."</p>";
            echo "<p class = informationP> Motor3:  ".$row['Motor3']."</p>";
            echo "<p class = informationP> Motor4:  ".$row['Motor4']."</p>";
            echo "<p class = informationP> Motor5:  ".$row['Motor5']."</p>";
            echo "<p class = informationP> Motor6:  ".$row['Motor6']."</p>";
            
 
          } else {
            echo "<p> There are 0 rows in the database! </p>";
          }
          if ($rowMoving['Moving'] =="F"){
            echo "<p> Moving: <b> Forward </b> </p><br>";
          } else if ($rowMoving['Moving'] =="B"){
            echo "<p> Moving: <b> Backward </b> </p><br>";
          }else if ($rowMoving['Moving'] =="L"){
            echo "<p> Moving: <b> Left </b> </p><br>";
          }
          else if ($rowMoving['Moving'] =="R"){
            echo "<p> Moving: <b> Right </b> </p><br>";
          }
          else if ($rowMoving['Moving'] =="S"){
            echo "<p> The robot is <b> STOPPED </b> </p><br>";
          }
          if ($rowTurned["Powered"] == 1) {
            echo "<p> Status: <b> ON </b> </p>";
          } else{
            echo "<p> Status: <b> OFF </b>  </p>";
          }
          echo "</div>";

          header("refresh:1");
          

          $conn->close();




        
          ?>
        
    </div>
</body>

</html>