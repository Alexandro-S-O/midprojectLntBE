<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Book Details</title>
    <style>
        body {
            background-image: url('img/bg.jpg');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: 100% 100%;
        }

        h1 {
        color: maroon;
        margin-left: 40px;
        }
    </style>
</head>
<body>
    <div class="container my-4">
        <header class="d-flex justify-content-between my-4">
            <h1>Book Details</h1>
            <div>
            <a href="index.php" class="btn btn-primary">Back</a>
            </div>
        </header>
        <div class="book-details p-5 my-4">
            <?php
            include("conn_book.php");
            $id = $_GET['id'];
            if ($id) {
                $sql = "SELECT * FROM books WHERE id = $id";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_array($result)) {
                 ?>
                 <h3>Book id:</h3>
                 <p><?php echo $row["book_id"]; ?></p>
                 <h3>Title:</h3>
                 <p><?php echo $row["title"]; ?></p>
                 <h3>Author:</h3>
                 <p><?php echo $row["author"]; ?></p>
                 <h3>Publisher:</h3>
                 <p><?php echo $row["publisher"]; ?></p>
                 <h3>Number of page:</h3>
                 <p><?php echo $row["page"]; ?></p>
                
                 <?php
                }
            }
            else{
                echo "<h3>No books found</h3>";
            }
            ?>
            
        </div>
    </div>
</body>
</html>