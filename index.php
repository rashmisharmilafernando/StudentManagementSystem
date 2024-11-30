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
        <a class="btn btn-primary" href="/samadiInsitute/newStudent.php" role="button">New Student</a>
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
                
                <tr>
                    <td>01</td>
                    <td>Rashmi Sharmila</td>
                    <td>rshi0430@gmail.com</td>
                    <td>0774748401</td>
                    <td>No 194/A Galle Rd,Wadduwa</td>
                    <td>30/11/2024</td>
                    <td>
                        <a href="/samadiInsitute/editStudent.php" class="btn btn-primary btn-sm">Edit</a>
                        <a href="/samadiInsitute/deleteStudent.php" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>
            </tbody>


        </table>

    </div>
</body>

</html>