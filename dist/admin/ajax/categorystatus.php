<?php 
if(isset($_GET['category-id'])) {
    include "../includes/connection.inc.php";
    $categoryId = mysqli_real_escape_string($conn, $_GET['category-id']);
    $statusSql = "SELECT * FROM category WHERE id='$categoryId'";
    $result = mysqli_query($conn, $statusSql);
    $status = mysqli_fetch_all($result, MYSQLI_ASSOC);
    echo json_encode($status);
} else {
    echo "Error not found";
}