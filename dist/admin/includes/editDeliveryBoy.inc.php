<?php 

    if(isset($_POST['submit']) && $_POST['name'] !== '' && $_POST['mobile'] !== '') {
        include "connection.inc.php";
        $name = $_POST['name'];
        $id = $_POST['id'];
        $mobile = $_POST['mobile'];

        $sql = "SELECT * FROM delivery_boy WHERE mobile=? AND id !=?";
        $stmt = mysqli_stmt_init($conn);
       

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../editDeliveryBoy.php?error=sql1error&id=".$id);
            exit();

        } else {
            mysqli_stmt_bind_param($stmt, "sd", $mobile, $id);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);
            
            if ($resultCheck > 0) {
                header("Location: ../editDeliveryBoy.php?error=numberAlreadyExists&id=".$id);
                exit();

            } else {
                $sql = "UPDATE delivery_boy SET name=?, mobile=? WHERE id=$id";
                $stmt = mysqli_stmt_init($conn);

                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: ../editDeliveryBoy.php?error=sql2error&id=".$id);
                    exit();
                } else {
                    mysqli_stmt_bind_param($stmt, "ss", $name, $mobile);
                    mysqli_stmt_execute($stmt);
                    header("Location: ../editDeliveryBoy.php?status=successful");
                    exit();
                }
            }
        }
    } else {
        header('Location: ../editDeliveryBoy.php');
    }

?>