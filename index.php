<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Samadi Institute</title>
</head>

<body>
    <div class="container my-5">
        <h2>List of Student</h2>
        <a class="btn btn-primary" href="/StudentManagementSystem/newStudent.php" role="button">New Student</a>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Create connection
                $servername = "localhost";
                $username = "root";
                $password = "";
                $database = "studentdb";

                // Check connection
                $conn = new mysqli($servername, $username, $password, $database);
                if ($conn->connect_error) {
                    die("Connection Failed: " . $conn->connect_error);
                }

                // Read all rows from database table
                $sql = "SELECT * FROM Student";
                $result = $conn->query($sql);

                if (!$result) {
                    die("Invalid Query: " . $conn->error);
                }

                while ($row = $result->fetch_assoc()) {
                    echo "
    <tr>
        <td>{$row['id']}</td>
        <td>{$row['name']}</td>
        <td>{$row['email']}</td>
        <td>{$row['phone']}</td>
        <td>{$row['address']}</td>
        <td>{$row['created_at']}</td>
        <td>
           <a href='/StudentManagementSystem/editStudent.php?id=$row[id]' class='btn btn-primary btn-sm'>Edit</a>

            <a href='/StudentManagementSystem/deleteStudent.php?id=$row[id]' class='btn btn-danger btn-sm'>Delete</a>
        </td>
    </tr>
    ";
                }
                ?>



            </tbody>


        </table>

    </div>
</body>

</html>