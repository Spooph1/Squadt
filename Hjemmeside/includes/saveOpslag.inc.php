<?php
include_once 'dbh.inc.php';

    $titleInput = $_POST['titleInput'];
    $postInput = $_POST['postInput'];

    $sql ="INSERT INTO posts (groups_id, author_id, title, post) VALUES (1, 1, ' $titleInput' , '$postInput')";
    mysqli_query($conn, $sql);

header("Location: ../SemesterGruppe.php");

    
