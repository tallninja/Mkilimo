<!DOCTYPE html>
<html>
<head>

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MKILIMO | VIEWMESSAGES</title>
  <link rel="stylesheet" type="text/css" href="../styles/style.css">

</head>
<body>
  <header>
      <div class="container">
        <h1><span class="highlight">M-</span>KILIMO</h1>
        <form action="../xcx/creds/dash.php" method="POST">
          <button type="submit" name="logout" class="logout">BACK</button>
      </form>
      </div>
    </header>
<div class="container">

<?php
      
include_once 'conn.php';




if (!isset($_POST['kilimo']) && !isset($_POST['afya'])) {
  # code...
  header("location: ../xcx/creds/dash.php?shwusr=error");
}

else {

  if(isset($_POST['kilimo'])){

    $sql = "SELECT * FROM kilimomessages";

    echo '<table id="kilimo">
        <thead>
        <tr> 
            <th>NO</th> 
            <th>MESSAGE</th> 
            <th>DATE & TIME</th> 
            
        </tr>
        </thead>
        ';
   
    if ($result = $conn->query($sql)) {
        while ($row = $result->fetch_assoc()) {
            $field1name = $row["id"];
            $field2name = $row["message"];
            $field3name = $row["date"];
            
     
            echo '<tr> 
                      <td>'.$field1name.'</td> 
                      <td>'.$field2name.'</td> 
                      <td>'.$field3name.'</td>  
                      
                  </tr>';
        }

        $result->free();
    } 

  }
    
        
  if(isset($_POST['afya'])){

    $sql = "SELECT * FROM afyamessages";

    echo '<table id="afya"> 
        <tr> 
            <th>NO</th> 
            <th>MESSAGE</th> 
            <th>DATE & TIME</th> 
        </tr>';
   
    if ($result = $conn->query($sql)) {
        while ($row = $result->fetch_assoc()) {
            $field1name = $row["id"];
            $field2name = $row["message"];
            $field3name = $row["date"];
            
            
     
            echo '<tr> 
                      <td>'.$field1name.'</td> 
                      <td>'.$field2name.'</td> 
                      <td>'.$field3name.'</td> 
                  </tr>';
        }
        $result->free();
    } 

  }

  $conn->close();
}
?>
</div>
</body>
</html>
