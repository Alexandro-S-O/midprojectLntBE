<?php
session_start();
if (!isset($_SESSION["user"])) {
   header("Location: login.php");
   exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dashboard.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <img src="img\binuss.png" alt="logo" height="50" class="ms-3">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-danger" href="logout.php">Logout</a>
      </li>
    </ul>
  </div>
</nav>
      <div class="container my-5">
            <h1 class="d-flex justify-content-between my-4">Add New Book</h1>
            <div>
            <a href="index.php" class="btn btn-primary">Back</a>
            </div>
        <form action="add_book.php" method="post">
            <div class="form-element my-4">
              <label for="">Book Id :</label>
                <input type="text" class="form-control" name="book_id" required>
            </div>    
            <div class="form-element my-4">
            <label for="">Book Title :</label>
                <input type="text" class="form-control" name="title" required>
            </div>
            <div class="form-element my-4">
            <label for="">Author Name :</label>
                <input type="text" class="form-control" name="author" required>
            </div>
            <div class="form-element my-4">
            <label for="">Publisher :</label>
                <input type="text" class="form-control" name="publisher" required>
            </div>
            <div class="form-element my-4">
            <label for="">Number of Pages :</label>
                <input type="text" class="form-control" name="page" required>
            </div>
            <div class="form-element my-4">
                <input type="submit" name="create" value="Add Book" class="btn btn-primary">
            </div>
        </form>
    </div>
</body>
</html>