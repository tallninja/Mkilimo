<!DOCTYPE html>
<html>
<head>
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MKILIMO | SHOWCLIENT</title>
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
<section>
<div class="container">
<?php
      
include_once 'conn.php';




if (!isset($_POST['kilimo']) && !isset($_POST['afya'])) {
  # code...
  header("location: ../xcx/creds/dash.php?shwusr=error");
}

else {

  if(isset($_POST['kilimo'])){

    $sql = "SELECT * FROM kilimo";

    echo '

        <table id="kilimo"> 
        <thead>
        <tr> 
            <th>UID</th> 
            <th>FIRST NAME</th> 
            <th>LAST NAME</th> 
            <th>USERNAME</th> 
            <th>EMAIL</th> 
            <th>PHONE</th> 
            <th>DATE</th> 
        </tr>
        </thead>
        ';
   
    if ($result = $conn->query($sql)) {
        while ($row = $result->fetch_assoc()) {
            $field1name = $row["uid"];
            $field2name = $row["firstname"];
            $field3name = $row["lastname"];
            $field4name = $row["username"];
            $field5name = $row["email"];
            $field6name = $row["phone"];
            $field7name = $row["date"];
            
     
            echo '<tr> 
                      <td>'.$field1name.'</td> 
                      <td>'.$field2name.'</td> 
                      <td>'.$field3name.'</td>  
                      <td>'.$field4name.'</td> 
                      <td>'.$field5name.'</td> 
                      <td>'.$field6name.'</td> 
                      <td>'.$field7name.'</td> 
                  </tr>
                  ';
         
        }

        $result->free();
    } 

  }
  
        
  if(isset($_POST['afya'])){

    $sql = "SELECT * FROM afya";

    echo '

        <table id="afya"> 
        <thead>
        <tr> 
            <th>UID</th> 
            <th>FIRST NAME</th> 
            <th>LAST NAME</th> 
            <th>USERNAME</th> 
            <th>EMAIL</th> 
            <th>PHONE</th> 
            <th>DATE</th>  
        </tr>
        </thead>
        ';
   
    if ($result = $conn->query($sql)) {
        while ($row = $result->fetch_assoc()) {
            $field1name = $row["uid"];
            $field2name = $row["firstname"];
            $field3name = $row["lastname"];
            $field4name = $row["username"];
            $field5name = $row["email"];
            $field6name = $row["phone"];
            $field7name = $row["date"];
            
            
     
            echo '<tr> 
                      <td>'.$field1name.'</td> 
                      <td>'.$field2name.'</td> 
                      <td>'.$field3name.'</td>  
                      <td>'.$field4name.'</td> 
                      <td>'.$field5name.'</td> 
                      <td>'.$field6name.'</td> 
                      <td>'.$field7name.'</td>
                  </tr>
                  ';
          
        }
        $result->free();
    } 

  }

  $conn->close();
}

?>
</div>

</section>


</body>
</html>
