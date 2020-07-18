<?php 

    if(isset($_POST['submit']) && $_POST['name'] !== '') {
        include "connection.inc.php";
        $catName = $_POST['name'];
        $catId = $_POST['id'];

        $sql = "SELECT * FROM category WHERE category=?";
        $stmt = mysqli_stmt_init($conn);
       

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../editCategories.php?error=sql1error");
            exit();

        } else {
            mysqli_stmt_bind_param($stmt, "sd", $catName, $catId);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);
            
            if ($resultCheck > 0) {
                header("Location: ../editCategories.php?error=catalreadyexists");
                exit();

            } else {
                $sql = "UPDATE category SET category=? WHERE id=$catId";
                $stmt = mysqli_stmt_init($conn);

                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: ../editCategories.php?error=sql2error&id=$catId");
                    exit();
                } else {
                    mysqli_stmt_bind_param($stmt, "s", $catName);
                    mysqli_stmt_execute($stmt);
                    header("Location: ../editCategories.php?status=successfull");
                    exit();
                }
            }
        }
    } else {
        header('Location: ../editCategories.php');
    }

?>