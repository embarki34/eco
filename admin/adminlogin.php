<?php
// start the session
session_start();

// include the database configuration file
require_once('../config/config.php');

// check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // get the username and password from the form
  $username = $_POST['username'];
  $password = $_POST['password'];

  // prepare the SQL statement to retrieve the admin record with the given username and password
  $stmt = $conn->prepare("SELECT * FROM admin WHERE username=? AND password=?");

  if (!$stmt) {
    // handle the error if the statement could not be prepared
    echo "Error: " . $conn->error;
    exit();
  }

  // bind the parameters and execute the statement
  $stmt->bind_param("ss", $username, $password);
  $stmt->execute();

  // get the result of the query
  $result = $stmt->get_result();

  // check if the admin record was found
  if ($result->num_rows == 1) {
    // set the session variable to indicate that the admin is logged in
    $_SESSION['admin'] = true;

    // redirect to the admin dashboard
    header("Location: admindashboard.php");
    exit();
  } else {
    // display an error message if the admin record was not found
    $error = "Invalid username or password";
  }
}

// close the database connection
$conn->close();

?>
<!DOCTYPE html>
<html>
<head>
  <title>Admin Login</title>
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

</head>
<body>

  <div class="container mt-1">
    <h1 class="text-center">Admin Login</h1>

    <?php if (isset($error)) { ?>
      <div class="alert alert-danger" role="alert">
        <?php echo $error; ?>
      </div>
    <?php } ?>

    <form method="POST" action="adminlogin.php">
      <div class="form-group">
        <label for="username">Username:</label>
        <input type="text" class="form-control" id="username" name="username">
      </div>

      <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" class="form-control" id="password" name="password">
      </div>

      <button type="submit" class="btn btn-primary">Log In</button>
    </form>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</body>
</html>
