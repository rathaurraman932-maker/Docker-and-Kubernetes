```php
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Employee Information</title>
    <link href="./lib/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<?php

// Database Configuration
$servername = "db";
$username = "appusr";
$password = "appusr@1090";
$database = "appdb";

// Database Connection
$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch Employee Records
$sql = "SELECT Employee_ID, Employee_Name, Phone
        FROM Employee_Information
        ORDER BY Employee_ID ASC";

$records = $conn->query($sql);

if (!$records) {
    die("Query Error: " . $conn->error);
}

?>

<div class="container mt-5">

    <h1 class="text-center mb-3">Employee Information</h1>

    <p class="lead text-center">List of Employees</p>

    <div class="alert alert-success">
        Total Records Found: <?php echo $records->num_rows; ?>
    </div>

    <table class="table table-striped table-bordered">

        <thead class="table-dark">
            <tr>
                <th>Employee ID</th>
                <th>Employee Name</th>
                <th>Phone</th>
            </tr>
        </thead>

        <tbody>

        <?php

        if ($records->num_rows > 0) {

            while ($data = $records->fetch_assoc()) {

        ?>

            <tr>
                <td><?php echo htmlspecialchars($data['Employee_ID']); ?></td>
                <td><?php echo htmlspecialchars($data['Employee_Name']); ?></td>
                <td><?php echo htmlspecialchars($data['Phone']); ?></td>
            </tr>

        <?php
            } // End while

        } else {

            echo "<tr><td colspan='3'>No employee records found.</td></tr>";

        } // End if

        ?>

        </tbody>

    </table>

</div>

<?php
$conn->close();
?>

</body>
</html>
```
