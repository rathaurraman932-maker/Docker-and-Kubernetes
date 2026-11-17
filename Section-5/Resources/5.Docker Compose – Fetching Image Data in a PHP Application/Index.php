
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="description" content="Displaying list of Employees">
    <link href="./lib/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Employee Information</title>
</head>

<body>

<?php

$host_name = 'db';
$user = 'appusr';
$password = 'appusr@1090';
$database = 'appdb';

$connection = new mysqli(
    $host_name,
    $user,
    $password,
    $database,
    3306
);

if ($connection->connect_error) {
    die("Database connection failed: " . $connection->connect_error);
}

// Fetch employee records
$statement = "SELECT Employee_ID, Employee_Name, Phone
              FROM Employee_Information";

$records = $connection->query($statement);

?>

<div class="container-sm">

    <h1>List of Employees</h1>
    <p class="lead">This is a list of Employees</p>

    <table class="table table-striped table-bordered">

        <thead class="table-dark">
            <tr>
                <th scope="col">Employee ID</th>
                <th scope="col">Employee Name</th>
                <th scope="col">Phone</th>
            </tr>
        </thead>

        <tbody>

        <?php

        if ($records && $records->num_rows > 0) {

            while ($row = $records->fetch_assoc()) {

        ?>

            <tr>
                <td><?php echo htmlspecialchars($row['Employee_ID']); ?></td>

                <td><?php echo htmlspecialchars($row['Employee_Name']); ?></td>

                <td><?php echo htmlspecialchars($row['Phone']); ?></td>
            </tr>

        <?php
            }

        } else {
            echo "<tr><td colspan='3'>No employees found.</td></tr>";
        }

        $connection->close();

        ?>

        </tbody>

    </table>

</div>

</body>
</html>
