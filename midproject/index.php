<?php
session_start();
if (!isset($_SESSION["user"])) {
   header("Location: login.php");
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Book information</title>
    <style>
        body {
        display: flex;
        flex-direction: column;
        min-height: 100vh;
        margin: 0;
        background-color: white;
        background-image: url('img/bg.jpg');
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: 100% 100%;
        }

        .container {
        flex: 1;
        background-color: transparent !important;
        }

        table td, table th {
        vertical-align: middle;
        text-align: right;
        padding: 20px!important;
        }

        h1 {
        color: maroon;
        margin-left: 40px;
        }

        .add{
            padding-left: 60%;
            padding-top: 10px;
        }

        header {
            background-color : transparent;
        }

    </style>
    <script>
        function confirmDelete(bookId) {
            var result = confirm("Are you sure you want to delete this book?");
            if (result) {
                window.location.href = "delete.php?id=" + bookId;
            }
        }
    </script>
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
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-danger" href="logout.php">Logout</a>
      </li>
    </ul>
  </div>
</nav>
      <div class="container my-4">
        <header class="d-flex justify-content-between my-4">
            <h1>Book List</h1>
            <div class="add">
                <a href="create.php" class="btn btn-primary">Add New Book</a>
            </div>
        </header>
        <?php
        if (isset($_SESSION["create"])) {
        ?>
        <div class="alert alert-success">
            <?php 
            echo $_SESSION["create"];
            ?>
        </div>
        <?php
        unset($_SESSION["create"]);
        }
        ?>
         <?php
        if (isset($_SESSION["update"])) {
        ?>
        <div class="alert alert-success">
            <?php 
            echo $_SESSION["update"];
            ?>
        </div>
        <?php
        unset($_SESSION["update"]);
        }
        ?>
        <?php
        if (isset($_SESSION["delete"])) {
        ?>
        <div class="alert alert-success">
            <?php 
            echo $_SESSION["delete"];
            ?>
        </div>
        <?php
        unset($_SESSION["delete"]);
        }
        ?>
        
        <table class="table table-bordered table-light border-dark">
        <thead>
            <tr>
                <th class="text-center">Book id</th>
                <th class="text-center">Title</th>
                <th class="text-center">Author</th>
                <th class="text-center">Publisher</th>
                <th class="text-center">Number of Page</th>
                <th class="text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
        
        <?php
        include_once('conn_book.php');
        $sqlSelect = "SELECT * FROM books";
        $result = mysqli_query($conn,$sqlSelect);
        while($data = mysqli_fetch_array($result)){
            ?>
            <tr>
                <td class="text-center"><?php echo $data['book_id']; ?></td>
                <td class="text-center"><?php echo $data['title']; ?></td>
                <td class="text-center"><?php echo $data['author']; ?></td>
                <td class="text-center"><?php echo $data['publisher']; ?></td>
                <td class="text-center"><?php echo $data['page']; ?></td>
                <td class="text-center">
                    <a href="view.php?id=<?php echo $data['id']; ?>" class="btn btn-info">View</a>
                    <a href="edit.php?id=<?php echo $data['id']; ?>" class="btn btn-warning">Edit</a>
                    <a href="javascript:void(0);" onclick="confirmDelete(<?php echo $data['id']; ?>)" class="btn btn-danger">Delete</a>
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
