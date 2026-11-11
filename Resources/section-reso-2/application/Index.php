<?php

$employees = [
    [
        "name" => "Rahul Sharma",
        "designation" => "Cloud Architect",
        "department" => "Cloud Computing",
        "status" => "Active",
        "photo" => "rahul.jpg"
    ],
    [
        "name" => "Priya Verma",
        "designation" => "DevOps Engineer",
        "department" => "DevOps",
        "status" => "Active",
        "photo" => "priya.jpg"
    ],
    [
        "name" => "Amit Kumar",
        "designation" => "Software Developer",
        "department" => "Development",
        "status" => "Inactive",
        "photo" => "amit.jpg"
    ]
];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Employee Directory</title>

    <style>

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 24px;
            background: #000;
            color: #f3f3f3;
            font-family: Arial, Helvetica, sans-serif;
        }

        .table-wrap {
            width: 100%;
            max-width: 1320px;
            margin: 0 auto;
            overflow-x: auto;
        }

        table {
            width: 100%;
            min-width: 760px;
            border-collapse: collapse;
            table-layout: fixed;
        }

        th, td {
            text-align: left;
            padding: 12px 16px;
            border-bottom: 1px solid #242424;
            vertical-align: middle;
            font-size: 20px;
        }

        th {
            font-size: 20px;
            font-weight: 700;
            padding-top: 12px;
            padding-bottom: 14px;
        }

        tbody tr:last-child td {
            border-bottom: none;
        }

        .photo-col { width: 14%; }
        .name-col { width: 20%; }
        .designation-col { width: 28%; }
        .department-col { width: 25%; }
        .status-col { width: 13%; }

        .avatar {
            display: block;
            width: 94px;
            height: 94px;
            object-fit: cover;
            border-radius: 24px;
        }

        @media (max-width: 700px) {

            body {
                padding: 12px;
            }

            th, td {
                font-size: 16px;
                padding: 10px;
            }

            .avatar {
                width: 72px;
                height: 72px;
                border-radius: 18px;
            }
        }

    </style>

</head>

<body>

    <div class="table-wrap">

        <table>

            <thead>

                <tr>
                    <th class="photo-col">Photo</th>
                    <th class="name-col">User Name</th>
                    <th class="designation-col">Designation</th>
                    <th class="department-col">Department</th>
                    <th class="status-col">Status</th>
                </tr>

            </thead>

            <tbody>

                <?php foreach ($employees as $employee): ?>

                    <tr>

                        <td>
                            <img
                                class="avatar"
                                src="<?php echo htmlspecialchars($employee['photo']); ?>"
                                alt="<?php echo htmlspecialchars($employee['name']); ?>"
                            >
                        </td>

                        <td>
                            <?php echo htmlspecialchars($employee['name']); ?>
                        </td>

                        <td>
                            <?php echo htmlspecialchars($employee['designation']); ?>
                        </td>

                        <td>
                            <?php echo htmlspecialchars($employee['department']); ?>
                        </td>

                        <td>
                            <?php echo htmlspecialchars($employee['status']); ?>
                        </td>

                    </tr>

                <?php endforeach; ?>

            </tbody>

        </table>

    </div>

</body>
</html>
