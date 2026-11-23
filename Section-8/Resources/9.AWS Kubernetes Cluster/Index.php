```php
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="description" content="Displaying Employee Information">
    <link href="./lib/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Employees</title>
</head>

<body>
<?php
    $host_name = 'mysql-service';
    $user = 'root';
    $password = 'appusr@1090';
    $database = 'empdb';

    $connection = new mysqli($host_name, $user, $password, $database);

    if ($connection->connect_error) {
        die("Database connection failed: " . $connection->connect_error);
    }

    $statement = "SELECT Employee_ID, Employee_Name, Phone, Employee_Image
                  FROM Employee_Information";

    $records = $connection->query($statement);
?>
<h1> We are on the Pod
      <?php
      echo $_SERVER['SERVER_ADDR'];
      ?>
   </h1>
<div class="container-sm">

    <h1>Employees</h1>
    <p class="lead">This is a list of Employees</p>

    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th scope="col">Employee ID</th>
                <th scope="col">Employee Name</th>
                <th scope="col">Phone</th>
                <th scope="col">Employee Image</th>
            </tr>
        </thead>

        <tbody>
        <?php
            if ($records && $records->num_rows > 0) {
                while ($data = $records->fetch_assoc()) {
        ?>
            <tr>
                <td><?php echo htmlspecialchars($data['Employee_ID']); ?></td>
                <td><?php echo htmlspecialchars($data['Employee_Name']); ?></td>
                <td><?php echo htmlspecialchars($data['Phone']); ?></td>
                <td><?php echo htmlspecialchars($data['Employee_Image']); ?></td>
            </tr>
        <?php
                }
            } else {
                echo "<tr><td colspan='4'>No employee records found.</td></tr>";
            }

            if ($records) {
                $records->free();
            }

            $connection->close();
        ?>
        </tbody>
    </table>

</div>
</body>
</html>
```