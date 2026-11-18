<?php

$host_name = 'db';
$user = 'appusr';
$password = 'appusr@1090';
$database = 'appdb';
$port = 3306;

$conn = new mysqli(
    $host_name,
    $user,
    $password,
    $database,
    $port
);

if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

// Set character encoding
$conn->set_charset("utf8mb4");

// Fetch employee records
$sql = "SELECT Employee_ID, Employee_Name, Phone, Employee_Images
        FROM Employee_Information
        ORDER BY Employee_ID";

$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">

    <meta name="description" content="Displaying list of Employees">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="./lib/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Employee Information</title>
</head>

<body>

<div class="container-sm mt-4">

    <h1>List of Employees</h1>

    <p class="lead">This is a list of Employees</p>

    <table class="table table-striped table-bordered">

        <thead class="table-dark">

            <tr>
                <th scope="col">Employee ID</th>
                <th scope="col">Employee Name</th>
                <th scope="col">Phone</th>
                <th scope="col">Employee Images</th>
            </tr>

        </thead>

        <tbody>

        <?php

        if ($result && $result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {

        ?>

            <tr>

                <td>
                    <?php echo htmlspecialchars($row['Employee_ID']); ?>
                </td>

                <td>
                    <?php echo htmlspecialchars($row['Employee_Name']); ?>
                </td>

                <td>
                    <?php echo htmlspecialchars($row['Phone']); ?>
                </td>

                <td>

                    <?php if (!empty($row['Employee_Images'])) { ?>

                        <img
                            src="<?php echo htmlspecialchars($row['Employee_Images']); ?>"
                            alt="<?php echo htmlspecialchars($row['Employee_Name']); ?>"
                            width="100"
                            height="100"
                            style="object-fit: cover; border-radius: 5px;"
                        >

                    <?php } else { ?>

                        No Image Available

                    <?php } ?>

                </td>

            </tr>

        <?php

            }

        } else {

        ?>

            <tr>
                <td colspan="4" class="text-center">
                    No employees found.
                </td>
            </tr>

        <?php
        }

        ?>

        </tbody>

    </table>

</div>

</body>

</html>

<?php

// Close database connection
$conn->close();

?>