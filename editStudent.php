<?php 
$servername = "localhost";
$username = "root";
$password = "";
$database = "studentdb";

// Check connection
$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}

// Initialize variables
$id = "";
$name = "";
$email = "";
$phone = "";
$address = "";
$errorMessage = "";
$successMessage = "";
 
if (!isset($_GET['id'])) {
    die("Error: ID is not provided in the URL.");
}

$id = $_GET['id'];

 
$sql = "SELECT * FROM Student WHERE id = $id";
$result = $conn->query($sql);

if (!$result) {
    die("Invalid Query: " . $conn->error);
}

$row = $result->fetch_assoc();
if (!$row) {
    die("Error: No record found for ID = $id.");
}

 
$name = $row['name'];
$email = $row['email'];
$phone = $row['phone'];
$address = $row['address'];

 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];

    if (empty($name) || empty($email) || empty($phone) || empty($address)) {
        $errorMessage = "All fields are required.";
    } else {
        $sql = "UPDATE Student SET name='$name', email='$email', phone='$phone', address='$address' WHERE id=$id";
        if ($conn->query($sql) === TRUE) {
            $successMessage = "Student updated successfully.";
            header("location:/StudentManagementSystem/index.php");
            exit();
        } else {
            $errorMessage = "Error updating record: " . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Edit Student</title>
</head>

<body>
    <div class="container my-5">
        <h2>Edit Student</h2>
        <?php if (!empty($errorMessage)): ?>
            <div class="alert alert-danger"><?php echo $errorMessage; ?></div>
        <?php endif; ?>
        <?php if (!empty($successMessage)): ?>
            <div class="alert alert-success"><?php echo $successMessage; ?></div>
        <?php endif; ?>

        <form method="post">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo $name; ?>">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>">
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $phone; ?>">
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control" id="address" name="address" value="<?php echo $address; ?>">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="/StudentManagementSystem/index.php" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</body>

</html>
