<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Edit Book</title>
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
    <div class="container my-5">
    <header class="d-flex justify-content-between my-4">
            <h1>Edit Book</h1>
            <div>
            <a href="index.php" class="btn btn-primary">Back</a>
            </div>
        </header>
        <form action="add_book.php" method="post">
            <?php
            if (isset($_GET['id'])) {
                include("conn_book.php");
                $id = $_GET['id'];
                $sql = "SELECT * FROM books WHERE id=$id";
                $result = mysqli_query($conn,$sql);
                $row = mysqli_fetch_array($result);
                ?>
            
            <div class="form-elemnt my-4">
                <label for="">Book Id :</label>
                <input type="text" class="form-control" name="book_id" required placeholder="Book id:" value="<?php echo $row["book_id"]; ?>">
            </div>            
            <div class="form-elemnt my-4">
            <label for="">Book Title :</label>
                <input type="text" class="form-control" name="title" required placeholder="Book Title:" value="<?php echo $row["title"]; ?>">
            </div>
            <div class="form-elemnt my-4">
            <label for="">Author Name :</label>
                <input type="text" class="form-control" name="author" required placeholder="Author Name:" value="<?php echo $row["author"]; ?>">
            </div>
            <div class="form-elemnt my-4">
            <label for="">Publisher :</label>
                <input type="text" class="form-control" name="publisher" required placeholder="Publisher:" value="<?php echo $row["publisher"]; ?>">
            </div>
            <div class="form-elemnt my-4">
            <label for="">Number of Pages :</label>
                <input type="text" class="form-control" name="page" required placeholder="Number of page" value="<?php echo $row["page"]; ?>">
            </div>
            <input type="hidden" value="<?php echo $id; ?>" name="id">
            <div class="form-element my-4">
                <input type="submit" name="edit" value="Edit Book" class="btn btn-primary">
            </div>
                <?php
            }else{
                echo "<h3>Book Does Not Exist</h3>";
            }
            ?>
           
        </form>
        
        
    </div>
</body>
</html>