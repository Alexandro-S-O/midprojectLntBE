<?php
session_start();
include_once('conn_book.php');

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

if (isset($_POST["create"])) {
    $book_id = mysqli_real_escape_string($conn, $_POST["book_id"]);
    $title = mysqli_real_escape_string($conn, $_POST["title"]);
    $author = mysqli_real_escape_string($conn, $_POST["author"]);
    $publisher = mysqli_real_escape_string($conn, $_POST["publisher"]);
    $page = mysqli_real_escape_string($conn, $_POST["page"]);
    $sqlInsert = "INSERT INTO books(book_id, title, author, publisher, page) VALUES ('$book_id', '$title', '$author', '$publisher', '$page')";
    if (mysqli_query($conn, $sqlInsert)) {
        $_SESSION["create"] = "Book Added Successfully!";
        header("Location:index.php");
        exit();
    } else {
        die("Something went wrong: " . mysqli_error($conn));
    }
}

if (isset($_POST["edit"])) {
    $book_id = mysqli_real_escape_string($conn, $_POST["book_id"]);
    $title = mysqli_real_escape_string($conn, $_POST["title"]);
    $author = mysqli_real_escape_string($conn, $_POST["author"]);
    $publisher = mysqli_real_escape_string($conn, $_POST["publisher"]);
    $page = mysqli_real_escape_string($conn, $_POST["page"]);
    $id = mysqli_real_escape_string($conn, $_POST["id"]);
    $sqlUpdate = "UPDATE books SET id = '$book_id', title = '$title', author = '$author', publisher = '$publisher', page = '$page' WHERE id = '$id'";
    if (mysqli_query($conn, $sqlUpdate)) {
        $_SESSION["update"] = "Book Updated Successfully!";
        header("Location:index.php");
        exit();
    } else {
        die("Something went wrong: " . mysqli_error($conn));
    }
}
?>