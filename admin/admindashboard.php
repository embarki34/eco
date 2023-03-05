<?php
session_start();



require_once('../config/config.php');
$pdo = new PDO("mysql:host=localhost;dbname=eco", "root", null, [
  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);
// Query to get the total number of students
$stmt = $pdo->prepare("SELECT COUNT(*) AS total_students FROM students");
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);
$total_students = $result['total_students'];

// Query to get the total number of teachers
$stmt = $pdo->prepare("SELECT COUNT(*) AS total_teachers FROM teachers");
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);
$total_teachers = $result['total_teachers'];

// Query to get the total number of courses
$stmt = $pdo->prepare("SELECT COUNT(*) AS total_courses FROM courses");
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);
$total_courses = $result['total_courses'];

// Query to get the total number of admin announcements
$stmt = $pdo->prepare("SELECT COUNT(*) AS total_admin_announcements FROM admin_announcements");
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);
$total_admin_announcements = $result['total_admin_announcements'];

// Query to get the total number of teacher announcements
$stmt = $pdo->prepare("SELECT COUNT(*) AS total_teacher_announcements FROM teacher_announcements");
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);
$total_teacher_announcements = $result['total_teacher_announcements'];

?>
<!DOCTYPE html>
<html>
<head>
  <title>Admin Dashboard</title>
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Admin Dashboard</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="admin/students/index.php">Students</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="admin/teachers/index.php">Teachers</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="admin/announcements/index.php">Announcements</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="adminlogout.php">Logout</a>
        </li>
      </ul>
    </div>
  </nav>

  <div class="container mt-5">
    <h1 class="text-center">Welcome, Admin!</h1>
    <div class="row justify-content-center">
      <div class="col-md-4 mb-4">
        <div class="card text-center">
          <div class="card-body">
            <h5 class="card-title">Total Students</h5>
            <p class="card-text"><?php echo $total_students; ?></p>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-4">
        <div class="card text-center">
          <div class="card-body">
            <h5 class="card-title">Total Teachers</h5>
            <p class="card-text"><?php echo $total_teachers; ?></p>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-4">
        <div class="card text-center">
          <div class="card-body">
            <h5 class="card-title">Total Courses</h5>
            <p class="card-text"><?php echo $total_courses; ?></p>
          </div>
        </div>
      </div>
      <div class="col-md-6 mb-4">
        <div class="card text-center">
          <div class="card-body">
            <h5 class="card-title">Total Admin Announcements</h5>
            <p class="card-text"><?php echo $total_admin_announcements; ?></p>
          </div>
        </div>
      </div>
      <div class="col-md-6 mb-4">
        <div class="card text-center">
          <div class="card-body">
            <h5 class="card-title">Total Teacher Announcements</h5>
            <p class="card-text"><?php echo $total_teacher_announcements; ?></p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
