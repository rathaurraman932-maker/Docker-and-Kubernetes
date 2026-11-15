<html lang="en">
  <head>
    <meta charset="utf-8">    
    <meta name="description" content="Displaying list of Courses">    
    <link href="./lib/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Displaying a list of Courses</title>
</head>
<body>
<?php

$servername = "db";
$username = "appusr";
$password = "appusr@1090";
$database = "appdb";

$conn = new mysqli(
    $servername,
    $username,
    $password,
    $database
);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "Database Connected Successfully!";
?>
    <div class="container-sm">

      <h1>List of Courses</h1>
      <p class="lead">This is a list of Courses</p>
    

    <table class="table table-striped table-bordered">
        <thead class="table-dark">
          <tr>
            <th class="th-sm" scope="col">Course ID</th>
            <th class="th-sm" scope="col">Course Name</th>
            <th class="th-sm" scope="col">Rating</th>            
          </tr>
        </thead>
        <?php             
                while($data=$records->fetch_assoc())
                {
            ?>
        <tbody>
          <tr>
            <th scope="row"><?php echo $data['CourseID'];?></th>
            <td><?php echo $data['CourseName'];?></td>
            <td><?php echo $data['Rating'];?></td>            
          </tr>          
        </tbody>
        <?php
                }
            ?>
      </table>
    </div>
</body>
</html>

