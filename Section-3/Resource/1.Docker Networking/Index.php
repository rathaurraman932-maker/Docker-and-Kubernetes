<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Displaying list of employees">

    <link href="./lib/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>List of Employees</title>
</head>

<body>

<?php

$host_name = 'mysql-instance';
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

// Fetch employee records
$sql = "SELECT * FROM Employee_Information";
$records = $connection->query($sql);

// Check query
if (!$records) {
    die("Query failed: " . $connection->error);
}

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

            <?php if ($records->num_rows > 0) { ?>

                <?php while ($data = $records->fetch_assoc()) { ?>

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

                <?php } ?>

            <?php } else { ?>

                <tr>
                    <td colspan="3" class="text-center">
                        No employees found.
                    </td>
                </tr>

            <?php } ?>

        </tbody>

    </table>

</div>

<?php

// Close database connection
$connection->close();

?>

</body>
</html>