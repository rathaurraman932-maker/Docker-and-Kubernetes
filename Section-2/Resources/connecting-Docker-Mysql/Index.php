
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Displaying list of employees">

    <link href="./lib/bootstrap/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <title>List of Employees</title>
</head>

<body>

<?php

// Database connection details
$host_name = 'host.docker.internal';
$user = 'root';
$password = 'sqlset123';
$database = 'appdb';

// Connect to MySQL
$connection = new mysqli(
    $host_name,
    $user,
    $password,
    $database,
    3306
);

// Check database connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// SQL query
$statement = "SELECT Employee_ID, Employee_Name, Phone
              FROM Employee_Information";

// Execute query
$records = $connection->query($statement);

?>

<div class="container-sm mt-4">

    <h1>Employees</h1>

    <p class="lead">This is a list of employees.</p>

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
            // Fetch employee records
            while ($data = $records->fetch_assoc()) {
            ?>

                <tr>

                    <td>
                        <?php echo htmlspecialchars($data['Employee_ID']); ?>
                    </td>

                    <td>
                        <?php echo htmlspecialchars($data['Employee_Name']); ?>
                    </td>

                    <td>
                        <?php echo htmlspecialchars($data['Phone']); ?>
                    </td>

                </tr>

            <?php
            }
            ?>

        </tbody>

    </table>

</div>

<?php

// Close database connection
$connection->close();

?>

</body>
</html>
