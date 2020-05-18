<?php
include_once 'dbh.inc.php';

    $titleInput = $_POST['titleInput'];
    $postInput = $_POST['postInput'];
    $groupNumber = $_POST['groupNumber'];
    $userId = $_POST['userId'];

    $sql ="INSERT INTO posts (groups_id, author_id, title, post) VALUES ('$groupNumber', '$userId', ' $titleInput' , '$postInput')";
    mysqli_query($conn, $sql);

header("Location: ../SemesterGruppe.php");

    
