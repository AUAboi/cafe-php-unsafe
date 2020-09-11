<?php

if(isset($_GET['id']) && isset($_GET['status']) ){
    include "../includes/connection.inc.php";
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $status = $_GET['status'];
    if($status == 'active') {
        $stat = 0;
    } else {
        $stat = 1;
    }
    mysqli_query($conn,"UPDATE category SET status='$stat' WHERE id='$id'");
}